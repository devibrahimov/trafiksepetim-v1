<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarketRegisterRequest extends FormRequest
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
                'user_name' => 'required|string',
                'email' => 'required|email|max:50' ,
                'password' => 'required|string|confirmed' ,
                'market_name' => 'required|string|max:50' ,
                'user_type' => 'required|string|max:20' ,
                'kep_address' => 'required' ,
                'tax_number' => 'required' ,
                'ilvergi_mudurlugu' => 'required' ,

                'number' => 'required' ,
                'work_number' => 'required' ,
                'province' => 'required' ,
                'district' => 'required' ,
                'postcode' => 'required' ,
                'address' => 'required' ,
                'hesabsahibiadi' => 'required' ,
                'bank' => 'required' ,
                'ibanno' => 'required' ,
                'sozleshmecheck' => 'required'
                ];
    }

    public function messages()
    {
         return [
             'sozleshmecheck.required'=> 'Sözleşmaeyi Kabul Etmeden Kayıt olamassınız',

             'user_name.required' =>    'Kullanici adi  alani bosh birakilamaz',
             'user_name.string' =>      'alanında girdiğiniz yazı yazı tipi değildir',
             'user_name.regex' =>       'Alanına sadece Harf girile bilir rakam kullanılmaz.' ,

             'email.required' =>   'alanını doldurmak zorunludur'  ,
             'email.email' =>      'Email alına sadece email yaza bilirsiniz'  ,
             'email.unique' =>     'Girdiğiniz email adresi Sistemimize daha önceden kaydolunmuş.',

             'password.required' =>     'alanını doldurmak zorunludur',
             'password.confirmed' =>     'Girdiğiniz Şifreler uyuşmuyor.Tekrar deneyin',
             'password.string' =>        'alanında girdiğiniz yazı yazı tipi değildir',

             'market_name.required' =>    'alanını doldurmak zorunludur',
             'market_name.string' =>     'alanında girdiğiniz yazı yazı tipi değildir',
             'market_name.regex' =>      'Alanına sadece Harf girile bilir rakam kullanılmaz.',
             'market_name.unique:market_general' =>      'Bu Mağaza adı daha önce Kaydolmuştur.',

             'categorygroup.required' =>   'alanını doldurmak zorunludur',
             'categorygroup.string' =>       'alanında girdiğiniz yazı yazı tipi değildir',
             'categorygroup.regex' =>        'Alanına sadece Harf girile bilir rakam kullanılmaz.',

             'user_type.required' =>     'alanını doldurmak zorunludur',
             'user_type.string' =>       'alanında girdiğiniz yazı yazı tipi değildir',
             'user_type.regex' =>        'Alanına sadece Harf girile bilir rakam kullanılmaz.',

             'company_title.required' =>   'alanını doldurmak zorunludur',
             'company_title.string' =>       'alanında girdiğiniz yazı yazı tipi değildir',
             'company_title.regex' =>        'Alanına sadece Harf girile bilir rakam kullanılmaz.',

            ];
    }
}
