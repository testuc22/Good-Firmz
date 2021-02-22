<?php 
namespace App\Repositories;
use Illuminate\Http\Request;
use App\Models\{
	User
};
use Session;
use App\CommonHelper;

use Carbon\Carbon;
use App\Mail\SendOtp;

use Illuminate\Support\Facades\{
    Hash,Auth,Mail
};
use Illuminate\Support\Facades\Password;

class UserRepository{
	public function __construct(CommonHelper $common_helper){
        $this->common_helper = $common_helper;
    }
    public function create_temp_user_session($request){
    	$user = array(
    		'first_name'=>$request->first_name,
    		'last_name'=>$request->last_name,
    		'email'=>$request->email,
    		'phone_number'=>$request->phone_number,
    		'password'=>Hash::make($request->password),
    	);
        $user = User::create($user);
        Auth::login($user);
        $this->common_helper->setFlashMessage($request,'User created successfully, Please verify your email.','success');
    	return $user;
    }

    public function send_otp_to_user($request){
        $pin = $this->create_user_otp($request);
        $data = [
            'otp'=>$pin,
            'name'=>Auth::user()->first_name,
            'email'=>Auth::user()->email,
        ];
        Mail::to($data['email'])->send(new SendOtp($data));
        return $request->session()->put('user_register_otp', $pin);
        return $request->session()->put('user_register_otp', "error");

    }
    public function create_user_otp($request){
    	$pin = mt_rand(100000, 999999);
    	return $pin ;
    }
    public function check_otp($request){
    	$session_otp = $request->session()->get('user_register_otp');
    	if($request->otp==$session_otp){
            session('user_register_otp','');
    		return $this->verify_user($request);
    	}
    	$this->common_helper->setFlashMessage($request,'Otp does not match','error');
    	return redirect()->route('verify-otp');
    }
    public function verify_user($request){
        User::where('id', Auth::id())->update(['email_verified_at' => date("Y-m-d H:i:s"),'status'=>0]);
    	$this->common_helper->setFlashMessage($request,'User verified successfully','success');
    	return redirect()->route('my-account');
    }

    public function update_user($request){
        // $this->validateUser($request);
        $data = [
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'state_id'=>$request->state_id,
            'hide_search'=>$request->hide_search ? 1 : 0
        ];
        User::where('id', Auth::id())->update($data);
        $this->common_helper->setFlashMessage($request,'User updated successfully','success');
        return redirect()->route('my-account');
    }

     public function admin_update_user($request,$id){
        // $this->validateUser($request);
        $data = [
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'state_id'=>$request->state_id,
            'status'=>$request->status ? 1 : 0
        ];
        if($request->password){
            $data['password'] = Hash::make($request->password);
        }
        User::where('id', $id)->update($data);
        $this->common_helper->setFlashMessage($request,'User updated successfully','success');
        return redirect()->route('list-users');
    }



    public function update_password($request){
        $request->validate([
            'old_password'=>'required',
            'new_password'=>'required|confirmed',
            'new_password_confirmation'=>'required'
        ]);
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            $this->common_helper->setFlashMessage($request,'Incorrect Old Password','error');
            return redirect()->route('my-account');
        }
        User::where('id', Auth::id())->update(['password'=>Hash::make($request->new_password)]);
        $this->common_helper->setFlashMessage($request,'Password changed successfully','success');
        return redirect()->route('my-account');
    }

    public function check_login($request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            $this->common_helper->setFlashMessage($request,'Login successfully','success');
            return redirect()->route('my-account');
        }
        $this->common_helper->setFlashMessage($request,'Wrong credentials','error');
        return redirect()->route('login');
    }

    public function getAllUsers(){
        return User::orderByDesc('id')->get();
    }

    public function updateStatus($request){
        User::find($request->user)->update(['status'=>$request->status]);
        return response(['message'=>'Status Updated Successfully',200]);
    }
    public function delete_user($request,$id){
        User::find($id)->delete();
        $this->common_helper->setFlashMessage($request,'User deleted successfully','success');
        return redirect()->route('list-users');
    }
    public function admin_create_user($request){
        $user = array(
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'password'=>Hash::make($request->password),
            'state_id'=>$request->has('state_id') ? $request->state_id : 0,
            'status'=>$request->status ? 1 : 0
        );
        $user = User::create($user);
        $this->common_helper->setFlashMessage($request,'User created successfully.','success');
        return redirect()->route('list-users');
    }
    public function getUserByID($request,$user_id){
        return User::find($user_id);
    }

    public function send_reset_password_link($request){
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }
}
?>