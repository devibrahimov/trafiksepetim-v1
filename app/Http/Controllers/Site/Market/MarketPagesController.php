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
use App\Model\Category;
use App\Model\Cars ;
use App\Model\Marketgeneral;
use App\Model\MarketProduct;
use App\Model\SubCategories;
use App\Model\SubSecondCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MarketPagesController extends Controller
{

    public function profil(){
        $banks=  $this-> banks();
            $iller = (new Marketgeneral())->vergidairesiilleri();
            $provinces = DB::table('province')->get();
            $page = 'profil';
            return view('site.pages.market.marketpanel',compact('iller','provinces','banks','page'));
    }

    public function profilproducts(){
            $page = 'products';
             $id = auth()->guard('market')->user()->id ;
             $products = MarketProduct::where('market_id',$id)->orderBy('id','DESC')->get();

             $categories = Category::all();
             $subcategories = SubCategories::all();
             $secondsubcategories = SubSecondCategories::all();
            return view('site.pages.market.profilproducts',compact(['products','page','categories', 'subcategories','secondsubcategories']));
    }

    public function stockdescendingproducts(){
        $page = 'products';
        $id = auth()->guard('market')->user()->id ;
        $products = MarketProduct::where('market_id',$id)->where('stock' , '<' , 5)->orderBy('stock','ASC')->get();

        $categories = Category::all();
        $subcategories = SubCategories::all();
        $secondsubcategories = SubSecondCategories::all();
        return view('site.pages.market.profilproducts',compact(['products','page','categories', 'subcategories','secondsubcategories']));
    }

    public function offstatusproducts(){
        $page = 'products';
        $id = auth()->guard('market')->user()->id ;
        $products = MarketProduct::where('market_id',$id)->where('status' , '=' , 0)->orderBy('id','DESC')->get();

        $categories = Category::all();
        $subcategories = SubCategories::all();
        $secondsubcategories = SubSecondCategories::all();
        return view('site.pages.market.profilproducts',compact(['products','page','categories', 'subcategories','secondsubcategories']));
    }

    public function saleproducts(){
        $page = 'products';
        $id = auth()->guard('market')->user()->id ;
        $products = MarketProduct::where('market_id',$id)->where('sale_price','!=',NULL)->orderBy('id','DESC')->get();

        $categories = Category::all();
        $subcategories = SubCategories::all();
        $secondsubcategories = SubSecondCategories::all();
        return view('site.pages.market.profilproducts',compact(['products','page','categories', 'subcategories','secondsubcategories']));
    }

    public function profilproductslist(){
            $page = 'products';
             $id = auth()->guard('market')->user()->id ;
             $products = MarketProduct::where('market_id',$id)->get();
            return view('site.pages.market.profilproductlist',compact('products','page'));
    }

    public function productedit($id){
             $page = 'products';
             $marketid = auth()->guard('market')->user()->id ;
             $product  = MarketProduct::where('market_id',$marketid)->where('id',$id)->first();
             $categories = Category::all();
             $subcategories = SubCategories::all();
             $secondsubcategories = SubSecondCategories::all();
             $cars  = Cars::all();
        return view('site.pages.market.products.edit',compact('product','categories','page','cars','categories','subcategories','secondsubcategories'    ));
    }

    public function changepassword(){
            $page = 'changepassword';
            return view('pages.market.changepassword',compact(['page']) );
    }

    public function productcreate(){
        $page = 'products';
        $categories = Category::all();
        $subcategories = SubCategories::all();
        $secondsubcategories = SubSecondCategories::all();
        $cars  = Cars::all();

        return view('site.pages.market.products.create',compact(['categories','page','cars' ,'subcategories','secondsubcategories']));
    }

    public function marketpanel(){
        $page = 'magaza';
        return view('pages.market.marketpanel',compact(['page']));
    }

    public function myshop(){
        $id =  auth()->guard('market')->user()->id;
        $criticStock = MarketProduct::where('market_id',$id)->where('stock','<=',5)->count();
        $myProductsCount = MarketProduct::where('market_id',$id)->count();
        $finishedProducts = MarketProduct::where('market_id',$id)->where('stock','=',0)->count();
        $unpublishedProducts= MarketProduct::where('market_id',$id)->where('status','=',0)->count();
        return view('site.pages.market.myshop',compact('criticStock','myProductsCount','finishedProducts','unpublishedProducts'));
    }

    public function banks(){
        return[
           'Akbank',
           'Alternatifbank ',
           'Anadolubank ',
           'Arap Türk Bankası Bank ',
           'Ekspress',
           'Bayındır Bank',
           'Citibank',
           'Denizbank',
           'Diler Yatırım Bankası',
           'Dışbank',
           'Finans Bank',
           'Takas ve Saklama Bankası',
           'İnterbank',
           'Kentbank',
           'Koçbank',
           'MNG Bank',
           'Nurol Yatırım Bankası',
           'Oyak Bank',
           'Pamukbank',
           'Park Yatırım Bankası',
           'Sınai Yatırım Bankası',
           'Şekerbank',
           'Tekfen Bank',
           'ICBC Turkey Bank A.Ş.',
           'The Chase Manhattan Bank',
           'Turkish Bank',
           'Türk Dışbank',
           'Türk Ekonomi Bankası',
           'Türk Eximbank',
           'Türkbank',
           'Türk Ticaret Bankası',
           'TCMB',
           'TC Ziraat Bankası',
           'Türkiye Emlak Bankası',
           'Türkiye Garanti Bankası',
           'Türkiye Halk Bankası',
           'Türkiye İş Bankası',
           'Türkiye Kalkınma Bankası',
           'Türkiye Sınai Kalkınma Bankası',
           'Yaşarbank',
           'Vakıflar Bankası',
           'Yapı ve Kredi Bankası'
        ];

    }
}
