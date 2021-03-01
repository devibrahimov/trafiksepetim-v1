<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function home(){
        return view('adminpanel.pages.home');
    }
    public function login(){
        return view('adminpanel.login');
    }

    public function administratorlogin(Request $request){

        $this->validate($request,[
            'email'=>'required|email|max:80',
            'password'=>'required|max:80'
        ],[
            'email.required'=>'Email alanını boş bırakamazsınız',
            'email.email'=>'Email alanını email yazılım kurallarına uymuyor',
            'password.required'=>'Email alanını boş bırakamazsınız'
        ]);

        if ( auth()->guard('administrator')->attempt([
            'email'=>$request->email,
            'password'=> $request->password,
             ])){
            request()->session()->regenerate();
            return redirect()->intended('/adminpanel/anasayfa') ;
        }else{
            $errors = ['email'=>'Hatalı Giriş'];
            return back()->withErrors($errors);
        }

    }

    public function adminpage(){
        return view('adminpanel.pages.adminpage');
    } public function adminstore(Request $request){
    $validatedData = $request->validate([
        'name' => 'required|string|max:80',
        'email' => 'required|email|unique:administrator|max:80',
        'password' => 'required|max:80|confirmed|unique:administrator',
    ],[
        'name.required' => '',
        'name.string' => '',
        'name.max' => '',
        'email.required' => '',
        'email.email' => '',
        'email.unique' => '',
        'email.max' => '',
        'password.required' => 'required',
        'password.max' => 'max',
        'password.confirmed' => 'confirmed',
        'password.unique' => 'unique',
         ]);

    $data =[
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 1,
        'token' => rand(0,948489484)
    ];

     Administrator::insert($data);

    }
}
