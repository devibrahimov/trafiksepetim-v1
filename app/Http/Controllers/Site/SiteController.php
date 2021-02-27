<?php
/**
 * @author KOALAMEDYA
 * @company EMRE AKINCL A.Ş.
 * @url koalamedya.com
 * @date 15.10.2020
 *
 */
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Site\Market\MarketPagesController;
use App\Model\Marketgeneral;
use App\Model\MarketProduct;
use App\Model\ProductRate;
use App\Model\ServiceCategory;
use App\Model\ServiceComment;
use App\Model\ServiceProduct;
use App\Model\ServiceRate;
use App\Model\SubCategories;
use App\Model\SubSecondCategories;
use App\Model\ProductComment;
use App\Model\ProductWishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Model\Category ;
use App\Model\ServiceProvider ;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Psy\Util\Str;
use function GuzzleHttp\Psr7\str;

class SiteController extends Controller
{

    public  function index() {
        $products = MarketProduct::where('status',1)->orderBy('id','desc')->take(12)->get();
        $kampanyaproducts = MarketProduct::where('status',1)->where('kampanya',1)->orderBy('id','desc')->take(12)->get();
        $malls = Marketgeneral::take(16)->get();
        $services= ServiceProduct::where('status',1)->orderBy('id','desc')->take(12)->get();
        $active = 'home';
        return view( 'site.pages.home',compact( 'active','kampanyaproducts', 'products','malls','services'));
    }

    public  function products() {
        $mallcats = Category::all();
        $servicecats = ServiceCategory::all();

        $metadescription = 'Trafik Sepetim mağazaları ürünlerini alıcılara ';

        foreach ($mallcats as $c){ $metadescription.=$c->name.', '; }
        $metadescription.=' kategorileri altında  sunmaktadır.Trafik Sepetim Oto yedek parça satışı ve Oto hizmetlerin yer aldığı web sitesidir.';
        $active = 'products';
        return view('site.pages.products',compact('active','metadescription','mallcats','servicecats' ));
    }

    public  function saleproducts() {
        $mallcats = Category::all();
        $metadescription = 'Trafik Sepetim mağazaları ürünlerini alıcılara ';
        foreach ($mallcats as $c){ $metadescription.=$c->name.', '; }
        $metadescription.=' Trafik Sepetim Oto yedek parça satışı ve Oto hizmetlerin yer aldığı web sitesidir.Trafik Sepeti indirimli ürünlerden faydalanın';
         $active = 'saleproducts';
        return view('site.pages.saleproducts',compact('active','metadescription','mallcats','servicecats','products'));
    }

    public function product_detail($slug){
        $parts =  explode('-P',$slug ) ;
        $id = $parts[1];
        $product = MarketProduct::find($id);
        $rate = ProductRate::where('product_id',$id)->first();
        $market_id = $product->market_id;
        $category = json_decode($product->category);

        $catproducts = DB::table('products')->where('status',1)->where('category->category',$category->category)->get();
        $metadescription =  'Trafik Sepetim .Ürün:'.$product->name.'-'.$product->meta_desc;
        $comments = ProductComment::where('product_id',$id)->orderBy('id','desc')->get();

        if (!isset(auth()->guard('market')->user()->id)){
            $cookie = Cookie::get($product->name) ;
            if (!isset($cookie)){
                $value = Hash::make($product->name);
                Cookie::make($product->name,$value ,1);
                $show = $product->show_count + 1;
                $product->update(['show_count'=>$show]);
            }
        }


        return view('site.pages.product_detail',compact(['comments', 'rate', 'metadescription','product','catproducts']));

    }

    public function category_products($slug){

       $uri = explode('/',$slug);

       if(count($uri)>3){
           return redirect()->route('home');
       }

        if(count($uri)==3){
            $category = $uri[2];
            $parts =  explode('-C',$category );
            $id = $parts[1];
            $products = DB::table('products')->where('category->secondsubcategory', $id )->orderBy('id','desc')->get();

            $subcat  = SubSecondCategories::find($id);
            $metadescription = 'Trafik Sepetim   : '.$subcat->name.' kategorisi altında ürünleri müşterilere sunmaktadır';


            $category = $uri[0];
            $parts =  explode('-C',$category );
            $id = $parts[1];
            $parentcategory = Category::find($id);


            $category = $uri[1];
            $parts =  explode('-C',$category );
            $id = $parts[1];
            $categories = SubCategories::find($id);
            $subcategories = SubSecondCategories::where('parent_id','=',$id)->get();

            return view('site.pages.subsecondcatproducts',compact([ 'products', 'subcat','categories','metadescription','subcategories','parentcategory']));

        }

        if(count($uri)==2){
            $category = $uri[1];

            if (!strpos($category,'-C')){

                $cats = SubCategories::all();
                $catid = 0 ;
                foreach ($cats as $c){
                    if( \Illuminate\Support\Str::slug($c->name) == $category){
                        $catid = $c->id ;
                    }
                }

                return   redirect()->route('category_products',[$category.'-C'.$catid]);
            }

            $parts =  explode('-C',$category );
            $id = $parts[1];

            $categories = SubSecondCategories::where('parent_id','=',$id)->get();
            $parentid = $id;
            $products = DB::table('products')->where('category->subcategory', $id )->orderBy('id','desc')->get();



            return view('site.pages.subcatproducts',compact([ 'products', 'categories' ,'parentid']));

        }

        if(count($uri)==1){
            $category = $uri[0];
            if (!strpos($category,'-C')){
                $cats = Category::all();
                $catid = 0 ;
                foreach ($cats as $c){
                    if( \Illuminate\Support\Str::slug($c->name) == $category){
                        $catid = $c->id ;
                    }
                }

                return   redirect()->route('category_products',[$category.'-C'.$catid]);
            }

            $parts =  explode('-C',$category );
            $id = $parts[1];

            $parentcategory = Category::find($id);
            $categories = SubCategories::where('parent_id','=',$id)->get();
            $subcategories = SubSecondCategories::where('parent_id','=',$id)->get();

            $products = DB::table('products')->where('category->category', $id )->orderBy('id','desc')->get();
            $parent = 1;
            return view('site.pages.catproducts',compact([ 'products','subcategories','categories','parentcategory']));
        }

    }

    public function trendproducts(){
        $metadescription = 'Trafik Sepetim Mağazaların sattığı Oto ürünleri içinde Trend Ürünlerini Sizlere sunmktadır';
        $active = 'trendproducts';
        return view('site.pages.trend_products',compact( 'active','metadescription'));
    }

    public function kampanyaproducts(){
        $metadescription = 'Trafik Sepetim Mağazaların sattığı Oto ürünleri içinde Kampanyalı Ürünlerini Sizlere sunmktadır';
        $active = 'kampanyaproducts';
        return view('site.pages.kampanya_products',compact('active','metadescription'));
    }

    public function service_products($slug){
        $uri = explode('/',$slug);

        if(count($uri)>2){
            return redirect()->route('home');
        }

        if(count($uri)==1) {
            $category = $uri[0];
            if (!strpos($category, '-hizmet-')) {
                $cats = ServiceCategory::all();
                $catid = 0;
                foreach ($cats as $c) {
                    if (\Illuminate\Support\Str::slug($c->name) == $category) {
                        $catid = $c->id;
                    }
                }

                return redirect()->route('category_products', [$category . '-C' . $catid]);
            }
            $parts = explode('-hizmet-', $category);
            $id = $parts[0];
            $services = DB::table('service_products')->where('category->category', $id)->orderBy('id', 'desc')->get();
            return view('site.pages.servicecatposts', compact(['services',]));
        }

        if(count($uri)==2) {
            $category = $uri[1];
            if (!strpos($category, '-hizmet-')) {
                $cats = ServiceCategory::all();
                $catid = 0;
                foreach ($cats as $c) {
                    if (\Illuminate\Support\Str::slug($c->name) == $category) {
                        $catid = $c->id;
                    }
                }
                return redirect()->route('category_products', [$category . '-C' . $catid]);
            }
            $parts = explode('-hizmet-', $category);
            $id = $parts[0];
            $services = DB::table('service_products')->where('category->subcategory', $id)->orderBy('id', 'desc')->get();
            return view('site.pages.servicecatposts', compact(['services',]));
        }

    }

    public function register(){
        $banks =  (new MarketPagesController)->banks();
        $iller = (new Marketgeneral())->vergidairesiilleri();
        $provinces = DB::table('province')->get();
        $metadescription ='Trafik Sepetimde ürün satışlarınızı gerçekleştire bilmeniz için Mağazanızı Açın Gelirlerinizn katlayın.';
        return view('site.pages.register',compact('metadescription','iller','provinces','banks'));

    }

    public function malls(){
        $malls = Marketgeneral::all();
        $metadescription = 'Trafik Sepetimde ';
        $mallcats = Category::all();
        foreach ($mallcats as $c){ $metadescription.=$c->name.', '; }
        $metadescription.='Kategorleri altında ürün satışı yapan mağazalar ';
        $active = 'malls';
        return view('site.pages.malls',compact(['active','malls','metadescription']));
    }

    public function cart(){

        return view('site.pages.basket');
    }

    public function mywishlist(){
        $userid = auth()->user()->id ;
        $products = ProductWishlist::where('user_id',$userid)->orderBy('id','DESC')->get();
        return view('site.pages.user.mywishlist',compact(['products']));
    }

    public function services(){
        $services= ServiceProduct::where('status',1)->orderBy('id','desc')->take(40)->get();
        $mallcats = Category::all();
        $servicecats = ServiceCategory::all();
        $metadescription = 'Trafik Sepetim mağazaları ürünlerini alıcılara ';
        foreach ($servicecats as $c){ $metadescription.=$c->name.', '; }
        $metadescription.=' Trafik Sepetim Oto yedek parça satışı ve Oto hizmetlerin yer aldığı web sitesidir.Trafik Sepetim uyqun fiyatlara olan Hizmetlerinden faydalanın';
        $active = 'services';
        return view('site.pages.services',compact(['active','metadescription','services','mallcats','servicecats']));
    }

    public function service_detail($slug){
        $parts =  explode('-Otohizmet-',$slug ) ;
        $id = $parts[0];
        $service = ServiceProduct::where('id',$id)->where('status',1)->first();
        $category = json_decode($service->category);
        $metadescription ='Trafik Sepetim Oto hizmet : '.$service->name;
        $provider = ServiceProvider::find($service->provider_id);
        $rate = ServiceRate::where('service_id',$id)->first();
        $comments = ServiceComment::where('service_id',$id)->orderBy('id','desc')->get();
        $catservices =  DB::table('service_products')->where('status',1)->where('category->category',$category->category)->get();
        return view('site.pages.service_detail',compact(['metadescription','rate','catservices', 'service','provider','comments']));
    }


    public function searchresult(Request  $request){
        $word = $request->queryword;
        return view('site.pages.result',compact(['word']));
    }


    public function result(Request $request){
         $word = $request->word;
        $products = MarketProduct::where('status',1)->where('name','LIKE',"%{$word}%")->orderBy('id','desc')->paginate(40);
        /** @function  getHelperProducts($products)  path  App\Helpers\ProductFunction */
        $productsdata = getHelperProducts($products);
         return $productsdata;

    }


    public function scrollloadproducts(Request $request){
            //print_r($request->all());
        if (isset($request->filtersort) and $request->filtersort != 'NULL'){
            if ($request->filtersort == 'sortbynewtoold'){

                $products = MarketProduct::where('status',1)->orderBy('created_at','desc')->paginate(30);
            }
            if ($request->filtersort == 'sortbyoldnewto'){

                $products = MarketProduct::where('status',1)->orderBy('created_at','asc')->paginate(30);
            }
            if ($request->filtersort == 'pricetoplus'){

                $products = MarketProduct::where('status',1)->orderBy('sale_price','desc')->paginate(30);
            }
            if ($request->filtersort == 'pricetominus'){

                $products = MarketProduct::where('status',1)->orderBy('sale_price','asc')->paginate(30);
            }
            if ($request->filtersort == 'stockplus'){

                $products = MarketProduct::where('status',1)->orderBy('stock','asc')->paginate(30);
            }
            if ($request->filtersort == 'stockminus'){

                $products = MarketProduct::where('status',1)->orderBy('stock','desc')->paginate(30);
            }
        }else{
            $products = MarketProduct::where('status',1)->orderBy('id','desc')->paginate(30);
        }

        if ($request->listtype == 'list'){
            /** @function  getHelperProducts($products)  path  App\Helpers\ProductFunction */
            $productsdata = getHelperProductsList($products);
        }elseif ($request->listtype == 'grid'){
            /** @function  getHelperProducts($products)  path  App\Helpers\ProductFunction */
            $productsdata = getHelperProducts($products);
        }else{
            /** @function  getHelperProducts($products)  path  App\Helpers\ProductFunction */
            $productsdata = getHelperProducts($products);
        }

        return $productsdata;
    }

    public function scrollloadsaleproducts(Request $request){
            //print_r($request->all());
        if (isset($request->filtersort) and $request->filtersort != 'NULL'){
            if ($request->filtersort == 'sortbynewtoold'){

                $products = MarketProduct::where('status',1)->where('sale_price','!=',NULL)
                    ->whereColumn('price','!=','sale_price')
                    ->orderBy('created_at','desc')->paginate(30);
            }
            if ($request->filtersort == 'sortbyoldnewto'){

                $products = MarketProduct::where('status',1)->where('sale_price','!=',NULL)
                ->whereColumn('price','!=','sale_price')
                ->orderBy('created_at','asc')->paginate(30);
            }
            if ($request->filtersort == 'pricetoplus'){

                $products = MarketProduct::where('status',1)->where('sale_price','!=',NULL)
                ->whereColumn('price','!=','sale_price')
                ->orderBy('sale_price','desc')->paginate(30);
            }
            if ($request->filtersort == 'pricetominus'){

                $products = MarketProduct::where('status',1)->where('sale_price','!=',NULL)
                ->whereColumn('price','!=','sale_price')
                ->orderBy('sale_price','asc')->paginate(30);
            }
            if ($request->filtersort == 'stockplus'){

                $products = MarketProduct::where('status',1)->where('sale_price','!=',NULL)
                ->whereColumn('price','!=','sale_price')
                ->orderBy('stock','asc')->paginate(30);
            }
            if ($request->filtersort == 'stockminus'){

                $products = MarketProduct::where('status',1)->where('sale_price','!=',NULL)
                ->whereColumn('price','!=','sale_price')
                ->orderBy('stock','desc')->paginate(30);
            }

        }else{

            $products = MarketProduct::where('status',1)
                ->where('sale_price','!=',NULL)
                ->whereColumn('price','!=','sale_price')
                ->orderBy('id','desc')->paginate(30);
        }
        /** @function  getHelperProducts($products)  path  App\Helpers\ProductFunction */
        $productsdata = getHelperProducts($products);


        return $productsdata;

    }

    public function scrollloadtrendproducts(Request $request){

        if (isset($request->filtersort) and $request->filtersort != 'NULL'){
            if ($request->filtersort == 'sortbynewtoold'){

                $products = MarketProduct::where('status',1)->orderBy('show_count','DESC')->orderBy('created_at','desc')->paginate(30);
            }
            if ($request->filtersort == 'sortbyoldnewto'){

                $products = MarketProduct::where('status',1)->orderBy('show_count','DESC')->orderBy('created_at','asc')->paginate(30);
            }
            if ($request->filtersort == 'pricetoplus'){

                $products = MarketProduct::where('status',1)->orderBy('show_count','DESC')->orderBy('sale_price','desc')->paginate(30);
            }
            if ($request->filtersort == 'pricetominus'){

                $products = MarketProduct::where('status',1)->orderBy('show_count','DESC')->orderBy('sale_price','asc')->paginate(30);
            }
            if ($request->filtersort == 'stockplus'){

                $products = MarketProduct::where('status',1)->orderBy('show_count','DESC')->orderBy('stock','asc')->paginate(30);
            }
            if ($request->filtersort == 'stockminus'){

                $products = MarketProduct::where('status',1)->orderBy('show_count','DESC')->orderBy('stock','desc')->paginate(30);
            }

        }else{

            $products = MarketProduct::where('status',1)->orderBy('show_count','DESC')->paginate(30);
        }

        if ($request->listtype == 'list'){
            /** @function  getHelperProducts($products)  path  App\Helpers\ProductFunction */
            $productsdata = getHelperProductsList($products);
        }elseif ($request->listtype == 'grid'){
            /** @function  getHelperProducts($products)  path  App\Helpers\ProductFunction */
            $productsdata = getHelperProducts($products);
        }else{
            /** @function  getHelperProducts($products)  path  App\Helpers\ProductFunction */
            $productsdata = getHelperProducts($products);
        }

        return $productsdata;

    }

    public function scrollloadkampanyaproducts(Request $request){

        if (isset($request->filtersort) and $request->filtersort != 'NULL'){
            if ($request->filtersort == 'sortbynewtoold'){

                $products = MarketProduct::where('status',1)->where('kampanya',1)->orderBy('created_at','desc')->paginate(30);
            }
            if ($request->filtersort == 'sortbyoldnewto'){

                $products = MarketProduct::where('status',1)->where('kampanya',1)->orderBy('created_at','asc')->paginate(30);
            }
            if ($request->filtersort == 'pricetoplus'){

                $products = MarketProduct::where('status',1)->where('kampanya',1)->orderBy('sale_price','desc')->paginate(30);
            }
            if ($request->filtersort == 'pricetominus'){

                $products = MarketProduct::where('status',1)->where('kampanya',1)->orderBy('sale_price','asc')->paginate(30);
            }
            if ($request->filtersort == 'stockplus'){

                $products = MarketProduct::where('status',1)->where('kampanya',1)->orderBy('stock','asc')->paginate(30);
            }
            if ($request->filtersort == 'stockminus'){

                $products = MarketProduct::where('status',1)->where('kampanya',1)->orderBy('stock','desc')->paginate(30);
            }

        }else{

            $products = MarketProduct::where('status',1)->where('kampanya',1)->paginate(30);
        }

        if ($request->listtype == 'list'){
            /** @function  getHelperProducts($products)  path  App\Helpers\ProductFunction */
            $productsdata = getHelperProductsList($products);
        }elseif ($request->listtype == 'grid'){
            /** @function  getHelperProducts($products)  path  App\Helpers\ProductFunction */
            $productsdata = getHelperProducts($products);
        }else{
            /** @function  getHelperProducts($products)  path  App\Helpers\ProductFunction */
            $productsdata = getHelperProducts($products);
        }

        return $productsdata;

    }

    public function scrollcatservices(Request $request){
            //print_r($request->all());
        $category = $request->category;
        $products = ServiceProduct::where('status',1)->where('category->category',$category)->orderBy('id','desc')->get();

        $productsdata = '';
            foreach($products as $product){
                if( strlen($product->name) >20 ){ $productname = substr($product->name,0,20) .'...';  }
                else{ $productname = substr($product->name,0,20) ; }
                  $pricehtml = '<span class="price"> '.$product->price.' ₺ </span>';
                   $productprice = $product->price;
                 $weekego =  Carbon::now()->format('ymd')-7  ;
                 if($product->created_at->format('ymd') >= $weekego){
                 $new = '<div class="tag new"><span>Yeni</span></div> ';
                 }else{  $new ='' ; }
                if( strlen($product->meta_desc) >48 ){ $meta_desc   =  substr($product->meta_desc,0,48) .'...';  }
                else{ $meta_desc = substr($product->meta_desc,0,48)  ;  }
                $quantity = 1;
                $routeurl = route('service_detail',$product->id.'-Hizmet-'.\Illuminate\Support\Str::slug($product->name))  ;
                $image = json_decode($product->images) ;

                $ratehtml = getproductrate($product->id)  ;

                $productsdata.= '<div class="col-sm-6 col-md-3 wow fadeInUp " ><div class="products">  <div class="product"> <div class="product-image">
                    <a href="'. route('service_detail',$product->id.'-Hizmet-'.\Illuminate\Support\Str::slug($product->name)) .'">
                    <img class="cover" src="'.env('APP_URL').'/storage/uploads/thumbnail/service/'.$product->provider_id .'/posts/small/'.$image->cover.'" alt=""></a>
                    '.$new.'</div> <div class="product-info text-left"> <h3 class="name"><a href="'.$routeurl.'"> ' .$productname. ' </a> </h3> <div class="  rateit-small">'.$ratehtml.'</div>
                    <div class="description">'.$meta_desc.'</div> <div class="product-price"> '.$pricehtml.'</div> </div> <div class="cart clearfix animate-effect">
                    <div class="action"> <ul class="list-unstyled"> <li class="lnk addwishlist"  data-id="'. $product->id .'"> <a data-toggle="tooltip" class="add-to-cart " title="Listeme Ekle"><i class="icon fa fa-heart"></i> </a>
                    </li> </ul>  </div> </div> </div>  </div> </div>';
            }//endforeach
        return $productsdata;
    }


    public function scrollcategoryproducts(Request $request){
        //print_r($request->all());
        $products = MarketProduct::where('status',1)->where('category->category',$request->category)->orderBy('id','desc')->paginate(30);
        /** @function  getHelperProducts($products)  path  App\Helpers\ProductFunction */
        $productsdata = getHelperProducts($products);

        return $productsdata;
    }

    public function filterResultpage(Request $request){

        $filterquery = [
            'salepriceproduct'=> isset($request->salepriceproduct) ?$request->salepriceproduct :'',
            'filtercategory'=>isset($request->filtercategory)?$request->filtercategory :'',
            'filterminprice'=>isset($request->filterminprice)?$request->filterminprice :'',
            'filtermaxprice'=>isset($request->filtermaxprice)?$request->filtermaxprice :'',
            'filterstock'=>isset($request->filterstock)?$request->filterstock :'',
            'state'=>isset($request->state)?$request->state :'',
            'filtercarcompany'=>isset($request->filtercarcompany)?$request->filtercarcompany :'',
            'rate'=>isset($request->rate)?$request->rate :'',
        ];

        $services= ServiceProduct::where('status',1)->orderBy('id','desc')->take(40)->get();
        $mallcats = Category::all();
        $servicecats = ServiceCategory::all();
        $metadescription = 'Trafik Sepetim mağazaları ürünlerini alıcılara ';
        return view('site/pages/filetresultpage',compact('filterquery','services','mallcats','servicecats','metadescription') );
    }

    public function getFilterProductsResult(Request $request){



       $salepriceproduct  = $request->salepriceproduct ;
       $filtercategory   = isset($request->filtercategory);

       $filterminprice   = isset($request->filterminprice);
       $filtermaxprice   = isset($request->filtermaxprice);

       $filterstock      = isset($request->filterstock);
       $state            = isset($request->state);
       $filtercarcompany = isset($request->filtercarcompany);

       $filterrate       = isset($request->rate);
       $filtersort       = isset($request->filtersort);
       $listtype       = isset($request->listtype);
       $query =[];

       foreach($request->all() as $key=>$value){
           if ($key=='filtercategory' && $value !=null){   array_push($query, ['category->category','=',$value]);  }
           if ($key=='filterstock'&& $value != NULL){ array_push($query, ['stock','>',$value]);   }
           if ($key=='filterstate'&& $value != NULL){ array_push($query, ['tecnique->Durumu','=',$value]);   }

           if ($salepriceproduct == false){
               if ($key=='filterminprice'&& $value != NULL){ array_push($query, ['sale_price','>',$value]); }
               if ($key=='filtermaxprice'&& $value != NULL){ array_push($query, ['sale_price','<',$value]); }
           }
//
//           if ($salepriceproduct == true){
//
//               if ($key=='filterminprice'&& $value != NULL){ array_push($query, ['sale_price','>',$value]); }
//               if ($key=='filtermaxprice'&& $value != NULL){ array_push($query, ['sale_price','<',$value]); }
//           }

           if ($key=='filtercarcompany'&& $value != NULL){ array_push($query, ['car_company','=',$value]); }
       }

                if ($request->filtersort != 'NULL'){
                if ($request->filtersort == 'sortbynewtoold'){
                     if ($filterrate == 1){
                        $rate =  $request->rate;
                        /** products - cekib join etdiyimiz zaman id ye produt_rate in idsini veriyordu o yuzden yer deyishikliyi ederek
                         *product_rateden cektik ve productsa birleshtirdik
                         */
                        $data = DB::table('product_rate')->where( 'star' , '=',$rate)
                            ->where($query)
                            ->leftjoin('products', 'products.id', '=', 'product_rate.product_id')
                            ->orderBy('products.created_at','desc')
                            ->paginate(30);
                    }else{
                        $data =    MarketProduct::where($query)->orderBy('products.created_at','desc')->paginate(30);
                    }
                }//endif sortbynewtoold
                if ($request->filtersort == 'sortbyoldnewto'){
                      if ($filterrate == 1){
                        $rate =  $request->rate;
                        /** products - cekib join etdiyimiz zaman id ye produt_rate in idsini veriyordu o yuzden yer deyishikliyi ederek
                         *product_rateden cektik ve productsa birleshtirdik
                         */
                        $data = DB::table('product_rate')->where( 'star' , '=',$rate)
                            ->orderBy('products.created_at','asc')->where($query)
                            ->leftjoin('products', 'products.id', '=', 'product_rate.product_id')
                            ->paginate(30);
                    }else{
                        $data =    MarketProduct::where($query)->orderBy('products.created_at','asc')->paginate(30);
                    }
                }//endif sortbyoldnewto
                if ($request->filtersort == 'pricetoplus'){
                    if ($filterrate == 1){
                        $rate =  $request->rate;
                        /** products - cekib join etdiyimiz zaman id ye produt_rate in idsini veriyordu o yuzden yer deyishikliyi ederek
                         *  product_rateden cektik ve productsa birleshtirdik
                         */
                        $data = DB::table('product_rate')->where( 'star' , '=',$rate)
                            ->leftjoin('products', 'products.id', '=', 'product_rate.product_id')
                            ->orderBy('products.sale_price','desc')->where($query)
                            ->paginate(30);

                    }else{
                        $data =    MarketProduct::where($query)->orderBy('products.sale_price','asc')->paginate(30);
                    }
                }//endif pricetoplus
                if ($request->filtersort == 'pricetominus'){

                    if ($filterrate == 1){
                        $rate =  $request->rate;
                        /** products - cekib join etdiyimiz zaman id ye produt_rate in idsini veriyordu o yuzden yer deyishikliyi ederek
                         *product_rateden cektik ve productsa birleshtirdik
                         */
                        $data = DB::table('product_rate')->where( 'star' , '=',$rate)
                            ->leftjoin('products', 'products.id', '=', 'product_rate.product_id')
                            ->orderBy('products.sale_price','asc')->where($query)
                            ->paginate(30);

                    }else{
                        $data =    MarketProduct::where($query)->orderBy('products.sale_price','desc')->paginate(30);
                    }
                }//endif pricetominus
                if ($request->filtersort == 'stockplus'){

                    if ($filterrate == 1){
                        $rate =  $request->rate;
                        /** products - cekib join etdiyimiz zaman id ye produt_rate in idsini veriyordu o yuzden yer deyishikliyi ederek
                         *product_rateden cektik ve productsa birleshtirdik
                         */
                        $data = DB::table('product_rate')->where( 'star' , '=',$rate)
                            ->leftjoin('products', 'products.id', '=', 'product_rate.product_id')
                            ->orderBy('products.stock','asc')->where($query)
                            ->paginate(30);

                    }else{
                        $data =    MarketProduct::where($query)->orderBy('products.stock','asc')->paginate(30);
                    }
                }//endif stockplus
                if ($request->filtersort == 'stockminus'){

                    if ($filterrate == 1){
                        $rate =  $request->rate;
                        /** products - cekib join etdiyimiz zaman id ye produt_rate in idsini veriyordu o yuzden yer deyishikliyi ederek
                         *product_rateden cektik ve productsa birleshtirdik
                         */
                        $data = DB::table('product_rate')->where( 'star' , '=',$rate)
                            ->leftjoin('products', 'products.id', '=', 'product_rate.product_id')
                            ->orderBy('products.stock','desc')->where($query)
                            ->paginate(30);

                    }else{
                        $data =    MarketProduct::where($query)->orderBy('products.stock','desc')->paginate(30);
                    }
                }//endif stockminus

            }else{

                if ($filterrate == 1){
                    $rate =  $request->rate;
//                    return $rate ;
                    /** products - cekib join etdiyimiz zaman id ye produt_rate in idsini veriyordu o yuzden yer deyishikliyi ederek
                     *product_rateden cektik ve productsa birleshtirdik
                     */
                    $data = DB::table('product_rate')->where( 'star' , '=',$rate)->where($query)
                        ->leftjoin('products', 'products.id', '=', 'product_rate.product_id')
                        ->paginate(30);

                }else{
                    $data =MarketProduct::where($query)->paginate(30);
                }


            }

//        if ($salepriceproduct == true){
//            if ($filterrate == 1){
//                $rate =  $request->rate;
//                /** products - cekib join etdiyimiz zaman id ye produt_rate in idsini veriyordu o yuzden yer deyishikliyi ederek
//                 *product_rateden cektik ve productsa birleshtirdik
//                 */
//                $data = DB::table('product_rate')->where( 'star' , '=',$rate)
//                    ->whereColumn('price','!=','sale_price')
//                    ->leftjoin('products', 'products.id', '=', 'product_rate.product_id')
//                    ->where($query)->paginate(30);
//            }
//        }
        if ($request->listtype == 'list'){
            /** @function  getHelperProducts($products)  path  App\Helpers\ProductFunction */
            $productsdata = getHelperProductsList($data);
        }elseif($request->listtype == 'grid'){
            /** @function  getHelperProducts($products)  path  App\Helpers\ProductFunction */
            $productsdata = getHelperProducts($data);
        }else{
            return $data ;
            /** @function  getHelperProducts($products)  path  App\Helpers\ProductFunction */
            $productsdata = getHelperProducts($data);
        }
        return $productsdata;

    }
}
