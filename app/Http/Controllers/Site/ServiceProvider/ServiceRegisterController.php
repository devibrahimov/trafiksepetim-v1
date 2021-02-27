<?php
/**
 * @author KOALAMEDYA
 * @company EMRE AKINCL A.Ş.
 * @url koalamedya.com
 * @date 15.10.2020
 * @developer Baylar Ibrahimov
 *
 */
namespace App\Http\Controllers\Site\ServiceProvider;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\HelperController as Helper;
use App\Http\Requests\ServiceProviderRequest;
use App\Model\Marketgeneral;
use App\Model\ServiceCategory;
use App\Model\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ServiceRegisterController extends Controller
{

public function index(){
    $iller = (new Marketgeneral())->vergidairesiilleri();
    $provinces = DB::table('province')->get();

    return view('site.pages.service.register',compact('iller','provinces'));
}

    public function store(ServiceProviderRequest $request){
        $username = $request->user_name ;
        $name = $request->name ;
        $surname = $request->surname ;
        $email = $request->email ;
        $number = $request->ceptelefonu ;
        $password = $request->password;

        $company_title = $request->company_title ;

        $business_name = $request->business_name ;
        $kep_address = $request->kep_address ;
        $tax_number = $request->tax_number ;
        $ilvergimudurlukleri = $request->ilvergi_mudurlugu ;
        $tckimlik    = $request->tckimlik;
        $work_number = $request->work_number ;
        $province = $request->province ;
        $district = $request->district ;
        $address = $request->address ;
        $sozleshmecheck = $request->sozleshmecheck ;

/*************************************************/
/*************************************************/
        $service = new ServiceProvider();
        $service->user_name = $username;
        $service->name = $name;
        $service->surname = $surname;
        $service->email =$email;
        $service->password =Hash::make($password);
        $service->sozlesme = $sozleshmecheck;
        $service->company_title = $company_title ;
        $service->tckimlik = $tckimlik ;
        $service->business_name = $business_name;
        $service->kep_address =  $kep_address;
        $service->tax_number =  $tax_number;
        $service->ilvergi_mudurlugu = $ilvergimudurlukleri ;
        $service->ceptelefonu  =$number;
        $service->istelefonu  =$work_number;
        $service->il  =$province;
        $service->ilce  =$district;
        $service->adress  =$address;
        $save = $service->save();

        if(!$save){
            $notification = [
                'alert-type' => 'error',
                'message' => 'Hatalı Kayıt işlemi.Lütfen yeniden Deneyin '
            ];
            return redirect()->route('serviceregister')->withInput()->with($notification);
        }else{
            $notification = [
                'alert-type' => 'success',
                'message' => 'Kaydınız Başarılı bir şekilde tamamlandı.Lütfen Giriş yapın.'
            ];
            return redirect()->route('userlogin')->withInput()->with($notification);
        }


}

    public function  serviceregisterupdate(Request $request){

        $id = auth()->guard('service')->user()->id;
        $provider = ServiceProvider::find($id);

        $provider->user_name = $request->user_name;
        $provider->ceptelefonu = $request->ceptelefonu;
        $provider->istelefonu = $request->istelefonu;
        $provider->adress = $request->address;

        $provider->save();
        $notification = [
            'alert-type' => 'success',
            'message' => 'Hizmet Veren Bilgileri Başarı ile Güncellendi!'
        ];
        return back()->withInput()->with($notification);



    }
    public function updateprofilpassword(Request $request){
        $request->validate([
            'password'=>'required|string|confirmed',
        ],[

            'password.required'=>'Şifre alanları boş bırakılamaz',
            'password.string'=>'Şifre alanı sadece yazı rakam ve harf karkaterleri gire bilirsiniz',
            'password.confirmed'=>'Şifreler eşleşmiyor lütfen iki alandada şifrelerin aynı olmasına dikkat edin'
        ]);
        $id = Auth::guard('service')->user()->id;
        $service = ServiceProvider::find($id);
        $service->password = Hash::make($request->password);
        $save = $service->save();
        if (!$save){

            $notification = [
                'alert-type' => 'error',
                'message' => 'Şifreniz  değiştirilemedi.Lütfen yeniden  deneyin'
            ];

            return      back()->with($notification);
        }//end if
        else{
            \auth()->guard('service')->logout();
            \request()->session()->flush();
            $notification = [
                'alert-type' => 'success',
                'message' => 'Şifreniz başarıyla değiştirildi.Lütfen yeniden giriş yapın'
            ];
            return redirect()->route('userlogin')->withInput()->with($notification);

        }
    }

    public function servicecoverimage(Request $request){

        if (request()->hasFile('service_cover_photo')) {
            $this->validate(request(), ['service_cover_photo' => 'image|mimes:jpg,jpeg,png']);

            $image = request()->file('service_cover_photo');
            if ($image->isValid()){
                $helper = new Helper();
                $newimagename = time() . '.' . $image->extension();
                $id = Auth::guard('service')->user()->id;

                $helper->imageupload($image,$newimagename,'service/'.$id.'/profil');

                $service =  ServiceProvider::find($id);
                $service->service_cover_photo = $newimagename;

                $service->save();

                return response()->json([
                    'img' => $newimagename
                ]);

            }
        }



    }

    public function serviceprofilimage(Request $request){
             if (request()->hasFile('service_profil_photo')) {
            $this->validate(request(), ['service_profil_photo' => 'image|mimes:jpg,jpeg,png']);

            $image = request()->file('service_profil_photo');
            if ($image->isValid()){
                $helper = new Helper();
                $newimagename = time() . '.' . $image->extension();
                $id = Auth::guard('service')->user()->id;

                $helper->imageupload($image,$newimagename,'service/'.$id.'/profil');

                $service =  ServiceProvider::find($id);
                $service->service_profil_photo = $newimagename;

                $service->save();

                return response()->json([
                    'img' => $newimagename
                ]);

            }
        }



    }

}
