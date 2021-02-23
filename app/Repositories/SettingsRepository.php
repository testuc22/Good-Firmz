<?php 
namespace App\Repositories;
use Illuminate\Http\Request;
use App\Models\{
	Settings,Banner
};
use Illuminate\Support\Facades\Storage;
use App\CommonHelper;


class SettingsRepository{
	public function __construct(CommonHelper $common_helper){
        $this->common_helper = $common_helper;
    }

    public function getSettingsByKey($key){
    	return Settings::where('meta_key',$key)->first();
    }
    public function save_home_page_settings($request){
    	$request->validate([
    		'categories'=>'required',
    		'featured_sellers'=>'required'
    	]);
    	$data = array(
    		'banner_text'=>$request->banner_text ? $request->banner_text : '' ,
    		'categories'=>$request->categories,
    		'sellers'=>$request->featured_sellers
    	);
    	$data['banner'] = '';
    	if($request->has('image')){
    		$data['banner'] = $this->common_helper->process_image($request,'public/images','image');
    	}
    	elseif($request->has('old_image')){
    		$data['banner'] = $request->old_image;
    	}

    	// print_r($data);die;
    	$row = $this->getSettingsByKey('home_page_settings');
    	if(!empty($row)){
    		$row->update(['meta_value'=>json_encode($data)]);
    	}
    	else{
    		Settings::create([
    			'meta_key'=>'home_page_settings',
    			'meta_value'=>json_encode($data)
    		]);
    	}
    	$this->common_helper->setFlashMessage($request,'Settings updated successfully',"success");
    }

    public function save_banner($request){
        $request->validate([
            'image'=>'required|image',
            'button_text'=>'required',
            'button_link'=>'required|url',
        ]);
        $data = array(
            'image'=>$this->common_helper->process_image($request,'public/banner_images','image'),
            'button_text'=>$request->button_text,
            'button_link'=>$request->button_link,
            'status'=>1
        );
        // print_r($data);die;
        Banner::create($data);
        $this->common_helper->setFlashMessage($request,'Banner added successfully',"success");
    }
    public function all_banners(){
        return Banner::orderBy('id','desc')->get();
    }
    public function update_banner_status($request){
        $banner = Banner::find($request->banner);
        $banner->update(['status'=>$request->status]);
        return response(['message'=>'Banner Status Updated Successfully',200]);
    }

    public function delete_banner($request,$id){
        $banner = Banner::find($id);
        $image = $banner->image;
        $banner->delete();
        unlink(public_path('banner_images/'.$image));
        $this->common_helper->setFlashMessage($request,'Banner Deleted Successfully',"success");
    }
}
?>