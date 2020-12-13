<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccountRequest extends FormRequest
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

    public $isUpdating=false;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'=>'required|max:150',
            'last_name'=>'required|max:150',
            'email'=>'required|email',
            'gender'=>'required',
            'password'=>Rule::requiredIf(!$this->isUpdating),
            'password'=>'max:150',
            'logo'=>'image|max:5000'
        ];
    }

    public function attributes()
    {
        return [
            'first_name'=>__('admin/account.first_name'),
            'last_name'=>__('admin/account.last_name'),
            'email'=>__('admin/account.email'),
            'gender'=>__('admin/account.gender'),
            'password'=>__('passwords.password'),
            'logo'=>__('admin/account.logo'),
            'mobile'=>__('admin/account.mobile')
        ];
    }
}
