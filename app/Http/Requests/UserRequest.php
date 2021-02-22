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
        $id = Auth::guard('web')->check() ? Auth::guard('web')->id() : $this->id;
        $rules = [
            'first_name'=>'required',
            'last_name'=>'required',
            'phone_number'=>'required|numeric',
            'email' => 'required|email|unique:users,email,'.$id
        ];
        
        if(!Auth::guard('web')->check()){
            $rules['password'] =  'required|confirmed';
        }
        return $rules;
    }
}
