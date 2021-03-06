<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        $rules = [
            'email' => 'required|email|unique:users,email',
            //'password' => 'required|confirmed',
            'fname'=>'required',
            'lname'=>'required',
            'mobile'=>'required|numeric|min:10',
            /*'website'=>'required',
            'company_name'=>'required',
            'company_email'=>'required',
            'company_number'=>'required|numeric',
            'business'=>'required',
            'company_address'=>'required',*/
        ];

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Required *',
            'fname.required' => 'Required *',
            'lname.required'  => 'Required *',
            'mobile.required'  => 'Required *',
        ];
    }
}
