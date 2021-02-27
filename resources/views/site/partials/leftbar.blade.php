
@php
use App\Model\MarketProduct;
    $cheapproducts = MarketProduct::where('status',1)->where('sale_price','!=',NULL)->orderBy('price','desc')->take(5)->get();

    $specialproduct = MarketProduct::where('status',1)->where('stock','>',5)->take(10)->get();

@endphp

<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">Fırsatlar</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
        @foreach($cheapproducts as $product)
            @php $image = json_decode($product->images) @endphp
            <div class="item">
                <div class="products">
                    <div class="hot-deal-wrapper">
                        <div class="image" >
                            <img  class="cover" src="{{env('APP_URL')}}/storage/uploads/thumbnail/malls/{{$product->market_id}}/productimages/small/{{$image->cover}}" alt="">
                        </div>
                    </div>
                    <div class="product-info text-left m-t-20">
                        <h3 class="name"><a href="{{route('product_detail',\Illuminate\Support\Str::slug($product->name).'-P'.$product->id)}}">
                                @if( strlen($product->name) >25 )
                                    {{substr($product->name,0,25)}}...
                                @else
                                    {{substr($product->name,0,25)}}
                                @endif</a>
                        </h3>
                        <div class="  rateit-small"> {!! getproductrate($product->id) !!}</div>
                        <div class="description">{{$product->meta_desc}}</div>
                        <div class="product-price">
                            @if($product->sale_price != $product->price)
                                <span class="price"> {{number_format($product->sale_price, 2, ',', '.')}}₺ </span>
                                <span class="price-before-discount">{{number_format($product->price, 2, ',', '.')}}₺ </span>
                            @endif
                            @if($product->sale_price == $product->price)
                                <span class="price"> {{number_format($product->price, 2, ',', '.')}}₺ </span>
                            @endif
                        </div>
                    </div>
                    <div class="cart clearfix animate-effect">
                        <div class="action">
                            <div class="add-cart-button btn-group">
                                <button class="btn btn-primary icon addtocart" data-toggle="dropdown"
                                        data-productId="{{$product->id}}|{{$product->name}}|{{$image->cover}}|{{$product->sale_price ==NULL?$product->price:$product->sale_price}}|1|{{$product->market_id}}"
                                        type="button"> <i  class="fa fa-shopping-cart"></i> Sepete Ekle</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="sidebar-widget outer-bottom-small wow fadeInUp">
    <h3 class="section-title">Spesyal Ürünler</h3>

    <div class="sidebar-widget-body outer-top-xs">
        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
            <div class="item">
                <div class="products special-product">


                    @foreach($specialproduct as $product)
                        @php $image = json_decode($product->images) @endphp


                        <div class="product" style="border-bottom: 1px solid #d4d4d4;margin-top:15px; padding-bottom:15px; ">
                            <div class="product-micro">
                                <div class="row product-micro-row" style="padding-left: 18px;">

                                        <div class="product-image" style="float: left">
                                                    <img style=" width: 90px;height: 90px;object-fit: cover;border:1px solid lightgrey;"  src="{{env('APP_URL')}}/storage/uploads/thumbnail/malls/{{$product->market_id}}/productimages/small/{{$image->cover}}" alt="">
                                        </div>


                                        <div class="product-info" style="float: left;padding-left: 5px;">
                                            <h5 >
                                                <a href="{{route('product_detail',\Illuminate\Support\Str::slug($product->name).'-P'.$product->id)}}">

                                                    @if( strlen($product->name) > 15)
                                                        {{substr($product->name,0,15)}}...
                                                @else
                                                    {{substr($product->name,0,15)}}
                                                @endif
                                                </a>
                                            </h5>
                                            <div class="  rateit-small" > {!! getproductrate($product->id) !!}</div>
                                            <div class="product-price">
                                                @if($product->sale_price != $product->price )
                                                    <span class="price"> {{number_format($product->sale_price, 2, ',', '.')}}₺ </span>
                                                    <span class="price-before-discount">{{number_format($product->price, 2, ',', '.')}}₺ </span>
                                                @endif
                                                @if($product->sale_price == $product->price )
                                                    <span class="price"> {{number_format($product->price, 2, ',', '.')}}₺ </span>
                                                @endif
                                            </div>
                                        </div>

                                </div>
                            </div>
                        </div>
                    @endforeach



                </div>
            </div>
        </div>
    </div>

</div>


<div class="home-banner bsNone mb-1"> <img src="{{env('APP_URL')}}/site/images/banners/app.png" class="img-responsive" alt="Image"> </div>
<div class="home-banner bsNone mt-1"> <img src="{{env('APP_URL')}}/site/images/banners/play.png" class="img-responsive" alt="Image"> </div>
