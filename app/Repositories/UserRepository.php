<?php 
namespace App\Repositories;
use Illuminate\Http\Request;
use App\Models\{
	User, Sellers
};
use Session;
use App\CommonHelper;

use Carbon\Carbon;
use App\Mail\SendOtp;

use Illuminate\Support\Facades\{
    Hash,Auth,Mail
};
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Mail\VerificationEmail;
use Exception;

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

    /**
     * Handle Login Request
    */
    public function check_login($request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $remember_me = $request->has('remember') ? true : false; 
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember_me)) {
            //$this->common_helper->setFlashMessage($request,'Login successfully','success');
            return redirect()->route('user-dashboard')->with('success', 'User Logged In Successfully');
        }
        return redirect()->back()->with('danger', 'Wrong Credentials');
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
            'first_name'=>$request->fname,
            'last_name'=>$request->lname,
            'email'=>$request->email,
            'phone_number'=>$request->mobile,
            'password'=>Hash::make($request->password),
            'website'=>$request->website,
            'email_verification_token' => Str::random(32)
        );
        $user = User::create($user);
        \Mail::to('testuc22@gmail.com')->send(new VerificationEmail($user));
        if($user) {
            $seller = new Sellers;
            $seller->user_id = $user->id;
            $seller->name = $request->company_name;
            $seller->email = $request->company_email;
            $seller->phone_number = $request->company_number;
            $seller->type = $request->business;
            $seller->address1  = $request->company_address;
            $seller->save();
        }
        return true;
    }
    public function getUserByID($request,$user_id){
        return User::find($user_id);
    }

    /**
     * Send Password Reset Link
     */
    public function send_reset_password_link($request){
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function verifyEmail($token = null)
    {
        $user = User::where('email_verification_token',$token)->first();
        if($user == null) {
            return redirect()->route('login')->with('success', 'Email Already Verified');
        }
        $user->update([
            'email_verified_at' => Carbon::now(),
            'email_verification_token' => ''

        ]);
        return true;
    }

    /**
     * Pasword chnage Request
     */
    public function passwordReset($request)
    {
        $request->validate(
            [
                'token' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed|min:6',
            ]
        );

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        return true;
    }

    /**
     * User Profile Update Request
     */
    public function updateProfile($request, $id)
    {
        $user = User::find($id);
        $user->first_name = $request->fname;
        $user->last_name = $request->lname;
        $user->phone_number = $request->mobile;
        $user->website = $request->website;
        $user->email = $request->email;
        $user->save();
        return true;
    }

    /**
     * User Password Change Request
     */
    public function updatePassword($request, $id)
    {
        $user = User::find($id);
        $matchPassword = Hash::check($request->old_password, $user->password);
        if(!$matchPassword){
            throw new  Exception('Password Does Not Match, Please Provide Vaild Password');
        }
        $user->password = Hash::make($request->password);
        $user->save();

        return true;
    }

    /**
     * User Company Detail Info
     */
    public function companyDetail($id)
    {
        $user = User::with('sellers')->find($id);
        return $user->sellers;
    }

    /**
     * Get Seller Id By User Id
     */
    public function getSellerByUserId($id)
    {
        $seller = Sellers::where('user_id', $id)->first();
        return $seller;
    }
}
?>