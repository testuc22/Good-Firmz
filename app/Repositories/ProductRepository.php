<?php 
namespace App\Repositories;
use Illuminate\Http\Request;
use App\Models\{
	ProductCategory,
	Product,
    ProductImages,
    ProductMeta
};
use App\Repositories\{
    CategoryRepository
};
use File;

class ProductRepository
{
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository=$categoryRepository;
    }

    public function getAllProducts()
    {
        return Product::get();
    }

    public function getProductById($id)
    {
        return Product::find($id);
    }

    public function createProduct($request)
    {
        $productData = [
            'seller_id' => $request->company_name,
            'name'  => $request->product_name,
            'price' => $request->product_price,
            'desc' => $request->product_desc,
            'status' => $request->product_status,
            'featured' => $request->feature_product,
            'meta_title' => $request->product_meta_title,
            'meta_tags' => $request->product_meta_tags,
            'meta_desc' => $request->product_meta_desc,
        ];
        $category_id = [
            $request->product_category,
            $request->sub_category,
        ]; 
        $product = Product::create($productData);
        $product->categories()->sync($category_id);
        $this->addProductMeta($product->id, $request->meta);
        return true;

    }
    public function updateStatus($request){
        $this->getProductById($request->product)->update(['status'=>$request->status]);
        return response(['message'=>'Product Status Updated Successfully',200]);
    }

    /**
     * Get All Product of Authorized User
     */
    public function getUsersProduct($sellerId)
    {
        $products = Product::with(['images', 'productMetas', 'seller'])->where('seller_id', $sellerId)->get();
        return $products;
    }

    /**
     * Add Seller Product
     */
    public function addProduct($request, $seller_Id)
    {
        $productData = [
            'seller_id' => $seller_Id,
            'name' => $request->product_name,
            'price' => $request->price,
            'desc' => $request->product_desc,
        ];
        $category_id = [
            $request->product_category,
            $request->sub_category,
        ]; 
        $product = Product::create($productData);
        $product->categories()->sync($category_id);
        return $product;
    }

    /**
     * Save Product Images
     */
    public function productImages($product_id, $images=array())
    {
        foreach ($images as $key => $image) {
            $productImage = new ProductImages;
            $productImage->product_id = $product_id;
            $productImage->image = $image;
            $productImage->save();
        }

        return true;
    }

    /**
     * Add Product Meta
     */
    public function addProductMeta($product_id, $productMetas=array())
    {
        foreach ($productMetas as $productMeta) {
            $meta = new ProductMeta;
            $meta->product_id = $product_id;
            $meta->key = $productMeta['product_key'];
            $meta->value = $productMeta['product_value'];
            $meta->save();
        }
        return true;
    }

    /**
     * Update Specified Product
     */
    public function updateProduct($request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->product_name;
        $product->price = $request->price;
        $product->desc = $request->product_desc;
        $product->save();
        $category_id = [
            $request->product_category,
            $request->sub_category,
        ]; 
        $product->categories()->sync($category_id);
        foreach ($request->meta as $key => $meta) {
            $productMeta = ProductMeta::find($meta['id']);
            $productMeta->key = $meta['product_key'];
            $productMeta->value = $meta['product_value'];
            $productMeta->save();
        }
        return true;
    }

    /**
     * Delete Product Image
     */
    public function deleteProductImage($id)
    {
        $productImage = ProductImages::find($id);
        $path = public_path('uploads/products/'.$productImage->image);
        if (File::exists($path)) {
            unlink($path);
        }
        $productImage->delete();
        return true;
        
    }

    /**
     * Update Product Detail
     */
    public function updateProductDetail($request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->product_name;
        $product->price = $request->product_price;
        $product->meta_title = $request->product_meta_title;
        $product->meta_tags = $request->product_meta_tags;
        $product->meta_desc = $request->product_meta_desc;
        $product->status = $request->status ? $request->status : 0;
        $product->featured = $request->featured ? $request->featured : 0;
        $product->save();
        $category_id = $category_id = [
            $request->product_category,
            $request->sub_category,
        ]; 
        $product->categories()->sync($category_id);
        foreach ($request->meta as $key => $meta) {
            $productMeta = ProductMeta::find($meta['id']);
            $productMeta->key = $meta['product_key'];
            $productMeta->value = $meta['product_value'];
            $productMeta->save();
        }

        return true;
    }

    /**
     * Get Product By Category Slug
     */
    public function getProductByCategorySlug($slug){
        $category = $this->categoryRepository->getCategoryBySlug($slug);
        return $category;
    }

    /**
     * Delete Product
     */
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return true;
    }

    /**
     * Get Product By Slug
     */
    public function getProductBySlug($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return $product;
    }
}
