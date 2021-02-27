@extends('site.index')

@section('css')
@endsection


@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="index.html">Anasayfa</a></li>
                    <li class='active'>Handbags</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row'>
                <div class='col-md-3 sidebar'>
            {{--  @include('site.partials.navcategories')--}}
                    @include('site.partials.productfilter')
                </div>
                <div class='col-md-9'>
                    <div id="category" class="category-carousel hidden-xs">
                        <div class="item">
                            <div class="image"> <img src="/site/images/banners/cat-banner-1.jpg" alt="" class="img-responsive"> </div>
                            <div class="container-fluid">
                                <div class="caption vertical-top text-left">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                                    <div class="row">
                                        @foreach($products as $product)
                                            <div class="col-sm-6 col-md-3 wow fadeInUp " >
                                                <div class="products">
                                                    <div class="product">
                                                        @php $image = json_decode($product->images) @endphp
                                                        <div class="product-image">
                                                            <a href="{{route('product_detail',\Illuminate\Support\Str::slug($product->name).'-P'.$product->id)}}">

                                                                <div class="image" style="height:200px;background: url('/storage/uploads/thumbnail/malls/{{$product->market_id}}/productimages/small/{{$image->cover}}') no-repeat;
                                                                    background-size: cover;background-position: center center !important;">
                                                                </div>
                                                            </a>
                                                            <div class="tag new"><span>yeni</span></div>
                                                        </div>
                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a href="{{route('product_detail',\Illuminate\Support\Str::slug($product->name).'-P'.$product->id)}}">
                                                                    @if( strlen($product->name) >22 )
                                                                        {{substr($product->name,0,22)}}...
                                                                    @else
                                                                        {{substr($product->name,0,22)}}
                                                                    @endif</a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="description"></div>
                                                            <div class="product-price">
                                                                @if($product->sale_price !=NULL)
                                                                    <span class="price"> {{$product->sale_price}} ₺</span>
                                                                    <span class="price-before-discount">{{$product->price}} ₺</span>
                                                                @endif
                                                                @if($product->sale_price ==NULL)
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
                                                                    <li class="lnk wishlist">
                                                                        <a data-toggle="tooltip" class="add-to-cart" href="#" title="Listeme Ekle"> <i class="icon fa fa-heart"></i> </a>
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
                </div>
            </div>
            <div id="brands-carousel" class="logo-slider wow fadeInUp">
                <div class="logo-slider-inner">
                    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                        <div class="item m-t-15">
                            <a href="#" class="image"> <img data-echo="/site/images/brands/brand1.png" src="/site/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item m-t-10">
                            <a href="#" class="image"> <img data-echo="/site/images/brands/brand2.png" src="/site/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item">
                            <a href="#" class="image"> <img data-echo="/site/images/brands/brand3.png" src="/site/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item">
                            <a href="#" class="image"> <img data-echo="/site/images/brands/brand4.png" src="/site/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item">
                            <a href="#" class="image"> <img data-echo="/site/images/brands/brand5.png" src="/site/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item">
                            <a href="#" class="image"> <img data-echo="/site/images/brands/brand6.png" src="/site/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item">
                            <a href="#" class="image"> <img data-echo="/site/images/brands/brand2.png" src="/site/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item">
                            <a href="#" class="image"> <img data-echo="/site/images/brands/brand4.png" src="/site/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item">
                            <a href="#" class="image"> <img data-echo="/site/images/brands/brand1.png" src="/site/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->

                        <div class="item">
                            <a href="#" class="image"> <img data-echo="/site/images/brands/brand5.png" src="/site/images/blank.gif" alt=""> </a>
                        </div>
                        <!--/.item-->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')
@endsection
