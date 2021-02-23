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
        $allCategories = $allSellers = $homeSettings = array();

    	$allCategories = $this->category_repository->getAllCategories();
    	$allSellers = $this->seller_repository->getAllSellers();
    	$row = $this->settings_repository->getSettingsByKey('home_page_settings');
        if(!empty($row)){
    	   $homeSettings = $row->meta_value ? json_decode($row->meta_value,true) : array();
        }
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

    public function home_page_banner(){
        $banners = $this->settings_repository->all_banners();
        return view('admin.settings.homepage_banner')->with(['banners'=>$banners]);
    }
    public function add_banner(){
        return view('admin.settings.add_banner');
    }
    public function save_banner(Request $request){
        $this->settings_repository->save_banner($request);
        return redirect()->route('settings-home-banner');
    }
    public function update_banner_status(Request $request){
        $result=$this->settings_repository->update_banner_status($request);
        return $result;
    }
    public function delete_banner(Request $request,$id){
        $this->settings_repository->delete_banner($request,$id);
        return redirect()->route('settings-home-banner');
    }
}
