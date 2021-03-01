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
            'user_name' => 'required|string|min:3|max:30' ,
            'name' => 'required|string|min:3|max:30|regex:/^[a-zA-Z]+$/u' ,
            'surname' => 'required|string|min:3|max:30|regex:/^[a-zA-Z]+$/u' ,
            'email' => 'required|email|unique:service_providers|min:5|max:150' ,
            'ceptelefonu' => 'required|unique:service_providers|regex:/^[0-9]+$/' ,
            'password' => 'required|confirmed|min:6|max:150' ,
            'company_title' => 'required|string|unique:service_providers|min:1|max:150' ,
            'business_name' => 'required|string|min:1|max:150' ,
            'kep_address' => 'required|email|min:3|max:150' ,
            'tax_number' => 'required|numeric|min:9|max:12' ,
            'ilvergi_mudurlugu' => 'required|max:20' ,
            'tckimlik' => 'required|unique:service_providers' ,
            'work_number' => 'required|numeric' ,
            'province' => 'required|numeric' ,
            'district' => 'required|numeric' ,
            'address' => 'required|min:5|max:250' ,
            'sozleshmecheck' => 'required' ,
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => 'Kullanıcı adı alanı boş bırakılamaz.',
            'user_name.string' => 'Kullanıcı adı alanına  girdiginiz içerik yazı tipi değildir.',
            'user_name.min' => 'Kullanıcı adı en az 3 karakter olabilir. ',
            'user_name.max' => 'Kullanıcı adı en fazla 30 karakter olabilir.',

            'name.required' => 'İsim  alanı boş bırakılamaz.',
            'name.string' => 'İsim alanı girdiginiz içerik yazı tipi değildir.',
            'name.min' => 'İsim en az 3 karakter olabilir.',
            'name.max' => 'İsim en fazla 30 karakter olabilir.',
            'name.regex' => 'İsim alanında alfabetik karakterlerden başka karakter kullanılmaz.',

            'surname.required' => 'Soyad alanı boş bırakılamaz.',
            'surname.string' => 'Soyad alanına girdiginiz içerik yazı tipi değildir. ',
            'surname.min' => 'Soyad  en az 3 karakter.',
            'surname.max' => 'Soyad en fazla 30 karakter.',
            'surname.regex' => 'Soyad alanında alfabetik karakterlerden başka karakter kullanılmaz.',

            'email.required' =>'email alanı boş bırakılamaz.',
            'email.email' =>'email email',
            'email.unique' =>'email tekrar olunmaz.',
            'email.min' =>'email en az 5 karakter olabilir.',
            'email.max' =>'email en fazla  150 karakter olabilir.',

            'ceptelefonu.required' => 'Cep telefonu alanı boş bırakılamaz.',
            'ceptelefonu.unique' => 'Ceptelefonu  tekrar olunmaz.',
            'ceptelefonu.regex' => 'Ceptelefonu  alanına sadece harf girile bilir rakam kullanılmaz.',

            'password.required' => 'Şifre  alanı boş bırakılamaz.',
            'password.confirmed' => 'Şifre ',
            'password.min' => 'Şifre en az 6 karakter olabilir.',
            'password.max' => 'Şifre en fazla  150 karakter olabilir.',

            'company_title.required' => 'Şirket ünvanı alanı boş  bırakılamaz.',
            'company_title.string' => 'Şirket ünvanı  içerik yazı tipi değildir.',
            'company_title.unique' => 'Şirket ünvanı tekrar olunmaz.',
            'company_title.min' => 'Şirket ünvanı en az 1 karakter olabilir.',
            'company_title.max' => 'Şirket ünvanı en fazla  150 karakter olabilir.',

            'business_name.required' => 'İşletme adı alanı boş bırakılamaz.' ,
            'business_name.string' => 'İşletme adı içerik yazı tipi değildir.' ,
            'business_name.min' => 'İşletme adı en az 1 karakter olunmaz.' ,
            'business_name.max' => 'İşletme adı en fazla 150  karakter olunmaz.' ,

            'kep_address.required' => 'E-posta adresi alanı boş bırakılmaz.',
            'kep_address.email' => 'E-posta adresi email',
            'kep_address.min' => 'E-posta adresi en az 3 karakter olabilir.',
            'kep_address.max' => 'E-posta adresi en fazla 150  karakter olabilir.',

            'tax_number.required' => 'Vergi numarası alanını boş bırakılmaz.',
            'tax_number.numeric' => '',
            'tax_number.min' => 'Vergi numarası en az 10 karakter olabilir.',
            'tax_number.max' => 'Vergi numarası en fazla  11 karakter olabilir.',

            'ilvergi_mudurlugu.required' => 'Vergi dairesi alanı boş bırakılmaz.',
            'tckimlik.required' => 'Tc kimlik no alanı boş bırakılamaz.',
            'tckimlik.unique' => 'Tc kimlik tekrar olunmaz.' ,

            'work_number.required' => 'İş telefonu alanını boş bırakılmaz.' ,
            'work_number.numeric' => 'İş telefonu ' ,
            'province.required' => 'İl Bilgisi girmek zorunludur' ,
            'province.numeric' => 'İl Bilgisi rakam olarak girilmelidir' ,
            'district.required' => 'İlçe Bilgisi girmek zorunludur' ,
            'district.numeric' => 'İlçe Bilgisi rakam olarak girilmelidir' ,

            'address.required' => 'Adres alanını boş bırakılamaz.',
            'address.min' => 'Adres en az karakter 5 olabilir.',
            'address.max' => 'Adres en fazla karakter 250 olabilir.',

            'sozleshmecheck.required' => 'Kabul ediyorum'

        ];
    }
}
