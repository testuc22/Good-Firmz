<?php 
namespace App\Repositories;
use Illuminate\Http\Request;
use App\Models\{
	Pages,ContactUs
};
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\CommonHelper;

class PageRepository{


	public function __construct(CommonHelper $common_helper){
        $this->common_helper = $common_helper;
    }

	public function getAllPages(){
        return Pages::orderBy('id','desc')->get();
    }

    public function getContactusList(){
        return ContactUs::orderBy('id','desc')->get();
    }
    
    public function getPageById($id){
        return Pages::find($id);
    }

    public function getPageBySlug($slug){
        return Pages::where('slug',$slug)->where('status',1)->first();
    }

    public function save_page($request){
    	$data=$this->getData($request);
        Pages::create($data);
        $this->common_helper->setFlashMessage($request,'Page Created Successfully',"success");
        return $this->get_return_url();
    }
    public function update_page($request,$id){
    	$data=$this->getData($request);
        $this->getPageById($id)->update($data);
        $this->common_helper->setFlashMessage($request,'Page updated Successfully',"success");
        return $this->get_return_url();
    }

    public function get_return_url(){
        return redirect()->route('list-pages');
    }
    public function getData($request){
    	$page = array(
            'title'=> $request->title,
            'description'=>$request->description,
            'slug'=>Str::of($request->title)->slug('-'),
            'status'=>$request->has('status') ? 1 : 0,
            'meta_title'=>$request->meta_title,
            'meta_tags'=>$request->meta_tags,
            'meta_desc'=>$request->meta_desc,
        );
        $imageData = $this->common_helper->process_image($request,'public/page_images','featured_image');
        if($imageData){
            $page['featured_image'] = $imageData;
        }
        return $page;
    }


    public function change_page_status($request){
    	$this->getPageById($request->page)->update(['status'=>$request->status]);
        return response(['message'=>'Status Updated Successfully',200]);
    }
    public function delete_page($request,$id){
    	$page = $this->getPageById($id);
    	if(!$page){
    		$this->common_helper->setFlashMessage($request,'Page does not exist',"error");
    		return $this->get_return_url();
    	}
    	$image = $page->featured_image;
        Storage::delete('public/page_images/'.$image);
    	$page->delete();
    	$this->common_helper->setFlashMessage($request,'Page deleted Successfully',"success");
    	return $this->get_return_url();
    }

    public function submit_contactus($request){
        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email',
            'phone_number'=>'required|numeric',
            'message'=>'required|max:2000',
        ]);
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'message'=>$request->message,
        ];
        ContactUs::create($data);
        $this->common_helper->setFlashMessage($request,'Your enquiry has been sent successfully to the Admin',"success");
        return redirect()->route('page','contact-us');
    }
}