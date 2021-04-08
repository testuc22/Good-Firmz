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
            'product_name' => 'required',
            'price' => 'required',
            'product_category' => 'required',
            'product_desc' => 'required',
            /*'meta.*.key'  => 'required',
            'meta.*.value'  => 'required',*/

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
            'product_name.required' => 'Product Name Required*',
            'product_category.required' => 'Product Category Required*',
            'product_desc.required' => 'Product Description Required*',
            'price.required' => 'Required*',
        ];
    }
}
