<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\{
	UserRepository,
};

class UsersController extends Controller
{
    //
    public function list_users(){
    	
    }

    public function userDashboard()
    {
    	return view('new-frontend.dashboard');
    }

    public function companyProfile()
    {
    	return view('new-frontend.company-profile');
    }

    public function userProfile()
    {
    	return view('new-frontend.user-profile');
    }

    public function userProducts()
    {
    	return view('new-frontend.user-products');
    }

    public function addProduct()
    {
        return view('new-frontend.add-product');
    }
}
