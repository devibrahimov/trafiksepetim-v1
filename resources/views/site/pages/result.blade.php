@extends('site.index')

@section('css')
@endsection

@section('content')

    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row'>
                <div class='col-md-3 sidebar'>
{{--                    @include('site.partials.navcategories')--}}
                    @include('site.partials.productfilter')
                </div>
                <div class='col-md-9'>
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
            $.post('{{route('result')}}',{page:mypage,word:'{{$word}}',_token:'{{csrf_token()}}'},function (data) {
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
