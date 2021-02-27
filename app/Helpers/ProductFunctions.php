<?php
/**
 * @author KOALAMEDYA
 * @company EMRE AKINCL A.Ş.
 * @date 15.10.2020
 *
 */

use Carbon\Carbon;

function getproductrate($id){
         $rate= \Illuminate\Support\Facades\DB::table('product_rate')->where('product_id',$id)->first();
         $data = '';
          if(isset($rate->rate) ){

               for($i= 1; $i<=round($rate->rate) ;$i++) {
                   $data .= '<i class="fa fa-star" style="color: orange" aria-hidden="true"></i>';
                }
                   for ($i = 1; $i <= 5 - round($rate->rate); $i++){
                       $data .= ' <i class="fa fa-star" aria-hidden="true"></i>';

                       }
              $number_format = number_format((float)$rate->rate,1,'.',0);

                 $data .= '<br> <span>  '.$number_format.' ( '.$rate->number_of_comment.' Yorum ) </span>';
                }else{
                  $i = 1;
                  while ($i <= 5) {
                      $data .= '<i class="fa fa-star" aria-hidden="true"></i>';
                      $i++;
                  }
                 $data .=  '<br> <span> (0 Yorum) </span>';
              }
          return $data ;
     }//end getproductrate

    /**
     *bu Fonksiyon gelen urunler arrayini parse ederek htmle giydiriyor
     */
    function getHelperProducts($products){

        $productsdata = '';

        foreach($products as $product){

//            if( strlen($product->name) >20 ){ $productname = html_entity_decode( substr($product->name,0,30) ).'...';  }
//            else{ $productname = substr(html_entity_decode($product->name,0,30) ) ; }
             $productname =  $product->name ;
            if($product->sale_price != $product->price){
                $pricehtml =  ' <span class="price"> '.number_format($product->sale_price, 2, ',', '.').' ₺</span><span class="price-before-discount">'.number_format($product->price, 2, ',', '.').' ₺</span>'; }
            if($product->sale_price == $product->price){ $pricehtml = '<span class="price"> '. number_format($product->price, 2, ',', '.').' ₺  </span>'; }


//            $sonuclaryazdir = number_format($calismasonn, 2, ',', '.');
//            echo $sonuclaryazdir;
            $product->sale_price != $product->price ? $productprice = $product->sale_price : $productprice = $product->price;

            $weekego =  Carbon::now()->format('ymd')-7  ;
             $product_createddate =strtotime($product->created_at);

            if(date('ymd',$product_createddate)  >= date($weekego)){

                $new = '<div class="tag new"><span >Yeni</span></div> ';
            }else{   $new ='' ; }

            if ($product->kampanya == 1){
                $new = '<div class="kampaniya"><span>Kampanya</span></div> ';
            }
            if( strlen($product->meta_desc) >48 ){   $meta_desc   =  substr($product->meta_desc,0,48) .'...'; }
            else{   $meta_desc = substr($product->meta_desc,0,48)  ; }
            $quantity = 1;
            $routeurl = route('product_detail',\Illuminate\Support\Str::slug($product->name).'-P'.$product->id) ;
            $image = json_decode($product->images) ;

            $ratehtml = getproductrate($product->id)  ;



            $productsdata.= '<div style="height:400px;" class="col-sm-6 col-md-3 wow fadeInUp " > <div class="products">  <div class="product"> <div class="product-image">
                                <a href="'. route('product_detail',\Illuminate\Support\Str::slug($product->name).'-P'.$product->id) .'">
                               <img class="cover" src="'.env('APP_URL').'/storage/uploads/thumbnail/malls/'.$product->market_id .'/productimages/small/'.$image->cover.'" alt="'.$product->name.'" title="'.$product->name.'">  </a>
                                '.$new.'</div> <div class="product-info text-left"> <h3 class="name"><a href="'.$routeurl.'"> ' .$productname. ' </a> </h3> <div class="  rateit-small">'.$ratehtml.'</div>
                                <div class="description">'.$meta_desc.'</div> <div class="product-price"> '.$pricehtml.'</div> </div> <div class="cart clearfix animate-effect">
                                <div class="action"> <ul class="list-unstyled"> <li class="add-cart-button btn-group"> <button data-toggle="tooltip" class="btn btn-primary icon addtocart" type="button" title="Sepete Ekle" data-productId="'.$product->id.'|'.$product->name.'|'.$image->cover.'|'.$productprice.'|'.$quantity.'|'.$product->market_id.'" > <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button"> Sepete Ekle </button> </li> <li class="lnk addwishlist"  data-id="'. $product->id .'"> <a data-toggle="tooltip" class="add-to-cart "   title="Listeme Ekle"> <i class="icon fa fa-heart"></i> </a>
                                </li> </ul>  </div> </div> </div>  </div> </div>';
        }//endforeach

        return $productsdata;

    }//end getproducts



    function getHelperProductsList($products){

        $productsdata = '';
        foreach($products as $product){
            if( strlen($product->name) >20 ){ $productname = substr($product->name,0,20) .'...';  }
            else{ $productname = substr($product->name,0,20) ; }

            if($product->sale_price != $product->price){
                $pricehtml =  ' <span class="price"> '.number_format($product->sale_price, 2, ',', '.').' ₺</span><span class="price-before-discount">'.number_format($product->price, 2, ',', '.').' ₺</span>'; }
            if($product->sale_price == $product->price){ $pricehtml = '<span class="price"> '.number_format($product->price, 2, ',', '.').' ₺  </span>'; }
            $product->sale_price != $product->price ? $productprice = number_format($product->sale_price, 2, ',', '.') : $productprice = number_format($product->price, 2, ',', '.');

            $weekego =  Carbon::now()->format('ymd')-7  ;
            $product_createddate =strtotime($product->created_at);
            if(date('ymd',$product_createddate)  >= date($weekego)){

                $new = '<div class="tag new"><span>Yeni</span></div> ';
            }else{   $new ='' ; }
            if( strlen($product->meta_desc) >48 ){   $meta_desc   =  substr($product->meta_desc,0,48) .'...'; }
            else{   $meta_desc = substr($product->meta_desc,0,48)  ; }
            $quantity = 1;
            $routeurl = route('product_detail',\Illuminate\Support\Str::slug($product->name).'-P'.$product->id) ;
            $image = json_decode($product->images) ;

            $ratehtml = getproductrate($product->id)  ;

        $productsdata .= '<div class="category-product-inner wow fadeInUp">
                                        <div class="products">
                                            <div class="product-list product">
                                                <div class="row product-list-row">
                                                    <div class="col col-sm-4 col-lg-4">
                                                        <div class="product-image">
                                                            <a href="'.$routeurl.'">
                                                            <img class="cover" src="'.env('APP_URL').'/storage/uploads/thumbnail/malls/'.$product->market_id .'/productimages/small/'.$image->cover.'" alt="'.$product->name.'" title="'.$product->name.'">
                                                            </a>
                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-sm-8 col-lg-8">
                                                        <div class="product-info">
                                                            <h3 style="font-size: 17px;font-weight:bold;margin-top: 0px; class="name"><a href="'.$routeurl.'">' .$product->name. '</a></h3>
                                                            <div class="rateit-small">'.$ratehtml.'</div>
                                                            <div class="product-price">'.$pricehtml.' </div>
                                                            <!-- /.product-price -->
                                                            <div class="description m-t-10">  '.$product->meta_desc.'</div>
                                                            <div class="cart clearfix animate-effect" style="margin-top: 11px!important;">
                                                                <div class="action">
                                                                    <ul class="list-unstyled">
                                                                        <li class="add-cart-button btn-group">
                                                                            <button class="btn btn-primary icon addtocart"  data-productId="'.$product->id.'|'.$product->name.'|'.$image->cover.'|'.$productprice.'|'.$quantity.'|'.$product->market_id.'" data-toggle="dropdown" type="button">
                                                                             <i class="fa fa-shopping-cart"></i> </button>
                                                                            <button class="btn btn-primary cart-btn addtocart " data-productId="'.$product->id.'|'.$product->name.'|'.$image->cover.'|'.$productprice.'|'.$quantity.'|'.$product->market_id.'" type="button">Add to cart</button>
                                                                        </li>
                                                                        <li class="lnk wishlist addwishlist"  data-id="'. $product->id .'"> <a class="add-to-cart"   title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                                                    </ul>
                                                                </div>  </div>  </div>  </div>   </div>
                                               '.$new.'
                                            </div>  </div> </div> ';

        }

        return $productsdata ;


    }
