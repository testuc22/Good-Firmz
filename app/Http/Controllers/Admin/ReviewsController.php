<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ReviewsRepository;

class ReviewsController extends Controller{
    //
	public function __construct(ReviewsRepository $reviews_repository){
		$this->middleware('auth:admin')->except(['updateStatus']);
		$this->reviews_repository = $reviews_repository;
	}
	public function list_reviews(Request $request){
		$reviews = $this->reviews_repository->getReviews(0);
		return view('admin.reviews.list')->with(['reviews'=>$reviews]);
	}
	public function updateStatus(Request $request){
		$result=$this->reviews_repository->updateStatus($request);
        return $result;
	}
	public function delete_review(Request $request,$id){
		$result=$this->reviews_repository->delete_review($request,$id);
        return redirect()->route('list-reviews');
	}
}
