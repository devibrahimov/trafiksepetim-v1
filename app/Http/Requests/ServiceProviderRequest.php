<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceProviderRequest extends FormRequest
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
            'user_name' => 'required|string' ,
            'name' => 'required|string' ,
            'surname' => 'required|string' ,
            'email' => 'required|email|unique:service_providers' ,
            'ceptelefonu' => 'required|unique:service_providers' ,
            'password' => 'required|confirmed' ,
            'company_title' => 'required|string' ,
            'business_name' => 'required|string' ,
            'kep_address' => 'required' ,
            'tax_number' => 'required' ,
            'ilvergi_mudurlugu' => 'required' ,
            'tckimlik' => 'required|unique:service_providers' ,
            'work_number' => 'required' ,
            'province' => 'required' ,
            'district' => 'required' ,
            'address' => 'required' ,
            'sozleshmecheck' => 'required' ,
        ];
    }
}
