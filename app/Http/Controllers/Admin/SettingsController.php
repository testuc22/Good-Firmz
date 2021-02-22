<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Arr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\{
	CategoryRepository,SellerRepository,SettingsRepository
};

class SettingsController extends Controller{

    public function __construct(CategoryRepository $category_repository, SellerRepository $seller_repository,SettingsRepository $settings_repository){
    	$this->middleware('auth:admin');
    	$this->category_repository = $category_repository;
    	$this->seller_repository = $seller_repository;
    	$this->settings_repository = $settings_repository;
    }

    public function index(){
    	$data = $this->get_home_page_data();
    	return view('admin.settings.settings')->with(['allCategories'=>$data['allCategories'],'allSellers'=>$data['allSellers'],'homeSettings'=>$data['homeSettings']]);
    }

    public function get_home_page_data(){
    	$allCategories = $this->category_repository->getAllCategories();

    	$allSellers = $this->seller_repository->getAllSellers();
    	$row = $this->settings_repository->getSettingsByKey('home_page_settings');
    	$homeSettings = $row->meta_value ? json_decode($row->meta_value,true) : array();
    	return [
    		'allCategories'=>$allCategories,
    		'allSellers'   => $allSellers,
    		'homeSettings' => $homeSettings
    	];
    }
    public function save_home_page_settings(Request $request){
    	$this->settings_repository->save_home_page_settings($request);
    	return redirect()->route('settings');
    }
}
