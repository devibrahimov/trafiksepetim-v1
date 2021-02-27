<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarketRegisterRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Model\CompanyBusiness;
use App\Model\Marketgeneral;
use App\Model\MarketUser;
use App\Model\PresonelBusiness;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{


    public function store(MarketRegisterRequest $request)
    {
        $user_name = $request->user_name ;
        $email = $request->email ;
        $password = $request->password ;
        $market_name = $request->market_name ;
        $user_type = $request->user_type ;

        $business_name = $request->business_name ;
        $kep_address = $request->kep_address ;
        $tax_number = $request->tax_number ;
        $ilvergimudurlukleri = $request->ilvergi_mudurlugu ;

        $number = $request->ceptelefonu ;
        $work_number = $request->istelefonu ;
        $province = $request->province ;
        $district = $request->district ;
        $postcode = $request->postcode ;
        $address = $request->address ;
        $hesabsahibiadisoyadi = $request->hesabsahibiadi ;
        $bank = $request->bank ;
        $ibanno = $request->ibanno ;
        $sozleshmecheck= $request->sozleshmecheck;
        /**
         * general_market tablosuna eklenen verilerin eklendiği bölüm
         */
        $uniqueemail =  Marketgeneral::where('register_completed' ,1)->where('email',$email)->first();
        if ($uniqueemail){
            return response()->json( ['message' => "$email mail adresi daha önce sistemimize Kaydolmuştur"], 205);
        }
        $ifSaveEmail = Marketgeneral::where('register_completed' ,0)->where('email',$email)->first();

        if(!$ifSaveEmail){
            $marketgeneral = new Marketgeneral();

            $marketgeneral->user_name =$user_name;
            $marketgeneral->email =$email;
            $marketgeneral->password =Hash::make($password) ;
            $marketgeneral->api_token = Str::random(60) ;
            $marketgeneral->market_name =$market_name;
            $marketgeneral->user_type =$user_type;
            $marketgeneral->sozlesme = $sozleshmecheck;
            $marketgeneral->save();

            $marketgeneralid = $marketgeneral->id;
        }else{
            $marketgeneralid = $ifSaveEmail->id;
        }

        if ($user_type == 'personal'){
            $validator = $request->validate([
                'sahisadi'=>'required|string',
                'sahissoyadi'=>'required|string',
                'tckimlik'=>'required|numeric'
            ],[
                'sahisadi.required'=>'İsim Alanını boş bırakamazsınız',
                'sahissoyadi.required'=>'Soyad alanını boş bırakamazsınız',
                'tckimlik.required'=>'TCkimlik alanını boş bırakamazsınız',
                'sahisadi.string'=>'İsim Alanına sadece metin gire bilirsiniz',
                'sahissoyadi.string'=>'Soyad alanına sadece metin gire bilirsiniz',
                'tckimlik.numeric'=>'TCkimlik alanına sadece rakam gire bilirsiniz'
            ]);
            if(isset($validator->fails)){
                return response()->json($validator->messages(),422);
            }
            $personalbussines = PresonelBusiness::where('market_id',$marketgeneralid)->first();
            if(!$personalbussines){
                $sahisadi    = $request->sahisadi       ;
                $sahissoyadi = $request->sahissoyadi    ;
                $tckimlik    = $request->tckimlik       ;
                $PresonelBusiness = new PresonelBusiness();

                $PresonelBusiness->sahisadi = $sahisadi ;
                $PresonelBusiness->market_id = $marketgeneralid ;
                $PresonelBusiness->sahissoyadi =  $sahissoyadi;
                $PresonelBusiness->tckimlik = $tckimlik ;
                $PresonelBusiness->business_name = $business_name ;
                $PresonelBusiness->kep_address =  $kep_address;
                $PresonelBusiness->tax_number =  $tax_number;
                $PresonelBusiness->ilvergi_mudurlugu = $ilvergimudurlukleri ;
                $PresonelBusiness->save();
            }

        }

        if ($user_type == 'company'){
            $companybussines = CompanyBusiness::where('market_id',$marketgeneralid)->first();
            $validator = $request->validate([
                'chamber_of_commerce'=>'required|string',
                'trade_registry_number'=>'required|string',
                'company_type'=>'required',
                'company_title'=>'required'
            ],[
                'company_type.required'=>'Şirket tipi alanını boş bırakamazsınız',
                'company_title.required'=>'Şirket Ünvanı alanını boş bırakamazsınız',
                'chamber_of_commerce.required'=>'İsim Alanını boş bırakamazsınız',
                'chamber_of_commerce.required'=>'Soyad alanını boş bırakamazsınız',
                'trade_registry_number.required'=>'TCkimlik alanını boş bırakamazsınız',
                'trade_registry_number.string'=>'İsim Alanına sadece metin gire bilirsiniz'
            ]);
            if(isset($validator->fails)){
                return response()->json($validator->messages(), 422);
            }
            $chamber_of_commerce = $request->chamber_of_commerce ;
            $trade_registry_number = $request->trade_registry_number ;
            $company_type = $request->company_type;
            $company_title = $request->company_title;
            $yetkiliname = $request->yetkiliname;
            $yetkilisurname = $request->yetkilisurname;
            if (!$companybussines){
                $companyBusiness = new CompanyBusiness();

                $companyBusiness->market_id = $marketgeneralid ;
                $companyBusiness->company_type = $company_type ;
                $companyBusiness->company_title  =$company_title;
                $companyBusiness->business_name = $business_name ;
                $companyBusiness->chamber_of_commerce = $chamber_of_commerce ;
                $companyBusiness->trade_registry_number = $trade_registry_number ;
                $companyBusiness->kep_address =  $kep_address;
                $companyBusiness->tax_number =  $tax_number;
                $companyBusiness->ilvergi_mudurlugu = $ilvergimudurlukleri ;
                $companyBusiness->yetkiliname = $yetkiliname ;
                $companyBusiness->yetkilisurname = $yetkilisurname ;
                $companyBusiness->save();
            }
        }

        $marketuser = new MarketUser();
        $marketuser->market_id = $marketgeneralid ;
        $marketuser->ceptelefonu  =$number;
        $marketuser->istelefonu  =$work_number;
        $marketuser->il  =$province;
        $marketuser->ilce  =$district;
        $marketuser->postcode  =$postcode;
        $marketuser->adress  =$address;

        $hesapbilgileri = json_encode([
            'hesabsahibiadi'=>$hesabsahibiadisoyadi,
            'bank'=>$bank,
            'ibanno'=>$ibanno,
        ]);

        $marketuser->hesapbilgileri  = $hesapbilgileri ;
        $marketuser->save();

        $generalmarket = Marketgeneral::find($marketgeneralid);
        $generalmarket->register_completed = 1;
        $generalmarket->save();

        return response()->json([
            'alert-type' => 'success',
            'message' => 'Kaydınız Başarılı bir şekilde tamamlandı.Lütfen Giriş yapın'
        ],201);
    }

    public function userstore(UserRegisterRequest $request){
        $name = $request->name;
        $lastname = $request->lastname;
        $email = $request->email;
        $number = $request->number;
        $password = $request->password;
        $gender = $request->gender;
        $birthdate = $request->birthdate;

        $user = new User();


        $user->name =$name ;
        $user->surname =$lastname;
        $user->email = $email;
        $user->number = $number;
        $user->password = Hash::make($password);
        $user->gender = $gender;
        $user->borndate =$birthdate ;

        $save = $user->save();
        if(!$save){
            $notification = [
                'alert-type' => 'error',
                'message' => 'Kayıt işlemi zamanı .İşlem hatası oldu Lütfen tekrar deneyin'
            ];
            return response()->json('userregister')->withInput()->with($notification);
        }else{
            $notification = [
                'alert-type' => 'success',
                'message' => 'Kaydınız Başarılı bir şekilde tamamlandı.Lütfen Giriş yapın'
            ];
            return redirect()->route('userlogin')->withInput()->with($notification);
        }
    }
}
