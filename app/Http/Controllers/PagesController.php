<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PageRepository;
use App\Http\Requests\PageRequest;

class PagesController extends Controller{

	public function __construct(PageRepository $pagerepository){
	    $this->middleware('auth:admin')->except(['get_page_content','submit_contactus']);
	    $this->pagerepository=$pagerepository;
	}

	public function list_pages(){
		$allPages=$this->pagerepository->getAllPages();
		return view('admin.pages.list')->with(['allPages'=>$allPages]);
	}
	public function add_page(){
		return view('admin.pages.create');
	}
	public function save_page(PageRequest $request){
		$result=$this->pagerepository->save_page($request);
        return $result;
	}
	public function edit_page(Request $request,$id){
		$page=$this->pagerepository->getPageById($id);
		return view('admin.pages.edit')->with(['page'=>$page]);
	}
	public function update_page(PageRequest $request,$id){
		$result=$this->pagerepository->update_page($request,$id);
        return $result;
	}
	public function delete_page(Request $request,$id){
		$result=$this->pagerepository->delete_page($request,$id);
        return $result;
	}
	public function change_page_status(Request $request){
		return $this->pagerepository->change_page_status($request);
	}

	public function get_page_content(Request $request,$page){
		if($page=="contact-us"){
			return view('front.pages.contact_us');
		}
		else{
			$page=$this->pagerepository->getPageBySlug($page);
			if(empty($page)) return redirect()->route('/');
			return view('front.pages.page')->with(['page'=>$page]);
		}
	}

	public function submit_contactus(Request $request){
		return $this->pagerepository->submit_contactus($request);
	}
}
