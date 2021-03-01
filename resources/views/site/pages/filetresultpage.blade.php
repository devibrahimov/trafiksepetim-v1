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
                            @include('site.partials.sortby')
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

        @if(isset($filterquery['rate']))
            @if($filterquery['rate'] == 5)
            $('#fiverate').trigger('click');
            @endif
            @if($filterquery['rate'] == 4)
            $('#fourrate').trigger('click');
            @endif
            @if($filterquery['rate'] == 3)
            $('#threerate').trigger('click');
            @endif
            @if($filterquery['rate'] == 2)
            $('#tworate').trigger('click');
            @endif
            @if($filterquery['rate'] == 1)
            $('#onerate').trigger('click');
            @endif
            @if($filterquery['rate'] == null)
            $('#notrate').trigger('click');
            @endif
        @endif


        var mypageResult= 1;
        var ratevalue ;
        ratevalue = $("input[name=\"rate\"]:checked").val();
        var filtersort = $("#filtersort .sss").val() ;
        var listtype = 'grid';

        myFilterResult(mypageResult, filtersort, listtype)

        $(window).scroll(function(){
            if($(window).scrollTop()+$(window).height() == $(document).height()) {
                mypageResult++;
                myFilterResult(mypageResult,filtersort ,listtype)
            }
        });

        $('.liststyle').on('click',function () {
            filtersort = $(this).attr('data-val');
            listtype = $(this).attr('data-type') ;
            $('#productscontnetdiv').html('');
            myFilterResult(mypageResult,filtersort ,listtype);
        })

        $('#filtersort').change(function(){
            var mypageResult= 1;
            var filtersort= $("#filtersort option:selected ").val() ;
            $('#liststylegrid').attr('data-val',filtersort)
            $('#liststylelist').attr('data-val',filtersort)
            $('.sss').removeClass('sss');
            $("#filtersort  option:selected ").addClass('sss');
            $('#productscontnetdiv').html('');
            myFilterResult(mypageResult,filtersort ,listtype);
        })



        function  myFilterResult(mypageResult,filtersort ,listtype){

                $('#loader_giph').show();
            var filtercategory= $("#filtercategory option:selected ").val() ;
            var filtersubcategory= $("#filtersubcategory option:selected ").val() ;
            var filterminprice = $('#filterminprice').val() ;
            var filtermaxprice = $('#filtermaxprice').val() ;
            var state =  $("#filterstate option:selected ").val() ;
            var filtercarcompany =  $("#filtercarcompany option:selected ").val() ;
            var filterstock = $('#filterstock').val() ;
            var salepriceproduct =   $('#salepriceproduct').prop('checked');
            var rate = ratevalue ;

            $.post('{{route('getFilterProductsResult')}}',{page:mypageResult,filtercategory:filtercategory,
                filterminprice:filterminprice,
                filtermaxprice:filtermaxprice,
                state:state,
                filtercarcompany:filtercarcompany,
                filterstock:filterstock,
                salepriceproduct:salepriceproduct,
                rate:rate,
                filtersort:filtersort,
                listtype:listtype, _token:'{{csrf_token()}}'},function (data) {
                if (data.length == 0){
                    $('#loaderdiv').text('Bu istek sonucunda yüklenecek başka ürün bulunamadı')
                }else{
                    $('#productscontnetdiv').append(data);
                    $('#loader_giph').hide();
                }
            });


        }

    </script>
@endsection
