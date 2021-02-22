<?php 
namespace App\Repositories;
use Illuminate\Http\Request;
use App\Models\{
	Leads
};
/*use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;*/
use Illuminate\Support\Facades\{
    Validator,Auth,Crypt
};
use App\CommonHelper;
class LeadsRepository{

    public function __construct(CommonHelper $common_helper){
        $this->common_helper = $common_helper;
    }
    public function submit_enquiry($request){
        $validator = $this->validateEnquiry($request);        
        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        $this->save_enquiry($request);
        return response()->json(['success'=>'Record is successfully added','errors'=>array()]);
    }

    public function save_enquiry($request){
        $data = [
            'user_id'=>Auth::guard('web')->id(),
            'seller_id'=>Crypt::decryptString($request->seller_id),
            'name'=>$request->name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'company_name'=>$request->company_name,
            'pincode'=>$request->pincode,
            'content'=>$request->content,
        ];
        Leads::create($data);
        $this->common_helper->setFlashMessage($request,'Enquiry has been sent successfully',"success");
    }
    function validateEnquiry($request){
         return  \Validator::make($request->all(), [
            'name'=>'required|max:255',
            'email'=>'required|email',
            'phone_number'=>'required|numeric',
            'company_name'=>'required|max:255',
            'pincode'=>'required',
            'content'=>'required'
        ]);
    }

    public function getAllLeads(){
        return Leads::orderBy('id','desc')->get();
    }

}
