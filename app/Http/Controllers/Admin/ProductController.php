<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminProductStoreRequest;
use App\Repositories\{
	ProductRepository,CategoryRepository,SellerRepository
};
use App\Models\ProductImages;
use App\CommonHelper;


class ProductController extends Controller
{
	public function __construct(ProductRepository $productRepository,CategoryRepository $categoryRepository,CommonHelper $common_helper, SellerRepository $sellerRepo)
	{
	    $this->middleware('auth:admin');
	    $this->productRepository=$productRepository;
	    $this->categoryRepository=$categoryRepository;
        $this->common_helper = $common_helper;
        $this->sellerRepo = $sellerRepo;
	}

    public function index()
    {
        $products=$this->productRepository->getAllProducts();
        return view('admin.products.list')->with(['products'=>$products]);
    }
    public function add_product()
    {
        $sellers = $this->sellerRepo->getActiveSeller();
        $categories = $this->categoryRepository->getAllCategories();
        return view('admin.products.create')->with(['categories'=>$categories, 'sellers'=>$sellers]);
    }
    public function updateStatus()
    {
        $result=$this->productRepository->updateStatus($request);
        return $result;
    }

    /**
     * Admin Save Product Into Storage
     */
    public function saveProduct(AdminProductStoreRequest $request)
    {
        $product = $this->productRepository->createProduct($request);
        $this->common_helper->setFlashMessage($request,'Product Updated Successfully',"success");
        return redirect()->route('list-products');
    }

    /**
     * Edit Product
     */
    public function editProduct($id)
    {
        $sellers = $this->sellerRepo->getAllSellers();
        $categories = $this->categoryRepository->getAllCategories();
        $product = $this->productRepository->getProductById($id);
        $productCat = $product->categories->pluck('id')->toArray();
        return view('admin.products.edit')->with(['product'=>$product, 'sellers'=>$sellers, 'categories'=>$categories, 'productCat'=>$productCat]);
    }

    /**
     * Delete Product Image
     */
    public function deleteProductImage($id)
    {
        $this->productRepository->deleteProductImage($id);
        $msg = 'Image Delete Successfully';

        return $msg;
    }

    /**
     * Update Product Detail
     */
    public function updateProductDetail(Request $request, $id)
    {
        $this->productRepository->updateProductDetail($request, $id);
        $this->common_helper->setFlashMessage($request,'Product Updated Successfully',"success");
        return redirect()->route('list-products');
    }

    /**
     * Add Product Image
     */
    public function addProductImage($id)
    {
        return view('admin.products.product-image')->with(['id'=>$id]);
    }

    /**
     * Store Product Image
     */
    public function storeProductImage(Request $request)
    {
        $images = $request->file('file');
        foreach ($images as $key => $image) {
            $imageName = time(). '_' .$image->getClientOriginalName();
            $upload_success = $image->move(public_path('uploads/products/'),$imageName);
            $productImage = new ProductImages;
            $productImage->product_id = $request->product_id;
            $productImage->image = $imageName;
            $productImage->save();
        }if ($upload_success) {
            return response()->json($upload_success, 200);
        }else {
            return response()->json('error', 400);
        }
    }

    /**
     * Delete Product 
     */
    public function deleteProduct(Request $request, $id)
    {
        $this->productRepository->deleteProduct($id);
        $this->common_helper->setFlashMessage($request,'Product Deleted Successfully',"success");
        return redirect()->route('list-products');
    }
}
