@php use Carbon\Carbon @endphp

@extends('site.index')

@section('css')
    <style>
        #owl-main {
            height: 375px;
        }
        #owl-main .item {
            height: 375px!important;
        }
    </style>
@endsection


@section('content')


    <div class="body-content " id="top-banner-and-menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                        @include('site.partials.navcategories')
                        @include('site.partials.leftbar')

                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                    <div id="hero">
                        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                            <div class="item" style="background-image: url('{{env('APP_URL')}}/site/img/slider1.png');">
                                <div class="container-fluid">
                                    <div class="caption bg-color vertical-center text-left">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="info-boxes wow fadeInUp">
                        <div class="info-boxes-inner">
                            <div class="row">

                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">Para İadesi</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Tüm Ürünlerde 15 Gün Para İade Garantisi</h6>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">Para İadesi</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Tüm Ürünlerde 15 Gün Para İade Garantisi</h6>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">Para İadesi</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Tüm Ürünlerde 15 Gün Para İade Garantisi</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">

                        <div class="more-info-tab clearfix ">
                            <h3 class="new-product-title pull-left">Kampanyalı Ürünler</h3>
                            <button class="btn btn-primary pull-right" type="button">Tümünü Gör</button>
                            <ul class="nav nav-tabs nav-tab-line" id="new-products-1">
                                <li class="active"><a data-transition-type="backSlide" href="#urunlerTabContent" data-toggle="tab">Ürünler</a></li>
                                <li><a data-transition-type="backSlide" href="#hizmetlerTabContent" data-toggle="tab">Hizmetler</a></li>
                            </ul>

                        </div>
                        <div class="tab-content outer-top-xs">
                            <div class="tab-pane in active" id="urunlerTabContent">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                     @if(isset($kampanyaproducts))
                                       @foreach($kampanyaproducts as $product)
                                        @php $image = json_decode($product->images) @endphp

                                        @php
                                            $weekego =  Carbon::now()->format('ymd')-7  ;
                                             if($product->created_at->format('ymd') >= $weekego){
                                                 $new = '<div class="tag new"><span>Yeni</span></div> ';
                                             }else{   $new ='' ;  }
                                        @endphp

                                            <div class="item item-carousel">
                                             <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                     <a href="{{route('product_detail',\Illuminate\Support\Str::slug($product->name).'-P'.$product->id)}}">

                                                        <div class="image" >
                                                            <img src="{{env('APP_URL')}}/storage/uploads/thumbnail/malls/{{$product->market_id}}/productimages/small/{{$image->cover}}" class="cover"  alt="{{$product->name}}" title="{{$product->name}}">
                                                         </div>
                                                        </a>
                                                           {!! $new !!}
                                                    </div>
                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a href="{{route('product_detail',\Illuminate\Support\Str::slug($product->name).'-P'.$product->id)}}">
                                                            <strong>  @if( strlen($product->name) >22 )
                                                                    {{substr($product->name,0,22)}}...
                                                                @else
                                                                    {{substr($product->name,0,22)}}
                                                                @endif</strong>
                                                              </a>
                                                        </h3>
                                                        <div class="rateit-small">
                                                            {!! getproductrate($product->id) !!}
                                                        </div>
                                                        <div class="description">
                                                            @if( strlen($product->meta_desc) >50 )
                                                                {{substr($product->meta_desc,0,50)}}...
                                                                @else
                                                                {{substr($product->meta_desc,0,50)}}
                                                                @endif
                                                        </div>
                                                        <div class="product-price">
                                                            @if($product->sale_price != $product->price)
                                                                <span class="price"> {{$product->sale_price}}₺ </span>
                                                                <span class="price-before-discount">{{$product->price}}₺ </span>
                                                            @endif
                                                            @if($product->sale_price == $product->price)

                                                                <span class="price">{{$product->price}}₺ </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">
                                                                    <button data-toggle="tooltip" class="btn btn-primary icon addtocart" data-productId="{{$product->id}}|{{$product->name}}|{{$image->cover}}|{{$product->sale_price ==NULL?$product->price:$product->sale_price}}|1|{{$product->market_id}}" type="button" title="Sepete Ekle"> <i class="fa fa-shopping-cart"></i> </button>
                                                                    <button class="btn btn-primary cart-btn" type="button">Sepete Ekle</button>
                                                                </li>
                                                                <li class="lnk wishlist addwishlist" data-id="{{$product->id}}" >
                                                                    <a data-toggle="tooltip"   title="Listeme Ekle"> <i class="icon fa fa-heart"></i> </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       @endforeach
                                     @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="hizmetlerTabContent">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                        @if(isset($services))
                                            @foreach($services as $service)
                                            @php $image = json_decode($service->images) @endphp
                                            @php
                                                $weekego =  Carbon::now()->format('ymd')-7  ;
                                                 if($service->created_at->format('ymd') >= $weekego){
                                                     $new = '<div class="tag new"><span>Yeni</span></div> ';
                                                 }else{   $new ='' ;  }
                                            @endphp
                                           <div class="item item-carousel">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <a href="{{route('service_detail',$service->id.'-Otohizmet-'.\Illuminate\Support\Str::slug($service->name))}}">
                                                                <img class="cover" alt="{{$service->name}}" title="{{$service->name}}"
                                                                  src="{{env('APP_URL')}}/storage/uploads/thumbnail/service/{{$service->provider_id}}/posts/small/{{$image->cover}}" alt="">
                                                            </a>
                                                        </div>
                                                         {!! $new !!}
                                                    </div>
                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a href="{{route('service_detail',$service->id.'-Otohizmet-'.\Illuminate\Support\Str::slug($service->name))}}">
                                                                @if( strlen($service->name) >22 )
                                                                    {{substr($service->name,0,22)}}...
                                                                @else
                                                                    {{substr($service->name,0,22)}}
                                                                @endif
                                                            </a></h3>
                                                        <div class=" rating rateit-small">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wide-banners wow fadeInUp outer-bottom-xs">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="wide-banner cnt-strip">
                                    <div class="image"> <img class="img-responsive" src="/site/img/banner.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                        <div class="more-info-tab clearfix ">
                            <h3 class="new-product-title pull-left">Trend Ürünler</h3>
                            <button class="btn btn-primary pull-right" type="button">Tümünü Gör</button>
                        </div>
                        <div class="tab-content outer-top-xs">
                            <div class="tab-pane in active">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">


                                        @foreach($products as $product)
                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        @php $image = json_decode($product->images) @endphp
                                                            @php
                                                                $weekego =  Carbon::now()->format('ymd')-7  ;
                                                                 if($product->created_at->format('ymd') >= $weekego){
                                                                     $new = '<div class="tag new"><span>Yeni</span></div> ';
                                                                 }else{   $new ='' ;  }
                                                            @endphp

                                                        <div class="product-image">
                                                            <a href="{{route('product_detail',\Illuminate\Support\Str::slug($product->name).'-P'.$product->id)}}">
                                                                <div class="image" >
                                                                    <img class="cover"  alt="{{$product->name}}" title="{{$product->name}}"
                                                                         src="{{env('APP_URL')}}/storage/uploads/thumbnail/malls/{{$product->market_id}}/productimages/small/{{$image->cover}}" title="{{$product->name}}" alt="{{$product->name}}">
                                                                 </div>
                                                            </a>
                                                             {!! $new !!}
                                                        </div>
                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a href="{{route('product_detail',\Illuminate\Support\Str::slug($product->name).'-P'.$product->id)}}">
                                                                    @if( strlen($product->name) >22 )
                                                                        {{substr($product->name,0,22)}}...
                                                                    @else
                                                                        {{substr($product->name,0,22)}}
                                                                    @endif</a>
                                                            </h3>
                                                            <div class="  rateit-small">
                                                                {!! getproductrate($product->id) !!}
                                                            </div>
                                                            <div class="description">
                                                                @if( strlen($product->meta_desc) >50 )
                                                                    {{substr($product->meta_desc,0,50)}}...
                                                                    @else
                                                                    {{substr($product->meta_desc,0,50)}}
                                                                    @endif
                                                            </div>
                                                            <div class="description"></div>
                                                            <div class="product-price">
                                                                @if($product->sale_price != $product->price)
                                                                    <span class="price"> {{$product->sale_price}} ₺</span>
                                                                    <span class="price-before-discount">{{$product->price}} ₺</span>
                                                                @endif
                                                                @if($product->sale_price == $product->price)
                                                                    <span class="price"> {{$product->price}} ₺  </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <button data-toggle="tooltip" class="btn btn-primary icon addtocart" data-productId="{{$product->id}}|{{$product->name}}|{{$image->cover}}|{{$product->sale_price ==NULL?$product->price:$product->sale_price}}|1|{{$product->market_id}}"  type="button" title="Sepete Ekle"> <i class="fa fa-shopping-cart"></i> </button>
                                                                        <button class="btn btn-primary cart-btn" type="button">Sepete Ekle</button>
                                                                    </li>
                                                                    <li class="lnk wishlist addwishlist" data-id="{{$product->id}}">
                                                                        <a data-toggle="tooltip"  title="Listeme Ekle"> <i class="icon fa fa-heart"></i> </a>
                                                                    </li>

                                                                </ul>
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

                    <div class="wide-banners wow fadeInUp outer-bottom-xs">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="wide-banner cnt-strip">
                                    <div class="image"> <img class="img-responsive" src="/site/img/banner.png" alt="">
                                    </div>
{{--                                    <div class="strip strip-text">--}}
{{--                                        <div class="strip-inner">--}}
{{--                                            <h2 class="text-right">Trend Hizmetler<br>--}}
{{--                                                <span class="shopping-needs">Hizmetlerde %10 İndirim</span></h2>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                        <div class="more-info-tab clearfix ">
                            <h3 class="new-product-title pull-left">Trend Hizmetler</h3>
                            <button class="btn btn-primary pull-right" type="button">Tümünü Gör</button>
                        </div>
                        <div class="tab-content outer-top-xs">
                            <div class="tab-pane in active">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                        @foreach($products as $product)
                                            @php
                                                $weekego =  Carbon::now()->format('ymd')-7  ;
                                                 if($product->created_at->format('ymd') >= $weekego){
                                                     $new = '<div class="tag new"><span>Yeni</span></div> ';
                                                 }else{   $new ='' ;  }
                                            @endphp


                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        @php $image = json_decode($product->images) @endphp
                                                        <div class="product-image">
                                                            <a href="{{route('product_detail',\Illuminate\Support\Str::slug($product->name).'-P'.$product->id)}}">
                                                            <div class="image" >
                                                                <img class="cover"  alt="{{$product->name}}" title="{{$product->name}}" src="{{env('APP_URL')}}/storage/uploads/thumbnail/malls/{{$product->market_id}}/productimages/small/{{$image->cover}}" title="{{$product->name}}" alt="{{$product->name}}">
                                                            </div>
                                                            </a>
                                                            {!! $new !!}
                                                        </div>
                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a href="{{route('product_detail',\Illuminate\Support\Str::slug($product->name).'-P'.$product->id)}}">
                                                                    @if( strlen($product->name) >22 )
                                                                        {{substr($product->name,0,22)}}...
                                                                    @else
                                                                        {{substr($product->name,0,22)}}
                                                                    @endif</a>
                                                            </h3>
                                                            <div class="rateit-small">
                                                                 {!! getproductrate($product->id) !!}
                                                            </div>
                                                            <div class="description">
                                                                @if( strlen($product->meta_desc) >50 )
                                                                    {{substr($product->meta_desc,0,50)}}...
                                                                    @else
                                                                    {{substr($product->meta_desc,0,50)}}
                                                                    @endif
                                                            </div>
                                                            <div class="product-price">
                                                                @if($product->sale_price != $product->price)
                                                                    <span class="price"> {{$product->sale_price}}₺</span>
                                                                    <span class="price-before-discount">{{$product->price}}₺</span>
                                                                @endif
                                                                @if($product->sale_price == $product->price)
                                                                    <span class="price"> {{$product->price}}₺  </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <button data-toggle="tooltip" class="btn btn-primary icon addtocart"
                                                                            data-productId="{{$product->id}}|{{$product->name}}|{{$image->cover}}|{{$product->sale_price ==NULL?$product->price:$product->sale_price}}|1|{{$product->market_id}}"
                                                                                type="button" title="Sepete Ekle"> <i class="fa fa-shopping-cart"></i> </button>
                                                                        <button class="btn btn-primary cart-btn" type="button">Sepete Ekle</button>
                                                                    </li>
                                                                    <li class="lnk wishlist addwishlist"  data-id="{{$product->id}}">
                                                                        <a data-toggle="tooltip"  title="Listeme Ekle"> <i class="icon fa fa-heart"></i> </a>
                                                                    </li>

                                                                </ul>
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


                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                        <div class="more-info-tab clearfix ">
                            <h3 class="new-product-title pull-left">Diğer Ürünler</h3>
                            <button class="btn btn-primary pull-right" type="button">Tümünü Gör</button>
                        </div>
                        <div class="tab-content outer-top-xs">
                            <div class="tab-pane in active">
                                <div class="product-slider">
                                    <div class="row" id="productscontnetdiv" >

                                    </div>
                                    <center id="loaderdiv">
                                        <img id="loader_giph" width="50px"  src="https://retromotion.com/skin/frontend/fahrtwind/default/img/ajaxloader.gif" alt="">
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>

@endsection


@section('js')
            <script>
                var mypage= 1;
                mycontent(mypage);

                $(window).scroll(function(){
                    if($(window).scrollTop()+$(window).height() == $(document).height()){
                        mypage++;
                        mycontent(mypage)
                    }
                })

                function mycontent(mypage){
                    $('#loader_giph').show();
                    $.post('{{route('scrollloadproducts')}}',{page:mypage,_token:'{{csrf_token()}}'},function (data) {
                        if (data.length == 0){
                            $('#loaderdiv').text('Bu istek sonucunda yüklenecek başka ürün bulunamadı')
                        }else{
                            $('#productscontnetdiv').append(data);
                            $('#loader_giph').hide();

                        }
                    })
                }

            </script>
@endsection
