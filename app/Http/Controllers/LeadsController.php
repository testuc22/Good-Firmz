<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\{
	LeadsRepository
};
class LeadsController extends Controller{

	public function __construct(LeadsRepository $leads_repository){
		$this->middleware('auth:web');
		$this->leads_repository = $leads_repository;
    }
    public function submit_enquiry(Request $request){
		return $this->leads_repository->submit_enquiry($request);
    }

}
