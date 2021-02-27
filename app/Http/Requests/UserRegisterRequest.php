<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
          'name'  => 'required|string',
          'lastname'  => 'required|string',
          'email'  => 'required|email|unique:users',
          'number'  => 'required|numeric|unique:users',
          'password'  => 'required|confirmed',
          'gender'  => 'required|string',
          'birthdate'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'İsim alanını boş brakamazsınız.',
            'lastname.required'  => 'Soyad alanını boş bırakamazsınız. ',
            'email.email'  => 'Email alanını boş bırakamazsınız',
            'number.required'  => 'Numara alanını boş bırakamazsınız',
            'password.required'  => 'Şifre alanını boş bırakamazsınız',
            'gender.required'  => 'Kayıt ola bilmeniz için Cinsiyyet seçmeniz gerekmektedir',
            'birthdate.required'  => 'Kayıt ola bilmeniz için doğum tarihinizi girin ',

            'name.string'  => 'İsim alanını boş brakamazsınız.',
            'lastname.string'  => 'Soyad alanını boş bırakamazsınız. ',
            'email.email'  => 'Email alanını boş bırakamazsınız',
            'email.unique'  => 'Bu Email ile daha önceden hesap oluşturulmuş.Eğer siz değilseniz Bizimle iletişime geçin. ',
            'number.unique'  => 'Bu Numara ile daha önceden hesap oluşturulmuş.Eğer siz değilseniz Bizimle iletişime geçin. ',
            'number.required'  => 'Numara alanını boş bırakamazsınız',
            'password.required'  => 'Şifre alanını boş bırakamazsınız',
            'password.confirmed'  => 'Girdiğiniz şifreler eşleşmiyor lütfen tekrar deneyin ',
            'gender.string'  => 'Kayıt ola bilmeniz için Cinsiyyet seçmeniz gerekmektedir',
        ];
    }


}


