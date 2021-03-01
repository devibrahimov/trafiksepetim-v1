<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Model\Marketgeneral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageController extends Controller
{
    public function  newregisters(){
        return view('adminpanel.pages.market.newregisters');
    }

    /*
     * Onay Bekleyen  Mağazalar
     */
    public function  approvalnewregisters(){
            $stores = Marketgeneral::where('status',0)->latest()->get();
        return view('adminpanel.pages.market.approvalnewregisters',compact(['stores']));
    }

    /*
     * Onay Bekleyen  Mağazalar
     */
    public function  createnewregister(){
        return view('adminpanel.pages.market.createnewregister');
    }



    /*
     * Onaylanmış  Mağazalar
     */
    public function  approvednewregisters(){
        return view('adminpanel.pages.market.approvednewregisters');
    }



    /*
     * Bloke edilmiş  Mağazalar
     */
    public function  blockedstores(){
        return view('adminpanel.pages.market.blockedstores');
    }




    public function storeShow($id){

        $markettype = Marketgeneral::find($id);

        if ($markettype->user_type == 'personal'){
            $store =  DB::table('general_market')
                ->join('personalbusiness' , 'general_market.id' , '=' ,'personalbusiness.market_id')
                ->join('market_user' , 'general_market.id' , '=' ,'market_user.market_id')
                ->where('general_market.id','=',$id)
                ->select('general_market.*','personalbusiness.*','market_user.*')
                ->first();
        }

        if ($markettype->user_type == 'company'){
            $store =   DB::table('general_market')
                ->join('companybusiness' , 'general_market.id' , '=' ,'companybusiness.market_id')
                ->join('market_user' , 'general_market.id' , '=' ,'market_user.market_id')
                ->where('general_market.id','=',$id)
                ->select('general_market.*','companybusiness.*','market_user.*')
                ->first();
        }
   // print_r($store);die;
        return view('adminpanel.pages.market.storeShow',compact(['store']));
    }


}
