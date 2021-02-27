@extends('site.index')

@section('css')
@endsection

@section('content')

    <div class="body-content  ">
        <div class='container'>
            <div class='row'>
                <div class='col-md-3 sidebar'>
                    @include('site.partials.navcategories')
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
                            @include('site.partials.sortby')
                            <div class="tab-pane active  " id="grid-container" style="margin-top: 20px">
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
        var filtersort= $("#filtersort .sss").val() ;
        listtype = 'grid';
        mycontent(mypage,filtersort,listtype);
        $('.liststyle').on('click',function () {
            filtersort = $(this).attr('data-val');
            listtype = $(this).attr('data-type') ;
            $('#productscontnetdiv').html('');
            mycontent(mypage,filtersort,listtype);
        })

        $('#filtersort').change(function(){
            var mypage= 1;
            var filtersort= $("#filtersort option:selected ").val() ;
            $('#liststylegrid').attr('data-val',filtersort)
            $('#liststylelist').attr('data-val',filtersort)
            $('.sss').removeClass('sss');
            $("#filtersort  option:selected ").addClass('sss');
            $('#productscontnetdiv').html('');
            mycontent(mypage,filtersort,listtype);
        })

        $(window).scroll(function(){
            if($(window).scrollTop()+$(window).height() == $(document).height()){
                mypage++;
                mycontent(mypage,filtersort,listtype)
            }
        })

        function mycontent(mypage,filtersort){
            $('#loader_giph').show();
            $.post('{{route('scrollloadtrendproducts')}}',{page:mypage,filtersort:filtersort,listtype:listtype,_token:'{{csrf_token()}}'},function (data) {
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
