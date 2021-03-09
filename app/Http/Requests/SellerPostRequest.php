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
        switch($this->method()) {
            case 'POST':
            $rules = [
                'company_type'      =>'required',
                'company_name'      =>'required|max:255',
                'company_email'     =>'email|unique:sellers,email,',
                'compnay_number'    =>'required',
                'address'           =>'required',
                'city'              =>'required',
                'state'             =>'required',
                'pincode'           =>'required',
                'status'            =>'required',
                'featured'          =>'required',    
            ];
            case 'PUT':
            $rules = [
                'company_type'      =>'required',
                'company_name'      =>'required|max:255',
                'company_email'     =>'required',
                'company_number'    =>'required',
                'address'           =>'required',
                'city'              =>'required',
                'state'             =>'required',
                'pincode'           =>'required',
                'status'            =>'required',
                'featured'          =>'required',
            ];
        }
        return $rules;
    }

    public function messages() {
        return [
            'company_type.required' => 'Required **',
            'company_name.required' => 'Required **',
            'company_email.required' => 'Required **',
            'company_number.required' => 'Required **',
            'address.required' => 'Required **',
            'city.required' => 'Required **',
            'state.required' => 'Required **',
            'pincode.required' => 'Required **',
            'status.required' => 'Required **',
            'featured.required' => 'Required **',
            'meta_title.required' => 'Required **',    
            'meta_tags.required' => 'Required **',    
            'meta_desc.required' => 'Required **',   
        ];
    }
}
