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
                    <div class="sidebar-module-container">
                        <div class="sidebar-filter">
                            <div class="sidebar-widget wow fadeInUp bsNone">
                                <h3 class="section-title">Filtrele</h3>
                                <div class="widget-header">
                                    <h4 class="widget-title">Kategori</h4>
                                </div>

{{--                                @if(isset($categories))--}}
{{--                                    @foreach($categories as $category)--}}
{{--                                        <div class="sidebar-widget-body">--}}

{{--                                            <div class="accordion">--}}
{{--                                                <div class="accordion-group">--}}
{{--                                                    <div class="accordion-heading">--}}
{{--                                                        @if(isset($parentcategory))--}}
{{--                                                            @php $uri= Str::slug($parentcategory->name).'-C'.$parentcategory->id.'/'. Str::slug($category->name).'-C'.$category->id @endphp--}}
{{--                                                            <a href="{{$parentcategory->has_child == 1 ? '#collapse'.$category->id : route('category_products', $uri)}}"  data-toggle="collapse"  class="accordion-toggle collapsed">--}}
{{--                                                                {{$category->name}}--}}
{{--                                                            </a>--}}
{{--                                                        @else--}}
{{--                                                            @php $uri= Str::slug($parentcategory->name).'-C'.$parentcategory->id.'/'. Str::slug($category->name).'-C'.$category->id @endphp--}}
{{--                                                            <a href="{{ route('category_products', $uri)}}"  class="accordion-toggle collapsed">--}}
{{--                                                                {{$category->name}}--}}
{{--                                                            </a>--}}
{{--                                                        @endif--}}
{{--                                                    </div>--}}
{{--                                                    <div class="accordion-body collapse" id="collapse{{$category->id}}"  >--}}
{{--                                                        <div class="accordion-inner">--}}
{{--                                                            <ul>--}}
{{--                                                                @foreach( ( new  \App\Model\SubCategories)->childcategory($category->id) as $subcat)--}}
{{--                                                                    @php $uri= Str::slug($parentcategory->name).'-C'.$parentcategory->id.'/'. Str::slug($category->name).'-C'.$category->id.'/'. Str::slug($subcat->name).'-C'.$subcat->id  @endphp--}}
{{--                                                                    <li><a href="{{route('category_products',$uri)}}">{{$subcat->name}}</a></li>--}}
{{--                                                                @endforeach--}}

{{--                                                            </ul>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                @endif--}}

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
                                        @foreach($services as $service)
                                            <div class="col-sm-6 col-md-3 wow fadeInUp " >
                                                <div class="products">
                                                    <div class="product">
                                                        @php $image = json_decode($service->images) @endphp
                                                        <div class="product-image">
                                                            <a href="{{route('service_detail',$service->id.'-Otohizmet-'.\Illuminate\Support\Str::slug($service->name))}}">
                                                              <img  class="cover" src="/storage/uploads/thumbnail/service/{{$service->provider_id}}/posts/small/{{$image->cover}}" alt="">
                                                            </a>
                                                            <div class="tag new"><span>yeni</span></div>
                                                        </div>
                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a href="{{route('product_detail',\Illuminate\Support\Str::slug($service->name).'-P'.$service->id)}}">
                                                                    @if( strlen($service->name) >22 )
                                                                        {{substr($service->name,0,22)}}...
                                                                    @else
                                                                        {{substr($service->name,0,22)}}
                                                                    @endif</a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="description"></div>
                                                            <div class="product-price">

                                                                    <span class="price"> {{$service->price}} ₺  </span>

                                                            </div>
                                                        </div>
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <button data-toggle="tooltip" class="btn btn-primary icon addtocart" data-productId="{{$service->id}}|{{$service->name}}|{{$image->cover}}|{{ $service->price }}|1|{{$service->provider_id}}"  type="button" title="Sepete Ekle"> <i class="fa fa-shopping-cart"></i> </button>
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

        </div>
    </div>

@endsection


@section('js')
@endsection
