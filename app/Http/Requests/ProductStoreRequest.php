<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
        return [
            'type' => 'required',
            'company_name' => 'required',
            'company_email' => 'required',
            'company_number' => 'required',
            'product_name' => 'required',
            'product_cat' => 'required',
            'product_desc' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'price' => 'required',
            'meta.*.key'  => 'required',
            'meta.*.value'  => 'required',

        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'type.required' => 'Business Type Required*',
            'company_name.required' => 'Company Name Required*',
            'company_email.required' => 'Company Email Required*',
            'company_number.required' => 'Company Number Required*',
            'product_name.required' => 'Product Name Required*',
            'product_cat.required' => 'Product Category Required*',
            'product_desc.required' => 'Product Description Required*',
            'city.required' => 'Required*',
            'state.required' => 'Required*',
            'zip.required' => 'Required*',
            'price.required' => 'Required*',
            'meta.*.key.required'=> 'Required*',
            'meta.*.value.required'=> 'Required*',
        ];
    }
}
