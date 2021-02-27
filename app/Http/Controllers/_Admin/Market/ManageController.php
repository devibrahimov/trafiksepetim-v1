<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Model\Marketgeneral;
use Illuminate\Http\Request;

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

    public function  createnewregister(){
        return view('adminpanel.pages.market.createnewregister');
    }

    public function  approvednewregisters(){
        return view('adminpanel.pages.market.approvednewregisters');
    }

    public function  blockedstores(){
        return view('adminpanel.pages.market.blockedstores');
    }
}
