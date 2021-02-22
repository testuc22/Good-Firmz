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
    	$data = $this->settings_repository->getSettingsByKey('home_page_settings');
    	$data = isset($data->meta_value) && $data->meta_value!="" ? json_decode($data->meta_value,true) : array();
    	$categories = $this->category_repository->getCategoriesWithConditions($data['categories']);
    	$sellers = $this->seller_repository->getSellersWithConditions($data['sellers']);
    	//return view('front.home')->with(['data'=>$data,'categories'=>$categories,'sellers'=>$sellers]);
        return view('new-frontend.home');
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
}
