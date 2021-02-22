<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\{
    ReviewsRepository,SellerRepository
};
use Illuminate\Support\Facades\Auth;
class ReviewsController extends Controller
{
    //
	public function __construct(ReviewsRepository $reviews_repository,SellerRepository $seller_repository){
		$this->middleware('auth:web');
		$this->reviews_repository = $reviews_repository;
        $this->seller_repository = $seller_repository;
	}
    public function submit_review(Request $request){
    	return $this->reviews_repository->submit_review($request);
    }
    public function seller_reviews(Request $request,$slug){
    	$seller = $this->seller_repository->getSellerBySlug($slug);
    	return view('front.seller.reviews_list')->with(['seller'=>$seller]);
    }
    public function user_business_reviews(Request $request){
        $user = Auth::guard('web')->user();
        $sellers = $user->sellers;
        return view('front.seller.user_reviews_list')->with(['sellers'=>$sellers]);
    }
    public function delete_business_review(Request $request,$id){
        $result=$this->reviews_repository->delete_review($request,$id);
        return redirect()->route('business-reviews');
    }
}
