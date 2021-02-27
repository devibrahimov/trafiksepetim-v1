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
use App\Model\Cars;
use App\Model\Marketgeneral;
use App\Model\ServiceCategory;
use App\Model\ServiceProduct;
use App\Model\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ServicePagesController extends Controller
{
    public function productcreate(){
        $categories = ServiceCategory::where('parent_id',0)->get();
        $subcategories = ServiceCategory::where('parent_id','!=',0)->get();
        $cars  = Cars::all();
        return view('site.pages.service.products.create',compact('categories','cars','subcategories'));
    }

    public function posts(){
        $id = auth()->guard('service')->user()->id;
        $services =ServiceProduct::where('provider_id',$id)->get();
        return view('site.pages.service.posts',compact('services'));
    }

    public function postedit($id){
        $categories = ServiceCategory::all();
        $post = ServiceProduct::find($id);
        return view('pages.service.products.edit',compact('categories','post'));
    }

    public function myprofil(){
        $id = auth()->guard('service')->user()->id;
        $services =ServiceProduct::where('provider_id',$id)->get();
        $iller = (new Marketgeneral())->vergidairesiilleri();
        $provinces = DB::table('province')->get();
        $service = ServiceProvider::find($id);

       return view('site.pages.service.myprofil',compact(['service','iller','provinces','servicecats']));
    }


}
