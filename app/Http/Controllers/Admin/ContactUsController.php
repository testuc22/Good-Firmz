<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PageRepository;

class ContactUsController extends Controller
{
    public function __construct(PageRepository $pagerepository){
	    $this->middleware('auth:admin');
	    $this->pagerepository=$pagerepository;
	}
	public function list_contactus(){
	    $data = $this->pagerepository->getContactusList();
	    return view('admin.pages.list_contactus')->with(['data'=>$data]);
	}
}
