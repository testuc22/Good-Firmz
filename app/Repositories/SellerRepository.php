<?php 
namespace App\Repositories;
use Session;
use App\Models\{
	Sellers
};
use App\CommonHelper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    DB,Storage,Hash,Auth
};
use Illuminate\Database\Eloquent\Builder;
class SellerRepository{

    public function __construct(CommonHelper $common_helper){
        $this->common_helper = $common_helper;
    }
	public function get_return_url(){
        return redirect()->route('list-sellers');
    }

	public function getAllSellers(){
        return Sellers::orderBy('id','desc')->get();
    }
	public function getSellerById($id){
        return Sellers::find($id);
    }
    public function getSellerByUser($user_id){
        return Sellers::where('user_id',$user_id)->get();
    }
    public function getSellerBySlug($slug){
        return Sellers::where('slug',$slug)->first();
    }
    public function getFeaturedSellers(){
        return Sellers::where('status',1)
                        ->where('featured',1)
                        ->inRandomOrder()
                        ->limit(5)
                        ->get();
    }
	public function updateStatus($request){
        $this->getSellerById($request->seller)->update(['status'=>$request->status]);
        return response(['message'=>'Status Updated Successfully',200]);
    }
    public function save_seller($request, $userId){
    	$fields = $this->get_request_fields($request,$userId);
        $seller = Sellers::create($fields);
        return $seller;
    }

    public function admin_update_seller($request,$id){
        $seller = $this->update_seller($request,$id);
        return $seller;
    }
    public function user_update_seller($request,$id){
        $seller = $this->update_seller($request,$id);
        return $seller;
    }
    public function update_seller($request,$id){
        $fields = $this->get_request_fields($request,$id,$request->status);
        $seller = $this->getSellerById($id);
        $seller->type  = $request->company_type;
        $seller->name  = $request->company_name;
        $seller->email = $request->company_email;
        $seller->slug  = Str::of($request->company_name)->slug('-');
        $seller->desc  =$request->company_desc;
        $seller->address1 = $request->address;
        $seller->phone_number = $request->company_number;
        $seller->state_id = $request->state;
        $seller->city_id = $request->city;
        $seller->pincode = $request->pincode;
        $seller->status  = $request->status ? $request->status : 0;
        $seller->featured  = $request->featured ? 1 : 0;
        $seller->meta_title = $request->has('meta_title') ? $request->meta_title : '';
        $seller->meta_tags = $request->has('meta_tags') ? $request->meta_tags : '';
        $seller->meta_desc = $request->has('meta_desc') ? $request->meta_desc : '';
        $seller->save();
        return $seller;
        
    }
    function get_request_fields($request,$userId,$status = 0){
        $sellerArray = array(
            'user_id' => $userId,
            'type'  => $request->company_type,
            'name'  => $request->company_name,
            'email' => $request->company_email,
            'slug'  =>Str::of($request->company_name)->slug('-'),
            'desc'  =>$request->company_desc,
            'address1' => $request->address,
            'phone_number' => $request->company_number,
            'state_id' => $request->state,
            'city_id' => $request->city,
            'pincode' => $request->pincode,
            'status'  => $request->status ? $request->status : 0,
            'featured'  => $request->featured ? 1 : 0,
            'meta_title'=>$request->has('meta_title') ? $request->meta_title : '',
            'meta_tags'=>$request->has('meta_tags') ? $request->meta_tags : '',
            'meta_desc'=>$request->has('meta_desc') ? $request->meta_desc : '',
        ); 
        /*if($userId){
            $sellerArray['user_id'] = $userId;
        }
        $imageData = $this->common_helper->process_image($request,'public/seller_logo','logo');
        if($imageData){
            $sellerArray['logo'] = $imageData;
        }*/
        return $sellerArray;
    }

    public function delete_seller($request,$id){
        $seller = $this->getSellerById($id);
        $logo = $seller->logo;
        $seller->delete();
        Storage::delete('public/seller_logo/'.$logo);
        $this->common_helper->setFlashMessage($request,'Seller Deleted Successfully',"success");
        return $this->get_return_url();
    }

    public function create_business($request){
        $fields = $this->get_request_fields($request,Auth::guard('web')->id(),0);
        $seller = Sellers::create($fields);
        $seller->categories()->sync($request->categories);
        $this->common_helper->setFlashMessage($request,'Business Created Successfully,Please wait for Admin approval',"success");
        return redirect()->route('my-account');
    }

    public function getSellersWithConditions($ids=array(),$category=null){
        $seller = Sellers::where('status',1);
        if(!empty($ids)){
            $seller = $seller->whereIn('id',$ids);
        }
        if($category!=""){
            $seller = $seller->whereHas('categories',function(Builder $query) use ($category){
                $query->where('slug',$category);
            });
        }
        return $seller->get();
    }

    public function getActiveReviews($seller,$count=0){
        $reviews = $seller->reviews;
        if(empty($reviews[0])) return array();

        if($count)
            $reviews = $reviews->splice(0,5);
        return $reviews;
    }
    public function remove_business($request,$slug){
        $seller = $this->getSellerBySlug($slug)->delete();
        $this->common_helper->setFlashMessage($request,'Business removed Successfully.',"success");
        return redirect()->route('user-business-details');
    }

    /**
     * Update Company Info
     */
    public function updateCompanyInfo($request, $id)
    {
        $company =  Sellers::find($id);
        $company->name = $request->company_name;
        $company->type = $request->business;
        $company->email = $request->company_email;
        $company->phone_number = $request->company_number;
        $company->save();

        return true;
    }

    /**
     * Update Seller Info
     */
    public function updateSellerInfo($id, $city, $state, $zip)
    {
        $seller = Sellers::find($id);
        $seller->city_id = $city;
        $seller->state_id = $state;
        $seller->pincode = $zip;
        $seller->save();

        return true;
    }

    /**
     * Get Active Sellers
     */
    public function getActiveSeller()
    {
        return Sellers::active()->get();
    }
}