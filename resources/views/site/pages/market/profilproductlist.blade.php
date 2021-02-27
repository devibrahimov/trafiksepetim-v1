@php
use App\Http\Controllers\Site\Market\MarketProcessController ;
$market = (new MarketProcessController())->getMarketrow(auth()->guard('market')->user()->id);
//print_r($market);die;
@endphp

@extends('site.index')


@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Anasayfa</a></li>
                    <li class='active'>Marketim</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="body-content mb-5">
        <div class="container">
            <div class="row">
                <div class="blog-page">
                    <div class="col-md-3 sidebar">
                        <div class="sidebar-module-container">
                            <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                                <h3 class="section-title">Menü</h3>
                                <div class="sidebar-widget-body m-t-10">
                                    <a href="{{route('market.profilproductslist')}}" class="marketimSideMenu">Ürünlerim <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                    <a href="{{route('market.profil')}}" class="marketimSideMenu">Hesap Bilgileri <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                    <a href="#" class="marketimSideMenu">Siparişler <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                    <a href="#" class="marketimSideMenu">Gelirler <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                    <a href="#" class="marketimSideMenu">Yorumlar <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                    <a href="#" class="marketimSideMenu">Şifreni Değiştir  <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                    <a href="#" class="marketimSideMenu">Çıkış Yap <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="blog-post">
                            <div class="row">
                                <div class=" wow fadeInUp col-12" style="margin-bottom: 20px;">
                                    <img class="img-responsive" src="/storage/uploads/thumbnail/market_cover_photo/large/{{$market->market_cover_photo}}" alt="">
                                </div>
                                <div class="wow fadeInUp col-sm-2 col-xs-6">
                                    <img src="/storage/uploads/thumbnail/market_profil_photo/small/{{$market->market_profil_photo}}" class="img-responsive" alt="">
                                </div>
                                <div class="wow fadeInUp col-sm-5 col-xs-6">
                                    <h1>Mağaza Adı</h1>
                                    <a href="#HesapBilgileri"><span class="author">Hesap Bilgileri</span></a>
                                </div>
                                <div class="wow fadeInUp col-sm-5 col-xs-6 hidden-xs">
                                    <a href="#ÇıkışYap">
                                        <button class="btn btn-primary cart-btn pull-right" style="margin-top: 25px;" type="button"> <i class="fa fa-sign-out" aria-hidden="true"></i> Çıkış Yap</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-2">
                        <div class="outer-bottom-xs blog-post outer-top-xs">
                            <div class="row mb-5">
                                <div class="col-xs-4 pull-left">
                                    <h1>Ürünler</h1>
                                </div>
                                <div class="col-xs-8">
                                    <a href="#ÜrünEkle">
                                        <button class="btn btn-primary cart-btn pull-right mt-3 ml-3" type="button"> <i class="fa fa-plus" aria-hidden="true"></i> Ürün Ekle</button>
                                    </a>
                                    <div class="btn-group pull-right mt-3">
                                        <button type="button" class="btn btn-primary cart-btn pull-right dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-filter" aria-hidden="true"></i> Filtreleme
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">A-Z Filtrele</a></li>
                                            <li><a href="#">Z-A Filtrele</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">

                                <div class="col-md-12">
                                    <div class="dataTable">
                                        <table class="responsive-table">
                                            <thead>
                                            <tr>
                                                <th scope="col">Resim</th>
                                                <th scope="col">Ürün&nbsp;Adı</th>
                                                <th scope="col">Açıklama</th>
                                                <th scope="col">Fiyat</th>
                                                <th scope="col">Kalan&nbsp;Ürün</th>
                                                <th scope="col">Gösterim</th>
                                                <th scope="col">Düzenle</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($products as $product)
                                                @php $image = json_decode($product->images) @endphp
                                            <tr  >
                                                <td  data-title="Resim" style="height:15px;background: url('/storage/uploads/thumbnail/productimages/small/{{$image->cover}}') no-repeat;
                                                    background-size: cover;background-position: center center !important;">
{{--                                                    <img src="/storage/uploads/thumbnail/productimages/small/{{$image->cover}}" width="25px" alt="">--}}
                                                </td>
                                                <th scope="row">{{$product->name}}</th>
                                                <td data-title="Açıklama">{{$product->meta_desc}}</td>
                                                <td data-title="Fiyat" data-type="currency">{{$product->price}}</td>
                                                <td data-title="Kalan Ürün" data-type="currency">{{$product->stock}}</td>
                                                <td data-title="Gösterim" data-type="currency">{{$product->show_count}}</td>
                                                <td data-title="Düzenle">
                                                    <a href="#ÜrünEkle">
                                                        <button class="btn btn-primary cart-btn pull-right mt-3" type="button"><i class="fa fa-cogs" aria-hidden="true"></i></button>
                                                    </a>
                                                </td>
                                            </tr>

                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
