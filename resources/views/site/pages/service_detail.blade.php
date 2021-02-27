@extends('site.index')
@php
    use \App\Model\Category ;
    use \App\Model\SubCategories ;
    use \App\Model\SubSecondCategories ;

    $category = json_decode($service->category);
    $image = json_decode($service->images);
    $img = $image->cover;


@endphp

@section('css')
    <style>
        h1.name {
            font-size: 22px;
        }

        table, th, td {
            border: 1px solid #f3f3f3;
            border-collapse: collapse;
        }

        th, td {
            padding: 5px;
            text-align: left;
        }

        table {
            margin-top: 10px;
        }
    </style>
@endsection


@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="index.html">Anasayfa</a></li>
                    <li class='active'>Ürün adı</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product'>

                <div class='col-md-3 sidebar'>

                    <div class="sidebar-module-container">
                        <div class="sidebar-widget hot-deals outer-top-no">
                            <h3 class="section-title">Fırsatlar</h3>
                            <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
                                <div class="item">
                                    <div class="products">
                                        <div class="hot-deal-wrapper">
                                            <div class="image"><img
                                                    src="{{env('APP_URL')}}/site/images/hot-deals/p25.jpg" alt=""></div>
                                        </div>
                                        <div class="product-info text-left m-t-20">
                                            <h3 class="name"><a href="#">3 veya 5 ürün çekilecek slider</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="product-price"><span class="price"> 600,00₺ </span> <span
                                                    class="price-before-discount">800,00₺</span></div>
                                        </div>
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <div class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="dropdown"
                                                            type="button"><i
                                                            class="fa fa-shopping-cart"></i></button>
                                                    <button class="btn btn-primary cart-btn" type="button">Sepete Ekle
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget outer-bottom-small">
                        <h3 class="section-title">Spesyal Ürünler</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div
                                class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                                <div class="item">
                                    <div class="products special-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#"> <img
                                                                        src="{{env('APP_URL')}}/site/images/products/p30.jpg"
                                                                        alt=""> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">slider</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"><span
                                                                    class="price"> $450.99 </span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#"> <img src="/site/images/products/p29.jpg"
                                                                                  alt=""> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"><span
                                                                    class="price"> $450.99 </span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#"> <img
                                                                        src="{{env('APP_URL')}}/site/images/products/p28.jpg"
                                                                        alt=""> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"><span
                                                                    class="price"> $450.99 </span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="home-banner bsNone mb-1"><img src="{{env('APP_URL')}}/site/images/banners/app.png"
                                                              class="img-responsive" alt="Image"></div>
                    <div class="home-banner bsNone mt-1"><img src="{{env('APP_URL')}}/site/images/banners/play.png"
                                                              class="img-responsive" alt="Image"></div>

                </div>


                <div class='col-md-9'>
                    <div class="detail-block">
                        <div class="row">

                            <div class='col-sm-6 col-md-5 product-info-block'>
                                <div class="img-zoom-container">
                                    <img id="myimage"
                                         src="{{env('APP_URL')}}/storage/uploads/thumbnail/service/{{$service->provider_id}}/posts/medium/{{$image->cover}}"
                                         class="img-responsive">
                                    <div id="myresult" class="img-zoom-result"></div>
                                </div>
                                <div class="singleItemGaleryThumbHolder row p-3">
                                    @foreach($image->images as $image)
                                        <div class="col-xs-3 p-2">
                                            <img onclick="document.getElementById('myimage').src = this.getAttribute('src');
                                imageZoom('myimage', 'myresult')"
                                                 src="{{env('APP_URL')}}/storage/uploads/thumbnail/service/{{$service->provider_id}}/posts/small/{{$image}}"
                                                 class="img-responsive imgChange"
                                                 title="Trafik Sepetim - {{$service->name}}"
                                                 alt="Trafik Sepetim - {{$service->name}}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class='col-sm-6 col-md-7 product-info-block'>
                                <div class="product-info">
                                    <h1 class="name">{{$service->name}} </h1>

                                    <div class="rating-reviews m-t-10">

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class=" rateit-small">
                                                    @if(isset($rate->rate) )
                                                        @for($i= 1; $i<=$rate->rate ;$i++)
                                                            <i class="fa fa-star" style="color: orange"
                                                               aria-hidden="true"></i>
                                                        @endfor
                                                        @for($i= 1; $i<= 5-$rate->rate ;$i++)
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        @endfor
                                                    @endif
                                                </div>
                                                <span>  ( {{count($comments)}} Oylama )</span>
                                                <div class="price-box">
                                                    <span>Hizmet Bedeli : </span>
                                                    <span class="price">{{$service->price}}₺</span>
                                                </div>

                                                <div class="favorite-button m-t-10">
                                                    <button class="btn btn-primary addservicewishlist"
                                                            data-toggle="tooltip" data-id="{{$service->id}}"
                                                            data-placement="right" title="Beğen" href="#">
                                                        <i class="fa fa-heart"></i>
                                                    </button>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="stock-container info-container m-t-5">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    @php
                                                        $work = json_decode($service->work_time);
                                                    @endphp
                                                    <table width="100%" class="m-t-5">
                                                        <tr>
                                                            <th>Hafta içi Açılış - Kapanış saatı</th>
                                                            <td>
                                                                <span>{{$work->week->week_open}} - {{$work->week->week_close}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Hafta Sonu Cumaertesi Açılış - Kapanış saatı</th>
                                                            <td>
                                                                <span>{{$work->saturday->saturdaynotwork == 'on'? 'Kapalı':$work->saturday->saturday_open.'-'.$work->saturday->saturday_close }} </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Pazar gunu Açılış - Kapanış saatı</th>
                                                            <td>
                                                                <span>{{$work->sunday->sundaynotwork == 'on'? 'Kapalı': $work->sunday->sunday_open.' - '.$work->sunday->sunday_close }} </span>
                                                            </td>
                                                        </tr>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active"><a data-toggle="tab" href="#ozellik">Özellikler</a></li>
                                    <li><a data-toggle="tab" href="#aciklama">Açıklama</a></li>
                                    <li><a data-toggle="tab" href="#yorum">Yorumlar</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-9">

                                <div class="tab-content">

                                    <div id="ozellik" class="tab-pane in active">

                                        <div class="product-tab">
                                            <strong>
                                                <h4>Hizmet verenin</h4>
                                            </strong>
                                            <table width="100%" class="m-t-5">


                                                <tr>
                                                    <th> Adı Soyadı </th>
                                                    <td>
                                                        <span>{{$provider->name}} </span>
                                                        <span>{{$provider->surname}} </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th> İletişim Numarası  </th>
                                                    <td>
                                                        <span>{{$provider->ceptelefonu}} </span>
                                                    </td>
                                                </tr>
                                                <tr >
                                                    <th> Adresi </th>
                                                    <td>
                                                        <span>{{$provider->adress}} </span>
                                                    </td>
                                                </tr>

                                            </table>

                                            <table width="100%" class="m-t-5">
                                                <strong>
                                                    <h4>Araba modelleri</h4>
                                                </strong>
                                                @php $cars = json_decode($service->car_company) ;   @endphp
                                                @foreach ($cars as $id)
                                                    <td><span> {{ (new App\Model\Cars)->carmarka($id)->name }}</span>
                                                    </td>
                                                @endforeach


                                            </table>

                                        </div>
                                    </div>

                                    <div id="aciklama" class="tab-pane">
                                        <div class="product-tab">
                                            <p class="text">{!! $service->description !!}</div>
                                    </div>
                                    <div id="yorum" class="tab-pane">
                                        <div class="product-tab">
                                            @auth
                                                <div class="product-reviews">
                                                    <h4 class="title">Yorum Ekle</h4>
                                                    <div class="reviews">
                                                        <div class="review">

                                                            <div class="review-title">
                                                                <img src="http://via.placeholder.com/30"
                                                                     class="img-repsonsive" alt="">
                                                                <span
                                                                    class="summary"><strong>{{auth()->user()->name}}</strong></span>
                                                                <span class="date pull-right starSelector"> <span>Yıldız seçin yorum yapın</span>
                                                                 <i class="fa fa-star" style="color: orange"
                                                                    data-value="1" aria-hidden="true"></i>
                                                                 <i class="fa fa-star" data-value="2"
                                                                    aria-hidden="true"></i>
                                                                 <i class="fa fa-star" data-value="3"
                                                                    aria-hidden="true"></i>
                                                                 <i class="fa fa-star" data-value="4"
                                                                    aria-hidden="true"></i>
                                                                 <i class="fa fa-star" data-value="5"
                                                                    aria-hidden="true"></i>
                                                                </span>
                                                                <input type="hidden" name="starCount" value="1">
                                                            </div>
                                                            <div class="text">
                                                                <textarea class="form-control txt txt-review"
                                                                          name="comment" maxlength="750"
                                                                          id="exampleInputReview" rows="4"
                                                                          placeholder="Ürün hakkında fikirlerinizi buraya yaza bilirsiniz"></textarea>
                                                            </div>
                                                            <button id="commentsubmit"
                                                                    class="btn btn-primary btn-upper mt-2">Yorum Yap
                                                            </button>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endauth
                                            <div class="product-reviews">
                                                <div class="reviews" id="reviews">
                                                    <div class="product-reviews">
                                                        <div class="reviews" id="reviews">
                                                            @foreach($comments as $comment)
                                                                <div class="review">
                                                                    <div class="review-title"><span
                                                                            class="summary">{{$comment->user->name}}</span>
                                                                        <span class="summary">
                                                                            @for($i=1;$i <=$comment->rate;$i++)
                                                                                <i class="fa fa-star" style="color: orange"
                                                                                   data-value="1" aria-hidden="true"></i>
                                                                            @endfor
                                                                        </span>
                                                                        <span class="date pull-right"><i class="fa fa-calendar"></i>
                                                                            <span>{{ date('d.M.Y',strtotime($comment->created_at)) }}</span></span>
                                                                    </div>
                                                                    <div class="text">{{$comment->comment}}</div>
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
                    </div>
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">Benzer Himetler</h3>
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
                    </section>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <script>

        document.addEventListener("DOMContentLoaded", function () {

            imageZoom("myimage", "myresult");

        });


    </script>
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
            $.post('{{route('scrollcatservices')}}',{page:mypage,category:{{$category->category}},_token:'{{csrf_token()}}'},function (data) {
                if (data.length == 0){
                    $('#loaderdiv').text('Bu istek sonucunda yüklenecek başka ürün bulunamadı')
                }else{
                    $('#productscontnetdiv').append(data);
                    $('#loader_giph').hide();

                }
            })
        }

        function imageZoom(imgID, resultID) {
            var img, lens, result, cx, cy;
            img = document.getElementById(imgID);
            result = document.getElementById(resultID);
            /*create lens:*/
            lens = document.createElement("DIV");
            lens.setAttribute("class", "img-zoom-lens");
            /*insert lens:*/
            img.parentElement.insertBefore(lens, img);
            /*calculate the ratio between result DIV and lens:*/
            cx = result.offsetWidth / lens.offsetWidth;
            cy = result.offsetHeight / lens.offsetHeight;
            /*set background properties for the result DIV:*/
            result.style.backgroundImage = "url('" + img.src + "')";
            result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
            /*execute a function when someone moves the cursor over the image, or the lens:*/
            lens.addEventListener("mousemove", moveLens);
            img.addEventListener("mousemove", moveLens);
            /*and also for touch screens:*/
            lens.addEventListener("touchmove", moveLens);
            img.addEventListener("touchmove", moveLens);

            function moveLens(e) {
                var pos, x, y;
                /*prevent any other actions that may occur when moving over the image:*/
                e.preventDefault();
                /*get the cursor's x and y positions:*/
                pos = getCursorPos(e);
                /*calculate the position of the lens:*/
                x = pos.x - (lens.offsetWidth / 2);
                y = pos.y - (lens.offsetHeight / 2);
                /*prevent the lens from being positioned outside the image:*/
                if (x > img.width - lens.offsetWidth) {
                    x = img.width - lens.offsetWidth;
                }
                if (x < 0) {
                    x = 0;
                }
                if (y > img.height - lens.offsetHeight) {
                    y = img.height - lens.offsetHeight;
                }
                if (y < 0) {
                    y = 0;
                }
                /*set the position of the lens:*/
                lens.style.left = x + "px";
                lens.style.top = y + "px";
                /*display what the lens "sees":*/
                result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
            }

            function getCursorPos(e) {
                var a, x = 0, y = 0;
                e = e || window.event;
                /*get the x and y positions of the image:*/
                a = img.getBoundingClientRect();
                /*calculate the cursor's x and y coordinates, relative to the image:*/
                x = e.pageX - a.left;
                y = e.pageY - a.top;
                /*consider any page scrolling:*/
                x = x - window.pageXOffset;
                y = y - window.pageYOffset;
                return {x: x, y: y};
            }
        }

        @auth
        $('#commentsubmit').click(function () {
            comment = $('textarea[name="comment"]').val();
            rate = $('input[name="starCount"]').val();

            $.ajax({
                method: 'POST',
                url: '{{route('servicepostcomment')}}',
                data: {
                    'comment': comment,
                    'serviceid': '{{$service->id}}',
                    'rate': rate,
                    '_token': '{{csrf_token()}}'
                }, success: function (data) {
                    if (data.errors) {
                        toastr.error(data.errors.message);
                    } else {
                        toastr.success(data.message);
                        // debugger;
                        var ratestar = '';
                        for (var i = 1; i <= data.rate; i++) {
                            ratestar += '  <i class="fa fa-star" style="color: orange"  aria-hidden="true"></i>'
                        }
                        console.log(ratestar)
                        newcomment = '<div class="review">\n' +
                            '    <div class="review-title"><span class="summary">{{auth()->user()->name}}</span>\n' +
                            '<span class="summary">' + ratestar + '</span>' +
                            '   <span class="date pull-right"><i class="fa fa-calendar"></i><span>' + data.comment.date + '</span></span>\n' +
                            '    </div>\n' +
                            '    <div class="text">' + data.comment.comment + '</div>\n' +
                            '</div>';


                        $('#reviews').prepend(newcomment)
                    }

                }
            })
        })

        $('.starSelector i').click(function () {
            var star = $(this).attr(`data-value`);
            var intStar = parseInt(star);
            $('input[name="starCount"]').val(intStar);
            $(".fa-star").each(function () {
                var starC = $(this).attr(`data-value`);
                var intStarC = parseInt(starC);
                if (intStarC <= intStar) {
                    this.style.color = "orange";
                } else {
                    this.style.color = "gray";
                }
            });
        })
        @endauth


    </script>
@endsection
