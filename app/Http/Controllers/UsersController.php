<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\{
	UserRepository,ProductRepository
};
use Auth;
use Exception;

class UsersController extends Controller
{
    protected $userRepo;
    protected $productRepo;
    public function __construct(UserRepository $userRepo, ProductRepository $productRepo)
    {
        $this->userRepo = $userRepo;
        $this->productRepo = $productRepo;
    }

    public function list_users(){
    	
    }

    public function userDashboard()
    {
    	return view('new-frontend.dashboard');
    }

    public function companyProfile()
    {
        $userId = Auth::id();
        $sellers = $this->userRepo->companyDetail($userId);
        return view('new-frontend.company-profile')->with(['sellers'=>$sellers, 'userId'=>$userId]);
    }

    /**
     * Add New Business of User
     */
    public function addNewBusiness($id)
    {
        return view('new-frontend.add-new-business')->with(['userId'=>$id]);
    }

    public function userProfile()
    {
        $user = Auth::user();
    	return view('new-frontend.user-profile')->with(['user'=>$user]);
    }

    public function userProducts()
    {
        $userId = Auth::id();
        $seller = $this->userRepo->getSellerByUserId($userId);
        $products = $this->productRepo->getUsersProduct($seller->id);
        return view('new-frontend.user-products')->with(['products'=>$products]);
    }

    public function addProduct()
    {
        return view('new-frontend.add-product');
    }

    /**
     * Update User Profile Info
     */
    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'mobile'=>'required',
            'website'=>'required',
            'email'=>'required|email',
        ]);
        $user = $this->userRepo->updateProfile($request, $id);

        return redirect()->back()->with('success', 'User Profile Updated Successfully');
    }

    /**
     * Update User Password
     */
    public function updatePassword(Request $request, $id)
    {
        $request->validate(
            [
                'old_password'=>'required',
                'password'=>'required|confirmed',
                'password_confirmation'=>'required',
            ],
            [
                'old_password.required' => 'Old Password Field Shoud not be Empty',
                'password.required' => 'New Password Field Shoud not be Empty',
                'password_confirmation.required' => 'Confirm Password Field Shoud not be Empty',
            ],
        );
        try {
            $this->userRepo->updatePassword($request, $id);
            return back()->with('success', 'User Password Updated Successfully');
        } catch (Exception $e) {
            return back()->withError($e->getMessage());
        }
    }
}
