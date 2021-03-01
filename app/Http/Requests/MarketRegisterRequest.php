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
            'user_name' => 'required|string|min:3|max:30',
            'email' => 'required|email|min:5|max:150' ,
            'password' => 'required|string|confirmed|min:6|max:150',
            'market_name' => 'required|string|min:2|max:50',
            'user_type' => 'required|string|min:5|max:20',
            'kep_address' => 'required|email|min:5|max:150',
            'tax_number' => 'required|numeric|min:10|max:11',
            'ilvergi_mudurlugu' => 'required|max:20' ,

            'number' => 'required|numeric|regex:/^[0-9]+$/' ,
            'work_number' => 'required|numeric|regex:/^[0-9]+$/' ,
            'province' => 'required|numeric' ,
            'district' => 'required|numeric' ,
            'postcode' => 'required|numeric|max:10' ,
            'address' => 'required|min:10|max:250' ,
            'hesabsahibiadi' => 'required|min:5|max:150' ,
            'bank' => 'required' ,
            'ibanno' => 'required|numeric|min:24|max:25' ,
            'sozleshmecheck' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'sozleshmecheck.required'=> 'Sözleşmaeyi Kabul Etmeden Kayıt olamassınız',

            'user_name.required' =>       "Kullanıcı adı  alanı boş bırakılamaz",
            'user_name.string' =>         "Kullanıcı adı alanına  girdiğiniz içerik  yazı tipi değildir",
            'user_name.min' =>            "Kullanıcı adı en az 3 karakter olabilir." ,
            "user_name.max "=>            "Kullanıcı adı en fazla 30 karakter olabilir.",
             "email.required"=>                     "Email alanı boş bırakılmaz.",
             "email.email"=>                 "Email alanı email yazım kuralarına uygun değildir."  ,
             "email.min"=>                     "Email kısmı en az 5 karakter olabilir.",
             "email.max"=>                     "Email kısmı en fazla 150 karakter olabilir." ,
             'password.required' =>                 "şifre alanı boş bırakılamaz.",
             'password.string' =>                 "şifre alanına girdiğiniz yazı tipi değildir."  ,
             'password.confirmed' =>                 "Girdiğiniz Şifreler uyuşmuyor.Tekrar deneyin." ,
             'password.min' =>                 "şifre en az 6 karakter olabilir.",
             'password.max' =>                 "şifre en fazla 150 karakter olabilir.",
             'market_name.required' =>              "Mağaza alanı doldurmak zorunludur." ,
             'market_name.string' =>              "Mağaza alanı girdiğiniz  yazı tipi değildir.",
             'market_name.min' =>              "Mağaza alanı en az 2 karakter olabilir.",
             'market_name.max' =>              "Mağaza alanı en fazla 50 karakter olabilir.",
             'user_type.required' =>                "Üyelik türü alanı boş bırakılamaz.",
             'user_type.string' =>                "Üyelik türü alanı girdiğiniz yazı tipi değildir",
             'user_type.min' =>                "Üyelik türü alanı en az 5 karakter olabilir.",
             'user_type.max' =>                "Üyelik türü alanı en fazla 20 karakter olabilir.",
             'kep_address.required' =>              "E-posta adresi alanı boş bırakılmaz.",
             'kep_address.email' =>         "E posta alanı email yazım kurallarına uygun değildir.",
             'kep_address.min' =>              "E-posta adresi alanı en az 5 karakter olabilir.",
             'kep_address.max' =>              "E-posta adresi alanı en fazla 150 karakter olabilir.",
             'tax_number.required' =>               "Vergi numarası alanı boş bırakılmaz.",
             'tax_number.numeric' =>               "Vergi numarası alanına rakam giriniz.",
             'tax_number.min' =>               "Vergi numarası alanı en az 10 karakter olabilir. ",
             'tax_number.max' =>               "Vergi numarası alanı en fazla 11 karakter olabilir.",
             'ilvergi_mudurlugu.required' =>        "vergi dairesi alanı boş bırakılmaz.",
             'ilvergi_mudurlugu.max' =>        "vergi dairesi alanı en fazla 20 karakter olabilir.",
             'number.required' =>                   "Cep telefonu alanı boş bırakılmaz.",
             'number.numeric' =>                   "Cep telefonu alanına rakam giriniz.",
             "number.regex"     =>              "Numara alanında sadece sayısal karakterler (0-9)",
             'number.min' =>                   "Cep telefonu alanı en az 0 karakter olabilir.",
             'number.max' =>                   "Cep telefonu alanı en fazla 9 karakter olabilir.",
             'work_number.required' =>              "İş telefonu alanı boş bırakılmaz.",
             'work_number.numeric' =>              "İş telefonu alanına rakam giriniz.",
             "work_number.regex" =>                "İş telefonu alanına sadece sayısal karakterler (0-9)",
             'work_number.min' =>              "İş telefonu alanı en az 0 karakter olabilir.",
             'work_number.max' =>               "İş telefonu alanı en fazla 9 karakter olabilir.",
             'province.required' =>                  "İl şeçin alanı boş bırakılmaz.",
             'province.numeric' =>                  "İl şeçin alanına rakam giriniz.",
             'postcode.required' =>                  "Posta kodu alanı boş bırakılmaz.",
             'postcode.numeric' =>                  "Posta kodu alanına rakam giriniz.",
             'postcode.max' =>                  "Posta kodu alanı en fazla 10 karakter olabilir.",
             'address.required' =>                   "Adres alanı boş bırakılmaz.",
             'address.min' =>                   "Adres alanı en az 10 karakter olabilir.",
             'address.max' =>                    "Adres alanı en fazla 250 karakter olabilir.",
             'hesabsahibiadi.required' =>             "Hesap Sahibi Adı Soyadı/Ünvanı alanı boş bırakılmaz.",
             'hesabsahibiadi.min' =>             "Hesap Sahibi Adı Soyadı/Ünvanı alanı en az 5 karakter olabilir.",
             'hesabsahibiadi.max' =>              "Hesap Sahibi Adı Soyadı/Ünvanı alanı en fazla 150 karakter olablir.",
             'bank.required' =>                        "Banka bilgileri alanı boş bırakılmaz.",
             'ibanno.required' =>                      "Iban no alanı boş bırakılmaz.",
             'ibanno.numeric' =>                      "Iban no alanına rakam giriniz.",
             'ibanno.min' =>                      "Iban no alanı en az 24 karakter olabillir.",
             'ibanno.max' =>                      "Iban no alanı en fazla 25 karakter olabilir.",
             'sozleshmecheck.required' =>              "Kabul ediyorum alanı boş bırakılmaz.",

             'email.required' =>   'E-Mail alanı boş bırakılmaz.'  ,
             'email.email' =>      'Email alına sadece email yaza bilirsiniz'  ,
             'email.unique' =>     'Girdiğiniz email adresi Sistemimize daha önceden kaydolunmuş.',

             'password.required' =>     'Şifre alanı boş bırakılmaz.',
             'password.confirmed' =>     'Girdiğiniz Şifreler uyuşmuyor.Tekrar deneyin',
             'password.string' =>        'Şifre alanına girdiğiniz yazı yazı tipi değildir',

             'market_name.required' =>    'Mağaza alanı boş bırakılmaz.',
             'market_name.string' =>     'mağaza alanına girdiğiniz yazı yazı tipi değildir',
             'market_name.regex' =>      'Mağaza alanına sadece Harf girilebilir rakam kullanılmaz.',
             'market_name.unique' =>      'Bu Mağaza adı daha önce kaydolunmuş.',

             'categorygroup.required' =>   'alanını doldurmak zorunludur',
             'categorygroup.string' =>       'alanında girdiğiniz yazı yazı tipi değildir',
             'categorygroup.regex' =>        'Alanına sadece Harf girilebilir rakam kullanılmaz.',

             'user_type.required' =>     'Üyelik türü alanı boş bırakılmaz.',
             'user_type.string' =>       'Üyelik türü alanına girdiğiniz yazı yazı tipi değildir',
             'user_type.regex' =>        ' Üyelik türü alanına sadece Harf girilebilir rakam kullanılmaz.',

             'company_title.required' =>     'Şirket unvanu alanı doldurmak zorunludur',
             'company_title.string' =>       'Şirket unvanı alanına girdiğiniz yazı yazı tipi değildir',
             'company_title.regex' =>        'Şirket unvanı alanına  sadece Harf girilebilir rakam kullanılmaz.',

            ];
    }
}
