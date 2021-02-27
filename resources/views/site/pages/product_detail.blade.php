@extends('site.index')
@php
    use \App\Model\Category as Category ;
    use \App\Model\SubCategories as SubCategories;
    use \App\Model\SubSecondCategories as SubSecondCategories;

    $image = json_decode($product->images);
$img = $image->cover; @endphp

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

    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product'>
                <div class='col-md-3 sidebar'>
                    {{--                    <div class="sidebar-module-container mb-5">--}}
                    {{--                        <div class="sidebar-widget hot-deals outer-top-no">--}}
                    {{--                            <div>--}}
                    {{--                                <img src="/site/img/profil.jpg" width="35px" alt="">--}}
                    {{--                                <a href="#">{{\App\Model\Marketgeneral::find($product->market_id)->market_name}}</a>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="mt-1">--}}
                    {{--                                <span> <div class="rating rateit-small"></div></span> <br>--}}
                    {{--                                <span>125 Ürün</span>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    @include('site.partials.leftbar')
                </div>

                <div class='col-md-9'>
                    <div class="breadcrumb">
                        <div class="container">
                            <div class="breadcrumb-inner">
                                <ul class="list-inline list-unstyled">
                                    <li><a href="{{route('home')}}">Anasayfa</a></li>
                                    <li><a href="{{route('products')}}">Ürünler</a></li>
                                    <li class='active'>  {{$product->name}} </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="detail-block">
                        <div class="row">
                            <div class='col-sm-6 col-md-5 product-info-block'>
                                <div class="img-zoom-container">
                                    <img id="myimage"
                                         src="{{env('APP_URL')}}/storage/uploads/thumbnail/malls/{{$product->market_id}}/productimages/medium/{{$image->cover}}"
                                         class="img-responsive">
                                    <div id="myresult" class="img-zoom-result"></div>
                                </div>
                                <div class="singleItemGaleryThumbHolder row p-3">
                                    @foreach($image->images as $image)
                                        <div class="col-xs-3 p-2">
                                            <img onclick="document.getElementById('myimage').src = this.getAttribute('src');
                                                 imageZoom('myimage', 'myresult')"
                                                 src="{{env('APP_URL')}}/storage/uploads/thumbnail/malls/{{$product->market_id}}/productimages/medium/{{$image}}"
                                                 class="img-responsive imgChange"
                                                 title="Trafik Sepetim - {{$product->name}}"
                                                 alt="Trafik Sepetim - {{$product->name}}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class='col-sm-6 col-md-7 product-info-block'>
                                <div class="product-info">
                                    <h1 class="name">{{$product->name}} </h1> @if($product->warranty != NULL) <span class="lnk"> {{$product->warranty}} Yıl Garanti </span> @endif
                                    <div class="rating-reviews m-t-10">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class=" rateit-small">
                                                    @php $rate = getproductrate($product->id)  @endphp
                                                    @if(isset($rate->rate) )
                                                        @for($i= 1; $i<=round($rate->rate) ;$i++)
                                                            <i class="fa fa-star" style="color: orange"
                                                               aria-hidden="true"></i>
                                                        @endfor
                                                        @for($i= 1; $i<= 5-round($rate->rate) ;$i++)
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        @endfor
                                                    @endif
                                                </div>
                                                <span> ({{count($comments)}} Oylama)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="stock-container info-container m-t-5">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    @if($product->stock != NULL || $product->stock !=0 )
                                                        <span class="value">Stokta {{$product->stock}}</span>
                                                    @else
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="description-container m-t-20">

                                        {{$product->meta_desc}}

                                    </div>
                                    <div class="price-container info-container m-t-20">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="price-box">
                                                    @if($product->sale_price != $product->price)
                                                        <span class="price" id="f{{$product->id}}"
                                                              data-value="{{$product->sale_price}}">{{number_format($product->sale_price, 2, ',', '.')}}₺</span>
                                                        <span class="price-strike">{{number_format($product->price, 2, ',', '.')}}₺</span>
                                                    @endif
                                                    @if($product->sale_price == $product->price)
                                                        <span class="price" id="f{{$product->id}}"
                                                              data-value="{{$product->price}}">{{number_format($product->price, 2, ',', '.')}}₺</span>
                                                    @endif

                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="favorite-button m-t-10">
                                                    <button class="btn btn-primary addwishlist" data-toggle="tooltip"
                                                            data-id="{{$product->id}}" data-placement="right" title="Beğen" href="#">
                                                        <i class="fa fa-heart"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quantity-container info-container">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                Adet :
                                            </div>
                                            <div class="col-xs-5 productDetailQ mb-2">
                                                <button data-id="{{$product->id}}" class="quantyR"><i
                                                            class="fa fa-minus" aria-hidden="true"></i></button>
                                                @if($product->sale_price !=NULL)
                                                    <input data-id="{{$product->id}}"
                                                           data-value='{{$product->sale_price}}' class="changeFn"
                                                           style="position: relative;" type="text"
                                                           id="productquantityid{{$product->id}}" value="1">
                                                @endif
                                                @if($product->sale_price == NULL)
                                                    <input data-id="{{$product->id}}" data-value='{{$product->price}}'
                                                           class="changeFn" style="position: relative;" type="text"
                                                           id="productquantityid{{$product->id}}" value="1">
                                                @endif
                                                <button data-id="{{$product->id}}" class="quantyA"><i class="fa fa-plus"
                                                                                                      aria-hidden="true"></i>
                                                </button>
                                            </div>
                                            <div class="col-xs-4">
                                                Tutar :
                                                @if($product->sale_price !=NULL)
                                                    <span class="" id="totalC" data-value='{{$product->sale_price}}'> {{$product->sale_price}}₺</span>
                                                @endif
                                                @if($product->sale_price ==NULL)
                                                    <span class="" id="totalC" data-value="{{$product->price}}"> {{$product->price}}₺</span>
                                                @endif
                                            </div>
                                            <div class="col-sm-12 mt-5">
                                                <button class="btn btn-primary addtocartproduct"
                                                        data-productId="{{$product->id}}|{{$product->name}}|{{$img}}|{{$product->sale_price ==NULL?$product->price:$product->sale_price}}|3|{{$product->market_id}}"
                                                        id="sepeteEkle" data-id="1"><i
                                                            class="fa fa-shopping-cart inner-right-vs"></i>Sepete Ekle
                                                </button>
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
                                            @php $category = json_decode($product->category) ; @endphp
                                            <table width="100%" class="m-t-5">
                                                <tr>
                                                    <th>Kategori:</th>
                                                    <td>
                                                        @if(isset($category->category))
                                                            <span><a
                                                                        href="{{route('category_products',   Str::slug( Category::find($category->category)->name).'-C'.$category->category)}}">
                                                                    {{ Category::find($category->category)->name  }} </a></span>
                                                            ,
                                                        @endif
                                                        @if(isset($category->subcategory))
                                                            <span><a
                                                                        href="{{route('category_products', Str::slug(Category::find($category->category)->name).'-C'.$category->category.'/'.Str::slug(SubCategories::find($category->subcategory)->name).'-C'.$category->subcategory) }} ">
                                                                    {{ SubCategories::find($category->subcategory)->name }}</a></span>
                                                            ,
                                                        @endif
                                                        @if(isset($category->secondsubcategory))
                                                            <span><a
                                                                        href="{{route('category_products',Str::slug(Category::find($category->category)->name).'-C'.$category->category.'/'.Str::slug(SubCategories::find($category->subcategory)->name).'-C'.$category->subcategory.'/'.Str::slug(SubSecondCategories::find($category->secondsubcategory)->name).'-C'.$category->secondsubcategory)}}">
                                                                    {{ SubSecondCategories::find($category->secondsubcategory)->name }}
                                                                </a></span>
                                                        @endif                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>OEM Kodu:</th>
                                                    <td><span> {{$product->oem_code}} </span></td>
                                                </tr>
                                                <tr>
                                                    <th>Ürün Kodu:</th>
                                                    <td> {{$product->product_code}}   </td>
                                                </tr>
                                                <tr>
                                                    <th>Araba Modeli:</th>
                                                    <td><span>BMW</span> , <span>E class</span></td>
                                                </tr>
                                                <tr aria-colspan="2">
                                                    <th>Ürün Teknik bilgileri</th>
                                                    <td></td>
                                                </tr>
                                                @php $tecniques = json_decode($product->tecnique) @endphp
                                                @foreach($tecniques as $key => $value)
                                                    <tr>
                                                        <th>{{$key}} :</th>
                                                        <td>{{$value}} </td>
                                                    </tr>
                                                @endforeach
                                            </table>

                                        </div>
                                    </div>

                                    <div id="aciklama" class="tab-pane">
                                        <div class="product-tab">
                                            <p class="text">{!! $product->description !!}</div>
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
                                                                <span class="date pull-right"><i
                                                                            class="fa fa-calendar"></i><span>{{ date('d.M.Y',strtotime($comment->created_at)) }}</span></span>
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
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">benzer ürünler</h3>
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
            $.post('{{route('scrollcategoryproducts')}}',{page:mypage,category:{{$category->category}},_token:'{{csrf_token()}}'},function (data) {
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
                url: '{{route('ajaxpostcomment')}}',
                data: {
                    'comment': comment,
                    'productid': '{{$product->id}}',
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

        $(".addtocartproduct").on('click', function () {

            productid = $(this).attr("data-productId");

            productdata = productid.split("|")

            productid = productdata[0]
            productname = productdata[1]
            productimage = productdata[2]
            productprice = productdata[3]

            marketid = productdata[5]

            sVal = $("#productquantityid" + productid).val();

            productquantity = sVal
            $.ajax({
                method: 'post',
                url: '{{route("addtocart")}}',
                data: {
                    'productid': productid,
                    'productname': productname,
                    'marketid': marketid,
                    'productimage': productimage,
                    'productprice': productprice,
                    'productquantity': productquantity,
                    '_token': "{{csrf_token()}}"
                }, success: function (data) {

                    data = JSON.parse(data)
                    //sepetteki urun sayini gostersin
                    $('#basketproductcount').text(data.product.length)

                    totalpricecart = data.totalPrice.toFixed(2) + '₺';
                    $('#cartotalpriceshow').text(totalpricecart)
                    $('#cartotalprice').text(totalpricecart)
                    $('#cartotalprice').attr('data-value', totalpricecart)
                    // console.log(data.totalPrice)
                    $('#cartproducts').html("")

                    for (i = 0; i < data.product.length; i++) {


                        carthtml = '<div class="product" style="border-bottom: #666666">\n' +
                            '<div class="row product-micro-row">\n' +
                            '  <div class="col col-xs-5">\n' +
                            '          <div class="image">\n' +
                            '              <a href="#">\n' +
                            '                  <img src="/storage/uploads/thumbnail/malls/' + data.product[i].market_id + '/productimages/small/' + data.product[i].image + '" title="' + data.product[i].name + '" alt="' + data.product[i].name + '">\n' +
                            '              </a>\n' +
                            '          </div>\n' +
                            '  </div>\n' +
                            '  <div class="col2 col-xs-7">\n' +
                            '      <div class="product-info">\n' +
                            '          <div class="product-price"> <span class="productname">' + data.product[i].name.substr(0, 17) + '...</span> </div>\n' +
                            '          <div class="product-price"> <span class="cartpriceshow" data-value="' + data.product[i].price + '"> ' + data.product[i].price + '</span> ₺ x <span data-value="' + data.product[i].quantity + '" class="cartquantityshow">' + data.product[i].quantity + ' </span> </div>\n' +
                            '          <i class="fa fa-trash sepetSideBarTrash" id="' + data.product[i].id + '"' +
                            '  data-productprice="' + data.product[i].price + '" data-productqty="' + data.product[i].quantity + '"></i>\n' +
                            '      </div>\n' +
                            '  </div>\n' +
                            '</div>\n' +
                            '</div>';

                        $('#cartproducts').append(carthtml)
                    }
                    ;


                }
            })
        });

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

        $(".quantyR").click(function () {
            id = $(this).attr('data-id');
            sVal = $("#" + 'productquantityid{{$product->id}}').val();
            iNum = parseInt(sVal);
            if (1 < iNum) {
                $("#" + 'productquantityid{{$product->id}}').val(iNum - 1);
                cF = Number($("#f" + id).attr('data-value'));
                iNumF = parseFloat(iNum - 1);
                $("#" + 'productquantityid{{$product->id}}').attr('data-value', (cF * iNumF));
                cT = Number($("#totalC").attr('data-value'));
                totalP = parseFloat(cT - cF);
                $('#totalC').text(totalP.toFixed(2) + "₺");
                $('#totalC').attr('data-value', totalP);
            } else {
                $("#" + 'productquantityid{{$product->id}}').val(1);
            }
        });

        $(".quantyA").click(function () {

            id = $(this).attr('data-id');
            sVal = $("#" + 'productquantityid{{$product->id}}').val();

            iNum = parseInt(sVal);
            $("#" +'productquantityid{{$product->id}}').val(iNum + 1);
            cF = Number($("#f" + id).attr('data-value'));
            iNumF = parseFloat(iNum + 1);
            $("#" + 'productquantityid{{$product->id}}').attr('data-value', (cF * iNumF));
            cT = Number($("#totalC").attr('data-value'));
            totalP = parseFloat(cT + cF);
            $('#totalC').text(totalP.toFixed(2) + "₺");
            $('#totalC').attr('data-value', totalP);
        });

        $(".changeFn").change(function () {
            id = $(this).attr('data-id');
            sVal = $("#" + id).val();
            iNum = parseInt(sVal);
            if (iNum > 0) {
                cF = Number($("#f" + id).attr('data-value'));
                cT = Number($("#totalC").attr('data-value'));
                cTt = Number($(this).attr('data-value'));
                totalCh = parseFloat(cF * iNum);
                totalP = parseFloat(cT + (totalCh - cTt));
                $(this).attr('data-value', totalCh);
                $('#totalC').text(totalP.toFixed(2) + "₺");
                $('#totalC').attr('data-value', totalP);
            } else {
                cF = Number($("#f" + id).attr('data-value'));
                cT = Number($("#totalC").attr('data-value'));
                cTt = Number($(this).attr('data-value'));
                totalCh = parseFloat(cF * 1);
                totalP = parseFloat(cT + (totalCh - cTt));
                $(this).attr('data-value', totalCh);
                $('#totalC').text(totalP.toFixed(2) + "₺");
                $('#totalC').attr('data-value', totalP);
                $(this).val(1);
            }
        });


    </script>
@endsection
