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
            'email' => 'required|email' ,
            'password' => 'required|string|confirmed' ,
            'market_name' => 'required|string' ,
            'user_type' => 'required|string' ,
            'kep_address' => 'required' ,
            'tax_number' => 'required' ,
            'ilvergi_mudurlugu' => 'required' ,

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


            'user_name.required' =>     'Kullanici adi  alani bosh birakilamaz',
            'user_name.string' =>       'Kullanici adi alanında girdiğiniz yazı yazı tipi değildir',
//            'user_name' =>        'Kullanıcı adı Alanına sadece Harf girile bilir rakam kullanılmaz.' ,

            'email.required' =>          'Email alanını doldurmak zorunludur'  ,
            'email.email' =>             'Email alına sadece email yaza bilirsiniz'  ,

            'password.required' =>      'Şifre alanını doldurmak zorunludur',
            'password.confirmed' =>     'Girdiğiniz Şifreler uyuşmuyor.Tekrar deneyin',
            'password.string' =>        'Şifre alanında girdiğiniz yazı yazı tipi değildir',

            'market_name.required' =>    'Mağaza adı alanını doldurmak zorunludur',
            'market_name.string' =>     'Mağaza adı alanında girdiğiniz yazı yazı tipi değildir',
//            'market_name.regex' =>      'Alanına sadece Harf girile bilir rakam kullanılmaz.',

            'user_type.required' =>     'Şirket tipi alanını doldurmak zorunludur',
            'user_type.string' =>       'Şirket tipi alanında girdiğiniz yazı yazı tipi değildir',
//            'user_type.regex' =>        'Alanına sadece Harf girile bilir rakam kullanılmaz.',

            'company_title.required' =>     'Şirket ünvanı alanını doldurmak zorunludur',
            'company_title.string' =>       'Şirket ünvanı alanında girdiğiniz yazı yazı tipi değildir',
//          'company_title.regex' =>        'Alanına sadece Harf girile bilir rakam kullanılmaz.',
            'province.required' =>           'İl alanını doldurmak zorunludur.',
            'district.required' =>           'İlçe alanını doldurmak zorunludur.',

        ];
    }

}
