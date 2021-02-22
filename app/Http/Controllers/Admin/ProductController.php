<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\{
	ProductRepository,
	CategoryRepository
};


class ProductController extends Controller
{
	public function __construct(ProductRepository $productRepository,CategoryRepository $categoryRepository)
	{
	    $this->middleware('auth:admin');
	    $this->productRepository=$productRepository;
	    $this->categoryRepository=$categoryRepository;
	}

    public function index()
    {
        $products=$this->productRepository->getAllProducts();
        return view('admin.products.list')->with(['products'=>$products]);
    }
    public function add_product()
    {
        $categories=$this->categoryRepository->getAllCategories();
        return view('admin.products.create')->with(['categories'=>$categories]);
    }
    /*public function getAddProductPage()
    {
        $categories=$this->categoryRepository->getAllCategories();
        $tags=$this->tagRepository->getAllTags();
        return view('admin/products/create')->with(['categories'=>$categories,'tags'=>$tags]);
    }

    public function getEditProductPage($id)
    {
        $categories=$this->categoryRepository->getAllCategories();
        $tags=$this->tagRepository->getAllTags();
        $product=$this->productRepository->getProductById($id);
        return view('admin/products/edit')->with(['categories'=>$categories,'tags'=>$tags,'product'=>$product,'images'=>[]]);
    }

    public function createProduct(Request $request)
    {
        $result=$this->productRepository->createProduct($request);
        return $result;
    }*/
}
