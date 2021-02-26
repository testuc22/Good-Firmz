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

class ProductRepository
{
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository=$categoryRepository;
    }

    public function getAllProducts()
    {
        return Product::all();
    }

    public function getProductById($id)
    {
        return Product::find($id);
    }

    public function createProduct($request)
    {
        $this->validateData($request);
        $productData=$this->getProductData($request);
        $product=Product::create($productData);
        if ($request->product_tags!=null) {
            $this->assignTagsToProduct($request,$product);
        }
        return $this->getMessage($request,'Product Created Successfully');
    }

    public function validateData($request)
    {
        $request->validate([
            'productName'=>'required',
            'category'=>'required'
        ]);
    }

    public function getProductData($request)
    {
        return [
            'productName'=>$request->productName,
            'product_category_id'=>$request->category,
            'status'=>$request->has('status') ? 1 : 0
        ];
    }

    public function getMessage($request,$message)
    {
        $request->session()->flash('success',$message);
        return redirect()->route('list-products');
    }

    public function assignTagsToProduct($request,$product)
    {
        $productTags=explode(',',$request->product_tags);
        $data=[];
        foreach ($productTags as $productTag) {
            $data[]=['product_id'=>$product->id,'tag_id'=>$productTag];
        }
        $product->productTags()->sync($productTags);
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
        $category_id = (array)$request->product_cat;
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
            $meta->key = $productMeta['key'];
            $meta->value = $productMeta['value'];
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
        $category_id = (array)$request->product_cat; 
        $product->categories()->sync($category_id);
        foreach ($request->meta as $key => $meta) {
            $productMeta = ProductMeta::find($meta['id']);
            $productMeta->key = $meta['key'];
            $productMeta->value = $meta['value'];
            $productMeta->save();
        }

        return true;
    }
}
