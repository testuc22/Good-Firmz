<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\{
	SellerRepository,
	CategoryRepository,
    LocationRepository
};

use App\Http\Requests\SellerPostRequest;
use Illuminate\Support\Facades\Auth;
class SellersController extends Controller{
    public function __construct(SellerRepository $sellerRepository,CategoryRepository $categoryRepository,LocationRepository $location_repository){
	    $this->middleware('auth:web')->only('user_business_details');
	    $this->sellerRepository = $sellerRepository;
        $this->categoryRepository = $categoryRepository;
	    $this->location_repository = $location_repository;
	}
    public function list_your_business(Request $request){
        if(!Auth::guard('web')->check()){
            $request->session()->flash('error', 'Register your account to add listing');
            return redirect()->route('register');
        }
        $allStates = $this->location_repository->getAllStates();
        $categories = $this->categoryRepository->getCategoriesDropdown(array(),1);
        return view('front.seller.list_business')->with(['allStates'=>$allStates,'categories'=>$categories]);
    }

    public function create_business(SellerPostRequest $request){
        return $this->sellerRepository->create_business($request);
    }

    public function all_listings($category=null){
        $sellers = $this->sellerRepository->getSellersWithConditions(array(),$category);
        $parentCategories = $this->categoryRepository->getParentCategories(1);
        return view('front.seller.all_listings')->with(['sellers'=>$sellers,'parentCategories'=>$parentCategories]);
    }

    public function listing_details(Request $request,$slug){
        $seller = $this->sellerRepository->getSellerBySlug($slug);
        if(empty($seller))
            return redirect()->route('all-listings');

        $featuredSellers = $this->sellerRepository->getFeaturedSellers();
        $active_reviews = $this->sellerRepository->getActiveReviews($seller,5);
        return view('front.seller.listing_details')->with(['seller'=>$seller,'featuredSellers'=>$featuredSellers,'active_reviews'=>$active_reviews]);
    }

    public function user_business_details(Request $request){
        $user = Auth::guard('web')->user();
        return view('front.seller.user_business_details')->with(['user'=>$user]);
    }


    public function edit_business(Request $request,$slug){
        $seller = $this->sellerRepository->getSellerBySlug($slug);
        $cities = $this->location_repository->get_cities_by_state($seller->state->id);
        $allStates = $this->location_repository->getAllStates();
        $categoryIDS = $seller->categories->map(function($cat){
            return $cat->id;
        })->toArray();
        
        $dropdown = $this->categoryRepository->getCategoriesDropdown($categoryIDS,0);
        if(empty($seller))
            return redirect()->route('my-account');
        return view('front.seller.edit_business_details')->with(['seller'=>$seller,'dropdown'=>$dropdown,'allCities'=>$cities,'allStates'=>$allStates]);
    }
    public function update_business(SellerPostRequest $request,$id){
        $result = $this->sellerRepository->user_update_seller($request,$id);
        return $result;
    }
    public function remove_business(Request $request,$slug){
        $response = $this->sellerRepository->remove_business($request,$slug);
        return $response;
    }

    /**
     * Get Specified Company Detail
     */
    public function companyDetail($id)
    {
        $company = $this->sellerRepository->getSellerById($id);
        return view('new-frontend.edit-company-detail')->with(['company'=>$company]);
    }

    /**
     * Update Company Info
     */
    public function updateCompanyInfo(Request $request, $id)
    {
        $request->validate([
            'company_name'=>'required',
            'company_email'=>'required',
            'company_number'=>'required',
            'business'=>'required',
        ]);
        $this->sellerRepository->updateCompanyInfo($request, $id);
        return redirect()->route('company-profile')->with('success', 'Company Detail Updated Successfully');
    }
}
