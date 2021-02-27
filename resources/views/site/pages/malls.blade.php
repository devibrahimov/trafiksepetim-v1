@extends('site.index')

@section('css')
    <style>
        #owl-main {
            height: 175px;
        }
        #owl-main .item {
            height: 175px!important;
        }
    </style>
@endsection

@section('content')
{{--    <div class="breadcrumb">--}}
{{--        <div class="container">--}}
{{--            <div class="breadcrumb-inner">--}}
{{--                <ul class="list-inline list-unstyled">--}}
{{--                    <li><a href="index.html">Anasayfa</a></li>--}}
{{--                    <li class='active'>Handbags</li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="body-content outer-top-xs mb-5">

        <div class='container'>

            <div id="category" class="category-carousel hidden-xs  homebanner-holder">
                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

                        <div class="item" style="background-image: url('site/img/cover.jpg');">
                            <div class="container-fluid">
                                <div class="caption bg-color vertical-center text-left">

                                </div>
                            </div>
                        </div>

                        <div class="item" style="background-image: url('site/img/cover.jpg');">
                            <div class="container-fluid">
                                <div class="caption bg-color vertical-center text-left">

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class='row'>
                <div class='col-md-12'>
                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                                    <div class="row">
                                         @foreach($malls as $mall)
                                        <div class="col-sm-3 col-md-2 wow fadeInUp " >
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image" style="border:solid 1px #cecece; padding:2px">
                                                            <a href="#">
                                                                @if($mall->market_profil_photo != NULL and is_file(public_path("storage/uploads/thumbnail/malls/$mall->id/profil/medium/$mall->market_profil_photo")) )

                                                                    <img style="height:150px;" src="storage/uploads/thumbnail/malls/{{$mall->id}}/profil/medium/{{$mall->market_profil_photo}}" title="{{$mall->market_name}}" alt="{{$mall->market_name}}">
                                                                @else
                                                                    <img style="height:150px;" src="site/img/profil.jpg" title="{{$mall->market_name}}" alt="{{$mall->market_name}}">

                                                                @endif
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a href="#">{{$mall->market_name}}</a></h3>
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

@endsection
