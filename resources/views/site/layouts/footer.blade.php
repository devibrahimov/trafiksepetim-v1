<footer id="footer" class="footer color-bg mt-5">
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-3 col-md-2">
                    <div class="module-heading">
                        <h4 class="module-title">trafiksepetim.com</h4>
                    </div>
                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="{{route('about')}}" title="Trafik Sepetim Firma Hakkında">Hakkımızda</a></li>
                            <li><a href="#" title="Trafik Sepetim Kurumsal">Kurumsal</a></li>
                            <li><a href="{{route('contact')}}" title="Trafik Sepetim İletişim">İletişim</a></li>
                            <li><a href="{{route('malls')}}" title="Trafik Sepetim Mağazalar">Mağazalar</a></li>
                            <li><a href="#" title="Trafik Sepetim Reklam">Reklam</a></li>
                            <li><a href="{{route('sss')}}" title="Trafik Sepetim Sıkca Sorulan Sorular">Sıkca Sorulan Sorular</a></li>
                            <li><a href="#" title="Trafik Sepetim Gizlilik Politikası">Gizlilik Politikası</a></li>
                            <li><a href="#" title="Trafik Sepetim Hüküm ve Koşullar">Hüküm ve Koşullar</a></li>
                        </ul>
                    </div>
                    <div class="module-heading  " style="margin-top: 4rem;">
                        <h4 class="module-title mt-5">Hizmet Veren</h4>
                    </div>
                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="TrafikSepetim Hizmet Veren Ol">Hizmet Veren Ol</a></li>
                            <li><a href="#" title="TrafikSepetim Hizmet Veren Girişi">Hizmet Veren Girişi</a></li>
                            <li><a href="#" title="TrafikSepetim Hizmet Veren Rehberi">Hizmet Veren Rehberi</a></li>
                            <li><a href="#" title="TrafikSepetim Hizmet Veren  Ödeme Seçenekleri">Hizmet Veren  Ödeme Seçenekleri</a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-xs-6 col-sm-3 col-md-2">
                    <div class="module-heading">
                        <h4 class="module-title">Mağazalar</h4>
                    </div>
                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="Ücretsiz Mağaza Aç">Ücretsiz Mağaza Aç</a></li>
                            <li><a href="#" title="TrafikSepetim Mağaza Girişi">Mağaza Girişi</a></li>
                            <li><a href="#" title="TrafikSepetim Yeni Üye Rehberi">Yeni Mağaza Rehberi</a></li>
                            <li><a href="#" title="TrafikSepetim Mağaza Puanı Hesaplaması">Mağaza Puanı Hesaplaması</a></li>
                        </ul>
                    </div>

                    <div class="module-heading mt-5" style="margin-top: 4rem;" >
                        <h4 class="module-title mt-5">Müşteriler</h4>
                    </div>
                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="Hakkımızda">Kayıt Ol</a></li>
                            <li><a href="#" title="TrafikSepetim Giriş Yap">Giriş Yap</a></li>
                            <li><a href="#" title="TrafikSepetim Yardım">Yardım</a></li>
                            <li><a href="#" title="TrafikSepetim Yeni Üye Rehberi">Yeni Üye Rehberi</a></li>
                            <li><a href="#" title="TrafikSepetim Ödeme Seçenekleri">Ödeme Seçenekleri</a></li>
                            <li><a href="#" title="TrafikSepetim İptal, İade, Değişim">İptal, İade, Değişim</a></li>
                            <li><a href="#" title="TrafikSepetim Site Haritası">Site Haritası</a></li>
                            <li><a href="#" title="TrafikSepetim Site Arşivi">Site Arşivi</a></li>
                        </ul>
                    </div>
                </div>
                @php use App\Model\Category;
                     use App\Model\ServiceCategory;
                     use \Illuminate\Support\Str ;
                    $mallcats = Category::all();
                    $servicecats = ServiceCategory::all();
                @endphp
                <div class="col-xs-6 col-sm-3 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Kategoriler</h4>
                    </div>
                    <div class="module-body">
                        <ul class='list-unstyled'>
                            @foreach($mallcats as $cat)
                                <li class="first"><a title="TrafikSepetim {{$cat->name}}" href="{{route('category_products',   Str::slug($cat->name).'-C'.$cat->id   )}}">{{$cat->name}}</a></li>
                            @endforeach

                            @foreach($servicecats as $cat)
                                @if($cat->parent_id == 0 )
                                    <li class="first"><a href="{{route('service_products',$cat->id.'-hizmet-'.Str::slug($cat->name) )}}" title="Üyelik"> {{$cat->name}}</a></li>
                                @endif
                            @endforeach

                        </ul>
                    </div>
                </div>

                <div class="col-xs-6 col-sm-3 col-md-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="module-heading">
                                <h4 class="module-title">Sosial Medyada</h4>
                            </div>
                            <div class="social">
                                <ul class="link">
                                    <li class="fb pull-left">
                                        <a target="_blank" rel="nofollow" href="#" title="Facebook"></a>
                                    </li>
                                    <li class="tw pull-left">
                                        <a target="_blank" rel="nofollow" href="#" title="Twitter"></a>
                                    </li>
                                    <li class="googleplus pull-left">
                                        <a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a>
                                    </li>
                                    <li class="linkedin pull-left">
                                        <a target="_blank" rel="nofollow" href="#" title="Linkedin"></a>
                                    </li>
                                    <li class="youtube pull-left">
                                        <a target="_blank" rel="nofollow" href="#" title="Youtube"></a>
                                    </li>
                                </ul>
                            </div>
                            <p style="padding-top: 20px;color: #a0a0a0"> Sağ Taraftakı QR Kodu Okudarak TRAFİKSEPETİM uygulamasını Play Store dan rahatlıkla indire bilirsiniz</p>

                        </div>
                        <div class="col-md-6">
                            <img src="{{env('APP_URL')}}/site/img/https_trafiksepetim_com_public.png" width="150px" alt="">
                        </div>
                    </div>

                    <div class="module-heading">
                        <h4 class="module-title"  style="margin-top: 4rem;">Trafik Sepetim Haritada</h4>
                    </div>
                    <div class="module-body" style="margin-top: 1rem ;margin-bottom: 3rem ;border-top:solid 1px #a0a0a0;">

                      <div class="row"  >

                                <ul class='col-md-3 list-unstyled'>
                                    <li class="first"><a href="#" title="Konya">Konya</a></li>
                                    <li><a href="#" title="TrafikSepetim Giriş Yap">Bursa</a></li>
                                    <li><a href="#" title="TrafikSepetim Yardım">İsparta</a></li>
                                </ul>
                                <ul class='col-md-3 list-unstyled '>
                                    <li class="first"><a href="#" title="Hakkımızda">İstanbul</a></li>
                                    <li><a href="#" title="TrafikSepetim Yardım">Adana</a></li>
                                    <li><a href="#" title="TrafikSepetim Giriş Yap">Kayseri</a></li>
                                </ul>
                                <ul class='col-md-3 list-unstyled '>
                                    <li class="first"><a href="#" title="Hakkımızda">Balıkesir</a></li>
                                    <li><a href="#" title="TrafikSepetim Yardım">Hakkari</a></li>
                                    <li><a href="#" title="TrafikSepetim Giriş Yap">Sivas</a></li>
                                </ul>
                                <ul class='col-md-3 list-unstyled '>
                                    <li class="first"><a href="#" title="Hakkımızda">Manisa</a></li>
                                    <li><a href="#" title="TrafikSepetim Yardım">Edirne</a></li>
                                    <li><a href="#" title="TrafikSepetim Giriş Yap">Trabzon</a></li>
                                </ul>

                      </div>
                    </div>

                    <object type="image/svg+xml" data="{{env('APP_URL')}}/site/Turkeymappp.svg"></object>

                </div>
            </div>
        </div>
    </div>
    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-padding social">
                <span>2021 - TRAFİKSEPETİ.COM <sup>®</sup></span>
            </div>

            <div class="col-xs-12 col-sm-6 no-padding">
                <div class="clearfix payment-methods">
                    <ul>
                        <li><img src="{{env('APP_URL')}}/site/images/payments/1.png" alt=""></li>
                        <li><img src="{{env('APP_URL')}}/site/images/payments/2.png" alt=""></li>
                        <li><img src="{{env('APP_URL')}}/site/images/payments/3.png" alt=""></li>
                        <li><img src="{{env('APP_URL')}}/site/images/payments/4.png" alt=""></li>
                        <li><img src="{{env('APP_URL')}}/site/images/payments/5.png" alt=""></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</footer>
<script src="{{env('APP_URL')}}/site/js/jquery-1.11.1.min.js"></script>
<script src="{{env('APP_URL')}}/assets/toastr-notification/toastr.min.js"  type="text/javascript" ></script>
<script src="{{env('APP_URL')}}/site/js/bootstrap.min.js"></script>
<script src="{{env('APP_URL')}}/assets/js/bootstrap-multiselect.js"></script>
<script src="{{env('APP_URL')}}/ckeditor/ckeditor.js"></script>
<script src="{{env('APP_URL')}}/site/js/bootstrap-hover-dropdown.min.js"></script>
<script src="{{env('APP_URL')}}/site/js/owl.carousel.min.js"></script>
<script src="{{env('APP_URL')}}/site/js/echo.min.js"></script>
<script src="{{env('APP_URL')}}/site/js/jquery.easing-1.3.min.js"></script>
<script src="{{env('APP_URL')}}/site/js/bootstrap-slider.min.js"></script>
<script src="{{env('APP_URL')}}/site/js/jquery.rateit.min.js"></script>
<script src="{{env('APP_URL')}}/site/js/lightbox.min.js"  type="text/javascript" ></script>
<script src="{{env('APP_URL')}}/site/js/bootstrap-select.min.js"></script>
<script src="{{env('APP_URL')}}/site/js/wow.min.js"></script>
@yield('statistics')
<script src="{{env('APP_URL')}}/site/js/scripts.js"></script>
@yield('js')
<script>

    $(document).ready(function () {

    $(document).on('click',".addtocart",function (){

            @guest
                toastr.warning('Sepete Ürün ekleye bilmek için önce kayıt olmanız gerekmektedir')
            @endguest
            @auth
            productid = $(this).attr("data-productId");

            productdata = productid.split("|")

            productid = productdata[0]
            productname = productdata[1]
            productimage = productdata[2]
            productprice = productdata[3]
            productquantity = productdata[4]
            marketid =       productdata[5]

            $.ajax({
                method:'post',
                url : '{{route("addtocart")}}',
                data : {
                    'productid' : productid,
                    'productname' : productname,
                    'marketid'     :marketid,
                    'productimage' : productimage,
                    'productprice' : productprice,
                    'productquantity' : productquantity,
                    '_token':"{{csrf_token()}}"
                },success:function (data){

                    data = JSON.parse(data)
                    //sepetteki urun sayini gostersin
                    $('#basketproductcount').text(data.product.length)

                    totalpricecart = data.totalPrice.toFixed(2)+'₺';
                    $('#cartotalpriceshow').text(totalpricecart)
                    $('#cartotalprice').text(totalpricecart)
                    $('#cartotalprice').attr('data-value',totalpricecart)
                   // console.log(data.totalPrice)
                    $('#cartproducts').html("")

                    for(i=0;i<data.product.length;i++){


                            carthtml =  '<div class="product" style="border-bottom: #666666">\n' +
                                    '<div class="row product-micro-row">\n' +
                                    '  <div class="col col-xs-5">\n' +
                                    '          <div class="image">\n' +
                                    '              <a href="#">\n' +
                                    '                  <img src="{{env('APP_URL')}}/storage/uploads/thumbnail/malls/'+data.product[i].market_id+'/productimages/small/'+data.product[i].image+'" title="'+data.product[i].name+'" alt="'+data.product[i].name+'">\n' +
                                    '              </a>\n' +
                                    '          </div>\n' +
                                    '  </div>\n' +
                                    '  <div class="col2 col-xs-7">\n' +
                                    '      <div class="product-info">\n' +
                                    '          <div class="product-price"> <span class="productname">'+data.product[i].name.substr(0,17)+'...</span> </div>\n' +
                                    '          <div class="product-price"> <span class="cartpriceshow" data-value="'+data.product[i].price+'"> '+data.product[i].price+'</span> ₺ x <span data-value="'+data.product[i].quantity+'" class="cartquantityshow">'+data.product[i].quantity+' </span> </div>\n' +
                                    '          <i class="fa fa-trash sepetSideBarTrash" id="'+data.product[i].id+'"' +
                                    '  data-productprice="'+data.product[i].price+'" data-productqty="'+data.product[i].quantity+'"></i>\n' +
                                    '      </div>\n' +
                                    '  </div>\n' +
                                    '</div>\n' +
                                    '</div>';

                        $('#cartproducts').append(carthtml)};


                }

        });
    @endauth
        });

    $(document).on('click' ,'.sepetSideBarTrash', function(){
            // debugger;
            id = $(this).attr('id');
            productprice = $('#'+id).attr('data-productprice')
            productqty   = $('#'+id).attr('data-productqty')

                $.ajax({
                     method: 'post',
                     url:'{{route('removefromcart')}}',
                    data:{
                        id :id,
                        _token:'{{csrf_token()}}'
                    },
                    success:function (data) {

                        $('#'+id).parent().parent().parent().parent().remove();
                        $.each($('#cartproducts').children(),function(){
                            // console.log(productprice)
                            // console.log(productqty)
                        })
                        totalpricecart= $('#cartotalprice').attr('data-value');
                        totalpricecart=  parseFloat(totalpricecart) - (parseFloat(productprice)*parseFloat(productqty));

                        $('#cartotalpriceshow').text(totalpricecart.toFixed(2))
                        $('#cartotalprice').attr('data-value',totalpricecart.toFixed(2))
                        $('#cartotalprice').text(totalpricecart.toFixed(2))
                        basketproductcount =$('#basketproductcount').text() - 1 ;
                        $('#basketproductcount').text(basketproductcount)

                        // $(".cartrowTrash").click(function() {
                        //     id =  $(this).attr('data-id');
                        //     $('#'+id).trigger('click');
                        //     $(this).parent().parent().remove();
                        // });

                        $('.cartrowTrash[data-id*="'+id+'"]').trigger('click');
                     }//end success
                })
        })

    $(document).on('click','.addwishlist' ,function () {
        @guest
        toastr.info('Ürünü beğendiklerinize ekleye bilmeniz için önce kayıt olmanız gerekmektedir')
        @endguest
        @auth
        var productid = $(this).attr('data-id');

        $.ajax({
            method : 'POST',
            url : '{{route('ajaxpostwishlist')}}',
            data : {
                'productid': productid,
                '_token' : '{{csrf_token()}}'
            },
            success :function(data) {
                if(data.alerttype == 'info'){
                    toastr.info( data.message);
                }
                if(data.alerttype == 'success'){
                    toastr.success(data.message);
                }
            }
        })
        @endauth
    });
    });
    @if( session()->has('message') )

     var type = "{{session()->get('alert-type','info')}}";

     switch (type) {
        case "success":
            toastr.success("{{session()->get('message')}}");
            break;
        case "info":
            toastr.info("{{session()->get('message')}}");
            break;
        case "warning":
            toastr.warning("{{session()->get('message')}}");
            break;
        case "error":
            toastr.error("{{session()->get('message')}}");
            break;
    }

    @endif

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    console.log( '{{$error}}' );
        toastr.error("HATA MESAJI ! {{$error}}");
    @endforeach
    @endif

</script>

</body>

</html>

