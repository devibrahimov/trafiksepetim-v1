@php use Carbon\Carbon @endphp
@extends('site.index')

@section('css')
@endsection

@section('content')

    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row'>
                <div class='col-md-3 sidebar'>
                    @include('site.partials.navcategories')
                    <div class="sidebar-module-container">
                        <div class="sidebar-filter">
                            <div class="sidebar-widget wow fadeInUp bsNone">
                                <h3 class="section-title">Filtrele</h3>
                            </div>
                            <div class="sidebar-widget">
                                <div class="widget-header">
                                    <h4 class="widget-title pb-2">İl</h4>
                                </div>
                                <select data-live-search="true" data-style="btn-inverse" data-live-search-style="startsWith" class="selectpicker">
                                    <option value="Adana">Adana</option>
                                    <option value="Adana">Adana</option>
                                </select>
                            </div>
                            <div class="sidebar-widget wow fadeInUp">
                                <div class="widget-header">
                                    <h4 class="widget-title">Fiyat Aralığı</h4>
                                </div>
                                <div class="sidebar-widget-body m-t-10">
                                    <div class="price-range-holder">
                                        <span class="min-max">
                                            <span class="pull-left" id="priceMin" data-value="100">100,00₺</span>
                                        <span class="pull-right" id="priceMax" data-value="8952">8952,00₺</span>
                                        </span>
                                        <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                                        <input type="text" class="price-slider" value="">
                                    </div>
                                    <a href="#" class="lnk btn btn-primary">Ara</a> </div>
                            </div>
                            <div class="home-banner bsNone mb-1"> <img src="/site/images/banners/app.png" class="img-responsive" alt="Image"> </div>
                            <div class="home-banner bsNone mt-1"> <img src="/site/images/banners/play.png" class="img-responsive" alt="Image"> </div>
                        </div>
                    </div>
                </div>
                <div class='col-md-9'>

                    <div class="breadcrumb">
                        <div class="container">
                            <div class="breadcrumb-inner">
                                <ul class="list-inline list-unstyled">
                                    <li><a href="index.html">Anasayfa</a></li>
                                    <li class='active'>Hizmetler</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div id="category" class="category-carousel hidden-xs  homebanner-holder">
                        <div id="hero">
                            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

                                <div class="item" style="background-image: url('site/img/banner/870x410.jpg');">
                                    <div class="container-fluid">
                                        <div class="caption bg-color vertical-center text-left">

                                        </div>
                                    </div>
                                </div>

                                <div class="item" style="background-image: url('site/images/banners/cat-banner-1.jpg');">
                                    <div class="container-fluid">
                                        <div class="caption bg-color vertical-center text-left">

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                                    <div class="row">
                                        @foreach($services as $service)
                                             @php
                                                   $weekego =  Carbon::now()->format('ymd')-7  ;
                                                 if($service->created_at->format('ymd') >= $weekego){
                                                     $new = '<div class="tag new"><span>Yeni</span></div> ';
                                                 }else{   $new ='' ;  }
                                            @endphp
                                            @php $image = json_decode($service->images) @endphp
                                            <div class="col-sm-6 col-md-3 wow fadeInUp " >
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="{{route('service_detail',$service->id.'-Otohizmet-'.\Illuminate\Support\Str::slug($service->name))}}">
                                                                    <img class="cover" alt="{{$service->name}}" title="{{$service->name}}"
                                                                         src="{{env('APP_URL')}}/storage/uploads/thumbnail/service/{{$service->provider_id}}/posts/small/{{$image->cover}}">
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
                                                            <div class="rating rateit-small"></div>
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

        </div>
    </div>

@endsection


@section('js')
    <script>
        var p = $( "div.col-md-9" ).first();


        var lastScrollTop = 0;
        var scrollheight = p.outerHeight();
        console.log(scrollheight);
        $(window).on('scroll', function() {
            st = $(this).scrollTop();
            if(st < lastScrollTop) {
                console.log('up 1');
            }
            else {

                if(st == scrollheight){
                    console.log('yukseklik : '+st);

                }


            }
            lastScrollTop = st;
        });
    </script>
@endsection
