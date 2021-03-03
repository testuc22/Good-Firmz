<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SellerRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Http\Requests\ProductStoreRequest;
use App\Models\States;
use App\Models\ProductCategories;
use App\Models\City;
use File;

class ProductController extends Controller
{
    protected $sellerRepo;
    protected $categoryRepo;
    protected $productRepo;

    public function __construct(SellerRepository $sellerRepo,
                                CategoryRepository $categoryRepo,
                                ProductRepository $productRepo)
    {
    	$this->sellerRepo = $sellerRepo;
        $this->categoryRepo = $categoryRepo;
        $this->productRepo = $productRepo;
    }

    /**
     * Add Product form
     */
    public function addProduct($id)
    {
    	$seller = $this->sellerRepo->getSellerById($id);
        $cities = City::all();
        $categories = $this->categoryRepo->getAllCategories();
    	return view('new-frontend.add-product')->with(['seller'=>$seller, 'categories'=>$categories, 'cities'=>$cities]);
    }

    /**
     * Save Seller Product
     */
    public function saveProduct(ProductStoreRequest $request, $id)
    {
        $this->sellerRepo->updateSellerInfo($id, $request->city, $request->state,$request->zip);
        $product = $this->productRepo->addProduct($request, $id);
        if ($product) {
            $this->productRepo->productImages($product->id, $request->images);
            $this->productRepo->addProductMeta($product->id, $request->meta);
        }

        return redirect()->route('company-profile')->with('success', 'Product Added Successfully');
    }

    /**
     * Store Product Image
     */
    public function storeImage(Request $request)
    {
        $path = public_path('uploads/products');
        if (!File::exists($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
        $file = $request->file('file');
        $name = uniqid() . '_' . trim($file->getClientOriginalName());
        $file->move($path, $name);
        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    /**
     * Get State using City
     */
    public function stateAjax($id)
    {
        $city = City::find($id);
        
        $state = States::find($city->state_id, ['name', 'id']);
        return json_encode($state);

    }

    /**
     * Edit Product
     */
    public function editProduct($id)
    {
        $product = $this->productRepo->getProductById($id);
        $seller = $this->sellerRepo->getSellerById($product->seller_id);
        $cities = City::all();
        $categories = $this->categoryRepo->getAllCategories();
        return view('new-frontend.edit-product')->with(['seller'=>$seller, 'categories'=>$categories, 'cities'=>$cities, 'product'=>$product]);
    }

    /**
     * Update Product Detail
     */
    public function updateProduct(Request $request, $id)
    {
        $this->productRepo->updateProduct($request, $id);
        return redirect()->route('user-products')->with('success', 'Product Updated Successfully');
    }

    /**
     * Product Listing
     */
    public function productListing($slug)
    {
        $category = $this->productRepo->getProductByCategorySlug($slug);
        return view('new-frontend.products')->with(['category'=>$category]);
    }

    /**
     * Get Product Detail
     */
    public function productDetail($id)
    {
        $productDetail = $this->productRepo->getProductById($id);
        return view('new-frontend.product-detail')->with(['product'=>$productDetail]);
    }
}
