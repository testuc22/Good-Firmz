<?php

namespace App\Http\Controllers;
use App\Models\{
	User,SellerReviews
};
use App\Repositories\{
	UserRepository,
};
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(UserRepository $user_repository){
    	$this->user_repository = $user_repository;
    }
    public function index(){
        if(Auth::guard('web')->check()) return redirect()->route('my-account');
    	return view('new-frontend.login');
    }
    public function register(){
        if(Auth::guard('web')->check()) return redirect()->route('my-account');
    	return view('front.home.register');
    }
    public function register_user(UserRequest $request){
    	$user = $this->user_repository->create_temp_user_session($request);
    	$resp = $this->user_repository->send_otp_to_user($request);
    	return redirect()->route('verify-otp');
    }
	public function verify_otp(){ 
        if(!Auth::guard('web')->check())  return redirect()->route('/');
		$otp = session('user_register_otp');
    	return view('front.home.verify_registration')->with(['otp'=>$otp]);
    }
	public function check_user_otp(Request $request){
		$request->validate([
        	'otp'=>'required',
        ]);
        return $this->user_repository->check_otp($request);
	}   
    public function check_login(Request $request){
        return $this->user_repository->check_login($request);
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flash('success','Logout successfully');
        return redirect()->route('login');
    } 
    public function forgetPassword(Request $request){
        return view('front.home.forget_password');
    }
    public function send_reset_password_link(Request $request){
        return $this->user_repository->send_reset_password_link($request);
    }
    public function reset_password_form(Request $request,$token){
        return view('front.home.reset_password', ['token' => $token,'email'=>$request->email]);
    }
}
