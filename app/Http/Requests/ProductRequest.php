<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=>'required|max:150',
            'description'=>'required|max:150',
            'logo'=>'image|max:5000',
            'category_id'=>'required',
            'manufactor_id'=>'required',
            'price'=>'required|numeric',
            'active'=>'boolean',
            'quantity'=>'required|integer'
        ];
    }

    public function attributes()
    {
        return [
            'name'=>__('admin/products.name'),
            'description'=>__('admin/products.description'),
            'logo'=>__('admin/products.logo'),
            'category_id'=>__('admin/categories.category'),
            'manufactor_id'=>__('admin/manufactories.manufactor'),
            'price'=>__('admin/products.price'),
            'active'=>__('admin/products.active'),
            'quantity'=>__('admin/products.quantity')
        ];
    }
}
