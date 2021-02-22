<?php 
namespace App\Repositories;
use App\Models\{
	SellerReviews,Sellers
};
use App\Repositories\{
	SellerRepository
};
use Session;
use App\CommonHelper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
class ReviewsRepository{
	public function __construct(CommonHelper $common_helper,SellerRepository $seller_repository){
		$this->common_helper = $common_helper;
		$this->seller_repository = $seller_repository;
	}
	public function submit_review($request){
		$request->validate([
			'stars'=>'required|numeric',
			'review'=>'required|max:1000',
			'name'=>'required|max:255',
			'phone_number'=>'required|numeric',
			'email'=>'required|email'
		]);
		$data = [
			'user_id'=>Auth::guard('web')->id(),
			'seller_id'=>$request->seller_id,
			'stars'=>$request->stars,
			'review'=>$request->review,
			'name'=>$request->name,
			'phone_number'=>$request->phone_number,
			'email'=>$request->email,
		];
		SellerReviews::create($data);
		$this->common_helper->setFlashMessage($request,"Review submitted successfully. Please wait for admin's approval",'success');
		return redirect(url()->previous());
	}

	public function getReviews($seller_id){
		$reviews = SellerReviews::select('*');
		if($seller_id){
			$reviews = $reviews->where('seller_id',$seller_id);
		}
		return $reviews->get();
	}
	public function updateStatus($request){
        SellerReviews::find($request->review)->update(['status'=>$request->status]);
        return response(['message'=>'Status Updated Successfully',200]);
    }
    public function delete_review($request,$id){
        SellerReviews::find($id)->delete();
        $this->common_helper->setFlashMessage($request,"Review deleted successfully.",'success');
        
    }
    /*public function getReviewsBySeller($slug){
    	$seller = $this->seller_repository->getSellerBySlug($slug);
    	$reviews = $this->getReviews($seller->id);
    	return $reviews;
    }*/
}