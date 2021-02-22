<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\{
	LeadsRepository
};
class LeadsController extends Controller
{
    //
    public function __construct(LeadsRepository $leads_repository){
    	$this->middleware('auth:admin');
		$this->leads_repository = $leads_repository;
    }
    public function list_leads(Request $request){
    	$data = $this->leads_repository->getAllLeads();
	    return view('admin.leads.list')->with(['data'=>$data]);
    }
}
