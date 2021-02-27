<?php
/**
 * @author KOALAMEDYA
 * @company EMRE AKINCL A.Ş.
 * @url koalamedya.com
 * @date 15.10.2020
 * @developer Baylar Ibrahimov
 *
 */
namespace App\Http\Controllers;

use App\Http\Requests\MarketRegisterRequest;
use App\Model\CompanyBusiness;
use App\Model\Marketgeneral;
use App\Model\MarketUser;
use App\Model\PresonelBusiness;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MarketRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks =   banks();
        $vergidaireleri =  DB::table('vergidaireleri')->get();
        $provinces = DB::table('province')->get();
        $ilceler = DB::table('districts')->get();

        $data = array(
            'bankalar' => $banks,
            'vergidaireleri' => $vergidaireleri,
            'iller' => $provinces,
            'ilceler' => $ilceler) ;
        return response()->json($data,200,
            ['Content-Type','application/json;charset=UTF-8',
             'Charset'=>'utf-8'],JSON_UNESCAPED_UNICODE) ;


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            if($validator->fails()){
                return response()->json($validator->messages(), 200);
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
            ] );

            if($validator->fails()){
                return response()->json($validator->messages(), 200);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Marketgeneral  $marketgeneral
     * @return \Illuminate\Http\Response
     */
    public function show(Marketgeneral $marketgeneral)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Marketgeneral  $marketgeneral
     * @return \Illuminate\Http\Response
     */
    public function edit(Marketgeneral $marketgeneral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Marketgeneral  $marketgeneral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marketgeneral $marketgeneral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Marketgeneral  $marketgeneral
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marketgeneral $marketgeneral)
    {
        //
    }



    /** ----------------------- AJAX requests ----------------------- */

    /** ajax ile vergidaireleri ceken function */
    public function vergidaireleriajax(Request $request){

        /** @var  $iller
         * illerin SherAdi sutunundaki il isimlerini getiri
         */
        $iller = (new Marketgeneral())->vergidairesiilleri();

        /** @var $illerarray
         * bu isimler il attayinde toplanir
         */
        $illerarray = [] ;

        foreach ($iller as $il){
            array_push($illerarray, $il->SehirAdi);
        }

        /**   ise illerarrayda requesten gelen il adinin olup olmadığını kontrol eder */
        $ilverify =  in_array($request->il,$illerarray);

        if (!$ilverify){

            return 'Lütfen Geçerli bir il bilgisi girin ';

        }else{


            $ilvergimudurlukleri =  (new Marketgeneral())->vergidairesiilmudurlukleri($request->il);

            $vergimudurlerihtml = '';
            foreach($ilvergimudurlukleri as $ilvergimudurluyu){
                $vergimudurlerihtml .= '<option {{ old( "vergidairesiil" )=='.$ilvergimudurluyu->SaymanlikKodu.'? "selected"  :  "" }}    value="' .$ilvergimudurluyu->SaymanlikKodu . '">' . $ilvergimudurluyu->VergiDairesiMudurlugu . '</option>';
            }
            return  $vergimudurlerihtml;
        }

    }

    /** ajax ile ilceleri ceken function */
    public function getajaxdistrict(Request $request)
    {
        if ($request->provinceno) {

            $selected_provience = $request->provinceno;

            $select_district = $request->district_no;

            $dbdata = DB::table('districts')->where('province_no', '=', $selected_provience)->get();

            $districts = '';

            $selected = '';
            foreach ($dbdata as  $district) {

                if ($district->district_no == $select_district){
                    $selected = 'selected ';
                }

                $districts .= '<option ' . $selected . '  value="' . $district->district_no . '">' . $district->name . '</option>';
                $selected = '';
            }


            return $districts;
        }
        else {

            $dbdata = District::where('province_no', '=', $request->provinceno)->get();


            $districts = '';
            $selected = '';

            foreach ($dbdata as $key => $district) {

                reset($dbdata);
                if ($key === key($dbdata)){
                    $selected = 'selected';
                }
                $districts .= '<option ' . $selected . ' value="' . $district->district_no . '">' . $district->name . '</option>';

            }
            return $districts;
        }

    }




}
