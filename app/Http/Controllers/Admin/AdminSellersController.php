<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\{
	SellerRepository,
	CategoryRepository,
    LocationRepository
};

use App\Http\Requests\SellerPostRequest;
use Illuminate\Support\Facades\Auth;

class AdminSellersController extends Controller
{
    //
    public function __construct(SellerRepository $sellerRepository,CategoryRepository $categoryRepository,LocationRepository $location_repository){
	    $this->middleware('auth:admin');
	    $this->sellerRepository = $sellerRepository;
        $this->categoryRepository = $categoryRepository;
	    $this->location_repository = $location_repository;
	}
	public function index(Request $request){
        if(isset($request->userId) && $request->userId!=""){
            $allSellers = $this->sellerRepository->getSellerByUser($request->userId);
        }else{
            $allSellers = $this->sellerRepository->getAllSellers();
        }
		return view('admin.sellers.list')->with(['allSellers'=>$allSellers]);
	}

	public function updateStatus(Request $request){
        $result=$this->sellerRepository->updateStatus($request);
        return $result;
    }
    public function add_seller(Request $request,$userid){
        $dropdown = $this->categoryRepository->getCategoriesDropdown(array(),0);
        $allStates = $this->location_repository->getAllStates();
    	return view('admin.sellers.create')->with(['dropdown'=>$dropdown,'allStates'=>$allStates,'userid'=>$userid]);
    }
    public function save_seller(SellerPostRequest $request){
        $result = $this->sellerRepository->save_seller($request);
        return $result;
    }

    public function edit_seller(Request $request,$id){
    	$seller = $this->sellerRepository->getSellerById($id);
        $cities = $this->location_repository->get_cities_by_state($seller->state->id);
        $allStates = $this->location_repository->getAllStates();
        $categoryIDS = $seller->categories->map(function($cat){
            return $cat->id;
        })->toArray();
        
        $dropdown = $this->categoryRepository->getCategoriesDropdown($categoryIDS,0);
        return view('admin.sellers.edit')->with(['seller'=>$seller,'dropdown'=>$dropdown,'allCities'=>$cities,'allStates'=>$allStates]);
    }

    public function update_seller(SellerPostRequest $request,$id){
    	$result = $this->sellerRepository->admin_update_seller($request,$id);
        return $result;
    }

    public function delete_seller(Request $request,$id){
    	$result = $this->sellerRepository->delete_seller($request,$id);
        return $result;
    }
}
