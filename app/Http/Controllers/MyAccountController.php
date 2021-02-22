<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\{
	LocationRepository,
	UserRepository
};

use App\Http\Requests\UserRequest;
class MyAccountController extends Controller{

    public function __construct(LocationRepository $location_repository,UserRepository $user_repository){
    	$this->middleware('auth:web');
    	$this->location_repository = $location_repository;
    	$this->user_repository = $user_repository;
    }
    public function index(){
    	$allStates = $this->location_repository->getAllStates();
    	return view('front.my_account.my_account')->with(['user'=>Auth::user(),'allStates'=>$allStates]);
    }

    public function update_user(UserRequest $request){
    	return $this->user_repository->update_user($request);
    }

    public function update_password(Request $request){
    	return $this->user_repository->update_password($request);
    }

}
