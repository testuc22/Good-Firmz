<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\{
	SellerRepository,
	CategoryRepository,
    LocationRepository
};
use App\CommonHelper;
use App\Http\Requests\SellerPostRequest;
use Illuminate\Support\Facades\Auth;

class AdminSellersController extends Controller
{
    //
    public function __construct(SellerRepository $sellerRepository,CategoryRepository $categoryRepository,LocationRepository $location_repository,CommonHelper $common_helper){
	    $this->middleware('auth:admin');
	    $this->sellerRepository = $sellerRepository;
        $this->categoryRepository = $categoryRepository;
	    $this->location_repository = $location_repository;
        $this->common_helper = $common_helper;
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
    public function add_seller(Request $request){
        $cities = $this->location_repository->getAllCities();
    	return view('admin.sellers.create')->with(['cities'=>$cities]);
    }
    public function save_seller(SellerPostRequest $request){
        $userId = Auth::id();
        $result = $this->sellerRepository->save_seller($request, $userId);
        $this->common_helper->setFlashMessage($request,'Seller Added Successfully',"success");
        return redirect()->route('list-sellers');
    }

    public function edit_seller(Request $request,$id){
    	$seller = $this->sellerRepository->getSellerById($id);
        $cities = $this->location_repository->getAllCities();
        return view('admin.sellers.edit')->with(['seller'=>$seller,'cities'=>$cities]);
    }

    public function update_seller(SellerPostRequest $request,$id){
    	$result = $this->sellerRepository->admin_update_seller($request,$id);
        $this->common_helper->setFlashMessage($request,'Seller updated Successfully',"success");
        return redirect()->route('list-sellers');
    }

    public function delete_seller(Request $request,$id){
    	$result = $this->sellerRepository->delete_seller($request,$id);
        return $result;
    }
}
