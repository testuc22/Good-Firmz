<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\{
	SettingsRepository,CategoryRepository,SellerRepository
};
use App\Models\Category;
class HomeController extends Controller{
    //
    public function __construct(SettingsRepository $settings_repository,CategoryRepository $category_repository,SellerRepository $seller_repository){
    	$this->settings_repository = $settings_repository;
    	$this->category_repository = $category_repository;
    	$this->seller_repository = $seller_repository;
    }
    public function index(){
        $categories = Category::where('parent', 0)
                        ->with('allChildren')
                        ->take(10)
                        ->get()
                        ->map(function($category){
                            $category->allChildren = $category->allChildren->take(6);
                            return $category;
                        });
        $featureCategories = $this->category_repository->featureCategories();
        return view('new-frontend.home')->with(['categories'=>$categories, 'featureCategories'=>$featureCategories]);
    }

    public function products()
    {
        return view('new-frontend.product-listing');
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

    /**
     * About Us Page
     */
    public function aboutUs()
    {
        return view('new-frontend.about');
    }

    /**
     * Contact Us Page
     */
    public function contactUs() {
        return view('new-frontend.contact-us');
    }

    /**
     * Feedback Page
     */
    public function feedback() {
        return view('new-frontend.feedback');
    }

    /**
     * Testimonial Page
     */
    public function testimonial()
    {
        return view('new-frontend.testimonial');
    }

    /**
     * Advertise With Us
     */
    public function advertiseWithUs(){
        return view('new-frontend.advertise');
    }

    /**
     * Frequentily Ask Question Page
     */
    public function frequentlyAskQuestion()
    {
        return view('new-frontend.frquently');
    }
}
