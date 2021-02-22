<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class SellerPostRequest extends FormRequest{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        if(Auth::check()){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        $rules = [
            'name'              =>'required|max:255',
            'categories'        =>'required',
            'email'             =>'nullable|email|unique:sellers,email,'.$this->id,
            'phone_number'      =>'required',
            'address1'          =>'required',
            // 'address2'          =>'required',
            'state_id'          =>'required',
            'city_id'           =>'required',
            'pincode'           =>'required',
            'desc'              =>'required',
        ];
        if(Auth::guard('web')->check()){
            $rules['owe_this_business'] = 'required';
            $rules['terms']    = 'required';
        }
        /*if(!($this->has('_method') && $this->_method=="PUT")){
            $rules['password'] = 'required|confirmed';
            $rules['email']    = 'required|email|unique:sellers';
        }*/
        return $rules;
    }
}
