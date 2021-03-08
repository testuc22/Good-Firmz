<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductStoreRequest extends FormRequest
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
    public function rules()
    {
        switch($this->method()) {
            case 'POST':
            $rules = [
                'company_name'     =>'required',
                'business_type'     =>'required',
                'product_category'  =>'required',
                'product_status'  =>'required',
                'product_name' => 'required',
                'product_price' => 'required',
                'product_desc' => 'required',
            ];
        }

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
            'company_name.required' => 'Required *',
            'business_type.required' => 'Required *',
            'product_category.required'  => 'Required *',
            'product_status.required'  => 'Required *',
            'product_name.required'  => 'Required *',
            'product_price.required' => 'Required *',
            'product_desc.required' => 'Required *',
        ];
    }
    
}
