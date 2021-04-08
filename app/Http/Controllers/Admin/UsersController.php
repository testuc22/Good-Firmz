<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\{
	UserRepository,
	LocationRepository
};
use App\Http\Requests\UserRequest;

class UsersController extends Controller{

    public function __construct(UserRepository $user_repository,LocationRepository $location_repository){
	    //$this->middleware('auth:admin');
	    $this->user_repository = $user_repository;
	    $this->location_repository = $location_repository;
	}

	public function index(){
		$allUsers = $this->user_repository->getAllUsers();
		return view('admin.users.list')->with(['allUsers'=>$allUsers]);
	}

	public function updateStatus(Request $request){
        $result=$this->user_repository->updateStatus($request);
        return $result;
    }

    public function add_user(Request $request){
    	$allStates = $this->location_repository->getAllStates();
        return view('admin.users.create')->with(['allStates'=>$allStates]);
    }
    public function save_user(UserRequest $request){
    	$result=$this->user_repository->admin_create_user($request);
        return redirect()->back()->with('success', 'User Registered Successfully ! Please Check Your Mail For Email Verification');
    }

    public function edit_user(Request $request,$id){
        $user = $this->user_repository->getUserByID($request,$id);
        $allStates = $this->location_repository->getAllStates();
        return view('admin.users.edit')->with(['allStates'=>$allStates,'user'=>$user]);
    }
    public function update_user(Request $request,$id){
        $result=$this->user_repository->admin_update_user($request,$id);
        return $result;
    }
    public function delete_user(Request $request,$id){
        $result=$this->user_repository->delete_user($request,$id);
        return $result;
    }
    public function view_business(Request $request,$id){
    	$userDetails = $this->user_repository->getUserByID($request,$id);
    	return view('admin.users.view_business')->with(['user'=>$userDetails]);
    }

    /**
     * User Email Verification
     * 
    */
    public function verifyEmail($token = null)
    {
        $this->user_repository->verifyEmail($token);
        return redirect()->route('login');
    }
}
