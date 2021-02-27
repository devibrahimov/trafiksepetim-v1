<?php
/**
 * @author KOALAMEDYA
 * @company EMRE AKINCL A.Ş.
 * @url koalamedya.com
 * @date 15.10.2020
 * @developer Baylar Ibrahimov
 *
 */
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{


    /** MARKET LOGIN */
    public function marketloginform(){

         return view('pages.market.login');
    }
    public function marketloginpost(Request $request){
         $this->validate($request,[
             'email'=>'required|email',
             'password'=>'required'
         ],[
             'email.required'=>'Email alanını boş bırakamazsınız',
             'email.email'=>'Email alanını email yazılım kurallarına uymuyor',
             'password.required'=>'Email alanını boş bırakamazsınız'
         ]);

         if ( auth()->guard('market')->attempt(['email'=>$request->email,'password'=> $request->password]) ){
             request()->session()->regenerate();
             return redirect()->intended('/') ;
         }else{
             $errors = ['email'=>'Hatalı Giriş'];
             return back()->withErrors($errors);
         }

     }
    public function marketlogout(){
        \auth()->guard('market')->logout();
        \request()->session()->flush();
        \request()->session()->regenerate();
        return redirect()->route('home');
    }
    /** END MARKET LOGIN */



    /** SERVICE LOGIN */
    public function serviceloginform(){
        return view('pages.service.login');
    }
    public function serviceloginpost(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ],[
            'email.required'=>'Email alanını boş bırakamazsınız',
            'email.email'=>'Email alanını email yazılım kurallarına uymuyor',
            'password.required'=>'Email alanını boş bırakamazsınız'
        ]);

        if ( auth()->guard('service')->attempt(['email'=>$request->email,'password'=> $request->password]) ){
            request()->session()->regenerate();
            return redirect()->intended('/') ;
        }else{
            $errors = ['email'=>'Hatalı Giriş'];
            return back()->withErrors($errors);
        }

    }
    public function servicelogout(){
        \auth()->guard('service')->logout();
        \request()->session()->flush();
        \request()->session()->regenerate();
        return redirect()->route('home');
    }
    /** END SERVICE LOGIN */






    /** USER LOGIN */
    public function userloginform(){
        return view('site.pages.user.login');
    }
    public function userloginpost(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ],[
            'email.required'=>'Email alanını boş bırakamazsınız',
            'email.email'=>'Email alanını email yazılım kurallarına uymuyor',
            'password.required'=>'Email alanını boş bırakamazsınız'
        ]);
        if ( auth()->attempt(['email'=>$request->email,'password'=> $request->password]) ){
            request()->session()->regenerate();
            return redirect()->intended('/') ;
        }else{
            $errors = ['email'=>'Hatalı Giriş'];
            return back()->withErrors($errors);
        }
    }
    public function userlogout(){
        \auth()->logout();
        \request()->session()->flush();
        \request()->session()->regenerate();
        return redirect()->route('home');
    }


    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

       $user->token;
    }
    /** END USER LOGIN */




}
