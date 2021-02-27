<?php
/**
 * @author KOALAMEDYA
 * @company EMRE AKINCL A.Ş.
 * @url koalamedya.com
 * @date 15.10.2020
 * @developer Baylar Ibrahimov
 *
 */
namespace App\Http\Controllers\Site\Market;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\HelperController as Helper ;
use App\Model\CompanyBusiness;
use App\Model\Marketgeneral;
use App\Model\MarketUser;
use App\Model\PresonelBusiness;
use  Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MarketProcessController extends Controller
{

    public function updatemarketpassword(Request $request){

        $request->validate([
            'password'=>'required|string|confirmed',
        ],[
            'password.required'=>'Şifre alanları boş bırakılamaz',
            'password.string'=>'Şifre alanı sadece yazı rakam ve harf karkaterleri gire bilirsiniz',
            'password.confirmed'=>'Şifreler eşleşmiyor lütfen iki alandada şifrelerin aynı olmasına dikkat edin'
        ]);

        $id = Auth::guard('market')->user()->id;
        $market = Marketgeneral::find($id);
            $market->password = Hash::make($request->password);
        $market->save();
        /** Kullanıcı Şifreyi değiştirdiği zaman çıkış yapsın */
        \auth()->guard('market')->logout();
        \request()->session()->flush();
        \request()->session()->regenerate();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Şifreniz başarıyla değiştirildi.Lütfen yeniden giriş yapın'
        ];
         return redirect()->route('userlogin')->withInput()->with($notification);




    }
    public function market_formupdate(Request $request){

        $id = Auth::guard('market')->user()->id;
        $market = Marketgeneral::find($id);

        $market->user_name = $request->user_name ;

        $market->save();

        //        if($market->user_type == 'personal'){
//            $PresonelBusiness =  PresonelBusiness::where('market_id',$id)->first();
//
//            $PresonelBusiness->business_name = $request->business_name ;
//            $PresonelBusiness->kep_address = $request->kep_address ;
//            $PresonelBusiness->tax_number = $request->tax_number ;
//
//            $PresonelBusiness->sahisadi    = $request->sahisadi       ;
//            $PresonelBusiness->sahissoyadi = $request->sahissoyadi    ;
//
//
//            $PresonelBusiness->save();
//        }//end presonal if

        //        if($market->user_type == 'company'){
//
//
//            $companyBusiness = CompanyBusiness::where('market_id',$id)->first() ;
//
//            $companyBusiness->company_title =$request->company_title;
//            $companyBusiness->business_name =$request->business_name;
//            $companyBusiness->company_type =$request->company_type;
//            $companyBusiness->chamber_of_commerce =$request->chamber_of_commerce;
//            $companyBusiness->trade_registry_number =$request->trade_registry_number;
//            $companyBusiness->kep_address =$request->kep_address;
//            $companyBusiness->tax_number =$request->tax_number;
//
//            $companyBusiness->save();
//
//        }//end company if

        $marketuser = MarketUser::where('market_id',$id)->first();

        $marketuser->ceptelefonu  = $request->ceptelefonu ;
        $marketuser->istelefonu  = $request->istelefonu ;
        $marketuser->il  = $request->province ;
        $marketuser->ilce  = $request->district ;
        $marketuser->postcode  = $request->postcode ;
        $marketuser->adress  = $request->address ;

        $hesabsahibiadisoyadi = $request->hesabsahibiadi ;
        $bank = $request->bank ;
        $ibanno = $request->ibanno ;

        $hesapbilgileri = json_encode([
            'hesabsahibiadi'=>$hesabsahibiadisoyadi,
            'bank'=>$bank,
            'ibanno'=>$ibanno ]);

        $marketuser->hesapbilgileri  = $hesapbilgileri ;
        $marketuser->save();
        $notification = [
            'alert-type' => 'success',
            'message' => 'Bilgileriniz Başarı ile güncellenmiştir.'
        ];
        return back()->withInput()->with($notification);

    }

    public function getMarketrow($id){

        $markettype = Marketgeneral::find($id);

        if ($markettype->user_type == 'personal'){
           $data =  DB::table('general_market')
                 ->join('personalbusiness' , 'general_market.id' , '=' ,'personalbusiness.market_id')
                 ->join('market_user' , 'general_market.id' , '=' ,'market_user.market_id')
                 ->where('general_market.id','=',$id)
                 ->select('general_market.*','personalbusiness.*','market_user.*')
                 ->first();
           return $data ;
        }

        if ($markettype->user_type == 'company'){
           $data =   DB::table('general_market')
                ->join('companybusiness' , 'general_market.id' , '=' ,'companybusiness.market_id')
                ->join('market_user' , 'general_market.id' , '=' ,'market_user.market_id')
                ->where('general_market.id','=',$id)
                ->select('general_market.*','companybusiness.*','market_user.*')
                ->first();
              return $data ;
        }

    }


    public function bolgemudurluguil($code){

       $vdairesi = DB::table('vergidaireleri')->where('SaymanlikKodu',$code)->first();
       return $vdairesi ;

        }

    public function market_profil_image(Request $request){

            if (request()->hasFile('market_profil_photo')) {
                $this->validate(request(), ['market_profil_photo' => 'image|mimes:jpg,jpeg,png']);

                $image = request()->file('market_profil_photo');
                 if ($image->isValid()){
                     $helper = new Helper();
                     $newimagename = time() . '.' . $image->extension();
                     $id = Auth::guard('market')->user()->id;
                     $helper->imageupload($image, $newimagename, 'malls/'.$id.'/profil');


                                $market = Marketgeneral::find($id);
                                $market->market_profil_photo = $newimagename;

                                $market->save();

                            return response()->json([
                                'img' => $newimagename
                            ]);

                 }
            }

        }


    public function market_cover_image(Request $request){

        if (request()->hasFile('market_cover_photo')) {
            $this->validate(request(), ['market_cover_photo' => 'image|mimes:jpg,jpeg,png']);

            $image = request()->file('market_cover_photo');
            if ($image->isValid()){
                $helper = new Helper();
                $newimagename = time() . '.' . $image->extension();
                $id = Auth::guard('market')->user()->id;
                $helper->imageupload($image, $newimagename, 'malls/'.$id.'/profil');


                $market = Marketgeneral::find($id);
                $market->market_cover_photo = $newimagename;

                $market->save();

                return response()->json([
                    'img' => $newimagename
                ]);

            }
        }

    }
}
