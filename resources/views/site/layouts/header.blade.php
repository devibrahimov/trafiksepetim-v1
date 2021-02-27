@php
    use App\Http\Controllers\Helper\HelperController
@endphp
    <!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="lesso.com.tr">
    <meta name="keywords" content="Trafiksepetim,Trafk Sepetim,Oto Servisler,Oto yedek parça">

    {{--    <meta name="robots" content="all">--}}

    <title>Trafik Sepetim</title>
    <meta name="description"
    content="{{isset($metadescription)? $metadescription:'Trafik Sepetim Oto yedek parça  alış satışını ve Oto hizmet verenle oto hizmet isteyeni birleştiren web sitesidir.' }}">

    <link rel="icon" href="site/img/favicon.png" sizes="16x16" type="image/png">
    <link rel="stylesheet" href="{{env('APP_URL')}}/site/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{env('APP_URL')}}/site/css/main.css?v=1.0.3">
    <link rel="stylesheet" href="{{env('APP_URL')}}/site/css/blue.css">
    <link rel="stylesheet" href="{{env('APP_URL')}}/site/css/owl.carousel.css">
    <link rel="stylesheet" href="{{env('APP_URL')}}/site/css/owl.transitions.css">
    <link rel="stylesheet" href="{{env('APP_URL')}}/site/css/animate.min.css">
    <link rel="stylesheet" href="{{env('APP_URL')}}/site/css/rateit.css">
    <link rel="stylesheet" href="{{env('APP_URL')}}/site/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{env('APP_URL')}}/site/css/font-awesome.css">
    <link rel="stylesheet" href="{{env('APP_URL')}}/assets/toastr-notification/toastr.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
          rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,400i,600,600i,700&amp;display=swap"
          rel="stylesheet">
    @yield('css')
    <style>
        img.cover {
            width: 200px;
            height: 200px;
            object-fit: cover;
            padding: 0.5;
            border: 1px solid #cecece;

        }

        li.head > a {
            color: #333;
            font-size: 14px;
            font-family: 'Open Sans', sans-serif;
            text-transform: uppercase;
            background-color: #F39700 !important;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        li.head > a:hover {
            background: #F39700 !important;
            border-radius: 3px 3px 0px 0px;
            color: #ffff !important;
        }

        .header-style-1 .header-nav .navbar-default .navbar-collapse .navbar-nav > li > a {
            padding: 8px 15px !important;
        }

        li#head > a {
            padding-right: 128px !important;
            font-weight: bold;
        }

        .fa-home {
            font-weight: bold !important;
            color: #fff !important;
        }

        li.active .fa-home {
            font-weight: bold !important;
            color: #00446d !important;
        }

        li.active {
            background: #fff !important;
            border-radius: 3px 3px 0px 0px !important;
            color: #00446d !important;
            font-weight: bolder !important;
        }

        .kampaniya {
            width: 0;
            top: 0.5%;
            right: 0.5%;
            height: 0;
            border-width: 0 100px 100px 0;
            position: absolute;
            border-color: transparent #FF0000 transparent transparent;
            border-style: solid;
        }

        .navbar-nav > li.active > a {
            color: #00446d !important;
        }

        .kampaniya span {
            font-weight: bold;
            color: white;
            height: 13rem;
            transform: rotate(45deg);
            -ms-transform: rotate(45deg); /*  for IE  */

            /* 	for browsers supporting webkit (such as chrome, firefox, safari etc.). */
            -webkit-transform: rotate(45deg);
            display: inline-block;
        }

    </style>
</head>

<body class="cnt-home">
<header class="header-style-1">
    <div class="top-bar animate-dropdown">
        <div class="container">
            @if(Auth::guard('market')->check())
                <div class="header-top-inner">
                    <div class="cnt-account">
                        <ul class="list-unstyled">
                            <li><a href="{{route('myshop')}}">
                                    @if(auth('market')->user()->market_profil_photo != NULL and is_file(public_path("/storage/uploads/thumbnail/malls/".auth('market')->user()->id."/profil/medium/".auth('market')->user()->market_profil_photo)) )
                                        <img
                                            src="{{env('APP_URL')}}/storage/uploads/thumbnail/malls/{{auth('market')->user()->id}}/profil/medium/{{auth('market')->user()->market_profil_photo}} "
                                            width="18px" height="18px" title="{{auth('market')->user()->market_name}}"
                                            alt="{{auth('market')->user()->market_name}}">
                                    @else
                                        <img src="{{env('APP_URL')}}/site/img/profil.jpg"
                                             title="trafiksepetim-{{auth('market')->user()->market_name}}"
                                             alt="trafiksepetim-{{auth('market')->user()->market_name}}" width="18px"
                                             height="18px">
                                    @endif

                                    &nbsp; {{auth('market')->user()->market_name}} </a>

                            </li>
                            <li>
                                <a href="#" onclick="event.preventDefault();
                                    document.getElementById('form-submit').submit()">Çıkış Yap</a>
                            </li>
                            <form action="{{route('market.logout')}}" method="post" id="form-submit"
                                  style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </div>
                    <div class="cnt-block">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small  ">
                                <a href="{{route('market-create-product')}}">
                                    <span class="value "><span class="fa fa-shopping-basket"> </span> Yeni Ürün Ekle</a>
                            </li>
                            <li class="dropdown dropdown-small  ">
                                <a href="{{route('market.profilproducts')}}">
                                    <span class="value "><span class="fa fa-tags"> </span> Ürün Yonetimi</a>
                            </li>
                            <li class="dropdown dropdown-small  ">
                                <a href="#">
                                    <span class="value "><i class="fa fa-shopping-cart"> </i> Siparişlerim</span></a>
                            </li>
                            <li class="dropdown dropdown-small  ">
                                <a href="#">
                                    <span class="value "><i class="fa fa-bar-chart"></i> İstatistikler</span></a>
                            </li>

                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            @elseif(Auth::guard('service')->check())
                <div class="header-top-inner">
                    <div class="cnt-account">
                        <ul class="list-unstyled">
                            <li><a href="{{route('service-profil')}}"> {{auth('service')->user()->user_name}} </a></li>
                            <li>
                                <a href="#" onclick="event.preventDefault();
                                    document.getElementById('form-submit').submit()">Çıkış Yap</a>

                            </li>
                            <form action="{{route('servicelogout')}}" method="post" id="form-submit"
                                  style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </div>
                    <div class="cnt-block">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a href="{{route('service-create-product')}}">
                                    <span class="value"><i class="fa fa-pen"> </i> Yeni İlan Ekle</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            @else
                @auth
                    <div class="header-top-inner">
                        <div class="cnt-account">
                            <ul class="list-unstyled">
                                <li><a href="#">{{auth()->user()->name}}</a></li>
                                <li>
                                    <a href="#"
                                       onclick="event.preventDefault(); document.getElementById('form-submit').submit()">Çıkış
                                        Yap</a>
                                </li>
                                <form action="{{route('user.logout')}}" method="post" id="form-submit"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </div>
                        <div class="cnt-block">
                            <ul class="list-unstyled list-inline">
                                <li class="dropdown dropdown-small">
                                    <a href="{{route('mywishlist')}}"> <span class="value">
                                            <span class="icon fa fa-heart"> </span> Beyendiklerim
                                        </span></a>
                                </li>
                                <li class="dropdown dropdown-small">
                                    <a href="#"> <span class="value">
                                            <span class="icon fas fa-cart"> </span> Sepetim
                                        </span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endauth
                @guest
                    <div class="header-top-inner">
                        <div class="cnt-account">
                            <ul class="list-unstyled">
                                <li><a href="{{route('serviceregister')}}">Hizmet Veren Ol</a></li>
                                <li><a href="{{route('marketregister')}}">Ücretsiz Mağaza Aç</a></li>
                                <li><a href="{{route('userregister')}}">Kayıt Ol</a></li>
                                <li><a href="{{route('userlogin')}}">Giriş Yap</a></li>
                            </ul>
                        </div>
                        <div class="cnt-block">
                            <ul class="list-unstyled list-inline">
                                <li class="dropdown dropdown-small">
                                    <a href="#">
                                        <span class="value">Trafik Sepetim Sloganı Alanı</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endguest
            @endif
        </div>
    </div>
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <div class="logo">
                        <a href="{{route('home')}}"> <img src="https://svgshare.com/i/RZs.svg"
                                                          title="trafik Sepetim Logo" alt="Trafik Sepetim - logo"> </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <div class="search-area">
                        <form method="GET" action="{{route('searchresult')}}">

                            <div class="control-group">

                                <input class="search-field" name="queryword"
                                       placeholder="Aradığınız Ürün ismini buraya yazınız"/>
                                <input class="search-button" type="submit" value="Ara">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <div class="dropdown dropdown-cart">
                        <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown"
                           onclick="document.getElementById('sepetSideBar').style.width = '270px';">
                            <div class="items-cart-inner">
                                <div class="basket"><i class="glyphicon glyphicon-shopping-cart"></i></div>
                                <div class="basket-item-count">
                                    <span class="count" id="basketproductcount">
                                        @auth {{ (new HelperController)->basketproductcount(auth()->user()->id)  }}   @endauth
                                        @guest  0 @endguest
                                    </span>
                                </div>
                                <div class="total-price-basket">
                                    <span class="total-price">
                                       <span class="value" id="cartotalpriceshow">
                                            @auth {{ (new HelperController)->baskettotalprice(auth()->user()->id)}}
                                           <span class="sign">₺</span> @endauth
                                           @guest 0.00   @endguest
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </a>

                        <div id="sepetSideBar" class="sepetSideBar">
                            <a href="javascript:void(0)" class="sepetSideBarClose"
                               onclick=" document.getElementById('sepetSideBar').style.width = '0';">×</a>

                            @auth
                                <div id="cartproducts">
                                    @php $basketproducts = (new HelperController)->getbasketproducts()  @endphp
                                    @php $baskettotalprice = (new HelperController)->baskettotalprice(auth()->user()->id)  @endphp
                                    @if(isset($basketproducts))
                                        @foreach($basketproducts as $prdct)
                                            <div class="product mt-2  " style="border-bottom: #666666">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="image">
                                                            <a href="#">
                                                                <img
                                                                    src="storage/uploads/thumbnail/malls/{{$prdct->market_id}}/productimages/small/{{$prdct->image}}"
                                                                    title="{{$prdct->name}}" alt="{{$prdct->name}}">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <div class="product-price"> <span class="productname">
                                                                @if( strlen($prdct->name) >17 )
                                                                        {{substr($prdct->name,0,17)}}...
                                                                    @else
                                                                        {{substr($prdct->name,0,17)}}
                                                                    @endif</span></div>
                                                            {{--                                                        <div class="rating rateit-small"></div>--}}
                                                            <div class="cartpriceshow"
                                                                 data-value="{{$prdct->sale_price !=NULL?$prdct->sale_price :$prdct->price}}">
                                                                {{$prdct->sale_price !=NULL?$prdct->sale_price :$prdct->price}} </span>
                                                                ₺ x
                                                                <span
                                                                    class="cartquantityshow">{{$prdct->quantity}} </span>
                                                            </div>
                                                            <i class="fa fa-trash sepetSideBarTrash" id="{{$prdct->id}}"
                                                               data-productprice="{{$prdct->sale_price !=NULL?$prdct->sale_price :$prdct->price}}"
                                                               data-productqty="{{$prdct->quantity}}"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            @endauth
                            <div class="fitBottom">
                                <div>
                                    <h5>Toplam</h5>
                                    @auth  <span id="cartotalprice" data-value="{{$baskettotalprice}}">{{$baskettotalprice}}₺</span> @endauth
                                    @guest <span>0 ₺</span>@endguest
                                </div>
                                <div>
                                    <a href="{{route('basket')}}" class="btn btn-primary sepetButton">Sepete Git</a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                            class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span></button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav" style="float: left">
                                <li id="head" class="head"><a><i class="icon fa fa-align-justify fa-fw"></i>Kategoriler</a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav" style="float: right">

                                <li class="@if(isset($active)) {{  $active=='home' ? 'active' : '' }} @endif">
                                    <a href="{{route('home')}}"> <i class="fa fa-home"></i> </a>
                                </li>
                                <li class="@if(isset($active)) {{ $active=='kampanyaproducts'? 'active' : '' }}@endif">
                                    <a href="{{route('kampanyaproducts')}}">Kampanyalar</a>
                                </li>

                                {{--                                <li>--}}
                                {{--                                    <a href="#">Fırsatlar</a>--}}
                                {{--                                </li>--}}
                                <li class="@if(isset($active)) {{  $active=='trendproducts'? 'active' : '' }}@endif">
                                    <a href="{{route('trendproducts')}}">Trend Ürünler</a>
                                </li>
                                <li class="@if(isset($active)) {{ $active=='products'? 'active' : '' }}@endif">
                                    <a href="{{route('products')}}" title="Ürünler">Ürünler</a>
                                </li>
                                <li class="@if(isset($active)) {{ $active=='services'? 'active' : '' }}@endif">
                                    <a href="{{route('services')}}">Hizmetler</a>
                                </li>
                                <li class="@if(isset($active)) {{ $active=='malls'? 'active' : '' }}@endif">
                                    <a href="{{route('malls')}}" title="Mağazalar">Mağazalar</a>
                                </li>
                                <li class="@if(isset($active)) {{ $active=='saleproducts'? 'active' : '' }}@endif">
                                    <a href="{{route('saleproductsguest')}}" title="İndirimli Ürünler">İndirimdeki
                                        Ürünler</a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
