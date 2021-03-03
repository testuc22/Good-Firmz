<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\{
	SettingsRepository,CategoryRepository,SellerRepository
};
class HomeController extends Controller{
    //
    public function __construct(SettingsRepository $settings_repository,CategoryRepository $category_repository,SellerRepository $seller_repository){
    	$this->settings_repository = $settings_repository;
    	$this->category_repository = $category_repository;
    	$this->seller_repository = $seller_repository;
    }
    public function index(){
    	$categories = $this->category_repository->getAllCategories();
        //dd($categories);
        return view('new-frontend.home')->with(['categories'=>$categories]);
    }

    public function products()
    {
        return view('new-frontend.product');
    }

    public function singleProduct()
    {
        return view('new-frontend.single-product');
    }

    public function signUp()
    {
        return view('new-frontend.sign-up');
    }

    public function postRequirement()
    {
        return view('new-frontend.post-requirement');
    }

    /**
     * Category Detail
     */
    public function categoryDetail($id)
    {
        $category = $this->category_repository->getCategoryById($id);
        return view('new-frontend.category')->with(['category'=>$category]);
    }
}
