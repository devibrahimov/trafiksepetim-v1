@extends('site.index')

@section('css')
    <link rel="stylesheet" href="/ckeditor/contents.css">
    <link rel="stylesheet" href="/site/dropzone-5.7.0/dist/dropzone.css">
<style>
    .blog-page .blog-post span{
        padding-right: 0;
    }
    .blog-page .blog-post a {
        margin-top: 0;
    }
.recursiveCategoryContent{
    border: 1px solid #cecece;
}
    .img-preview{
        width: 100%;
        height: 250px;
        border: initial;
    background-image: url("/site/img/image-placeholder.png");
    }

    .anglerightfloatright{
        float: right;
    }
</style>
@endsection
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
        <div class="row">
            <div class="col-md-12 magazaNav">
                @include('site.pages.market.partial.marketnavbar')
            </div>
        </div>
        <div class="container">
            <div class="row">

                <div class="blog-page">

                    <div class="col-md-12 mt-5 mb-2">
                        <div class="blog-post">
                            <div class="row mb-5">
                                <div class="col-xs-12 pull-left">
                                    <h1>Ürün Kategorisini Seçiniz</h1>
                                </div>
                            </div>
                            <div class="row mt-5 recursiveCategoryContent">

                                <div class="col-md-4">
                                    <div class="recursiveCategoryHolder" id="RCparent">
                                        <ul class="recursiveCategoryParent" id="category">
                                            @foreach($categories as $category)
                                                <li class="parentEvent" id="{{$category->id}}" >{{$category->name}}   @if($category->has_child == 1 ) <i class="fa fa-angle-right anglerightfloatright" ></i> @endif</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="recursiveCategoryHolder" id="RCsubParent">

                                        <ul class="recursiveCategoryParent"  id="subcategory">
                                            @foreach($subcategories as $category)
                                                <li style="display: none" class="parentChild subcategory"
                                                    data-parentid="{{$category->parent_id}}"  data-id="{{$category->id}}">{{$category->name}} @if($category->has_child == 1 ) <i class="fa fa-angle-right anglerightfloatright" ></i> @endif </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="recursiveCategoryHolder" id="RCchild">
                                        <ul class="recursiveCategoryParent"  id="secondsubcategory">
                                            @foreach($secondsubcategories as $category)
                                                <li class="secondsubcategory"  data-id="{{$category->id}}" data-subparent="{{$category->parent_id}}">{{$category->name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="outer-bottom-xs blog-post outer-top-xs">
                            <div class="row mb-5">
                                <div class="col-xs-12 pull-left">
                                    <h1>Ürün Bilgilerini Giriniz</h1>
                                </div>
                            </div>
                            <div class="row mt-5 recursiveCategoryContent">
                                <form action="{{route('market-create-product')}}" method="post" id="addproductform" name="addproductform" enctype="multipart/form-data">
                                    <input name="category" style="display: none" >
                                    <input name="subcategory"   style="display: none">
                                    <input name="secondsubcategory"  style="display: none">

                                    <div class="col-md-12 mb-5">

                                        <div class="row mt-3 ">

                                            <div class="col-md-3" >
                                                <label for="proimg1" class="img-preview">

                                                    <img src="site/img/image-placeholder.png" id="img_url1" class="img-preview" alt="your image">
                                                </label>
                                                <span>Kapak Fotoğrafı Seçiniz</span>
                                                <input type="file" id="proimg1" name="proimg[]" onChange="img_pathUrl1(this);" style="display:none;"  >
                                            </div>

                                            <div class="col-md-3" >
                                                <label for="proimg2" class=" img-preview">
                                                      <img src="site/img/image-placeholder.png" id="img_url2" class="img-preview" alt="your image">
                                                </label>
                                                <span>İkinci Fotoğraf Seçiniz</span>
                                                <input type="file" id="proimg2" name="proimg[]" onChange="img_pathUrl2(this);" style="display:none;"  >
                                            </div>
                                            <div class="col-md-3" >
                                                <label for="proimg3" class=" img-preview">
                                                      <img src="site/img/image-placeholder.png" id="img_url3" class="img-preview" alt="your image">
                                                </label>
                                                <span>Üçüncü Fotoğraf Seçiniz </span>
                                                <input type="file" id="proimg3" name="proimg[]" onChange="img_pathUrl3(this);" style="display:none;"    >
                                            </div>

                                            <div class="col-md-3">
                                                <label for="proimg4" class=" img-preview" >
                                                      <img src="site/img/image-placeholder.png" id="img_url4" class="img-preview" alt="your image">
                                                </label>
                                                <span>Dördüncü Fotoğraf Seçiniz</span>
                                                <input type="file" id="proimg4" name="proimg[]" onChange="img_pathUrl4(this);"style="display:none;"   >
                                            </div>
                                        </div>

                                    </div>
{{--################################################################################################--}}
                                    {{--ARAC MARKASI--}}
                                    <div class="col-md-6 mb-10 form-group">
                                        <label class="info-title" >Araç Markası :</label>
                                        <select name="car" id="cars" class="form-control unicase-form-control text-input" >
                                            <option selected disabled>Seçiniz</option>
                                            @foreach($cars as $car)
                                                <option value="{{$car->id}}">{{$car->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--ARAC MARKASI--}}

                                    {{--ARAC Serisi--}}
                                    <div class="col-md-6 mb-10 form-group">
                                        <label class="info-title" >Araç Serisi :</label>
                                        <select name="carmodel" id="carmodels" class="form-control unicase-form-control text-input" >
                                            <option selected disabled>Seçiniz</option>
                                        </select>
                                    </div>

                                    {{--ARAC Serisi--}}

                                    <div class="col-md-6 form-group">
                                        <label class="info-title"  for="input">Ürün Adı</label>
                                        <input class="form-control unicase-form-control text-input" name="product_name" required type="text" placeholder="">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="info-title"  for="input">Kısa Açıklama</label>
                                        <input class="form-control unicase-form-control text-input" name="meta_desc" required type="text" placeholder="">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="info-title"  for="input">Fiyat</label>
                                        <input class="form-control unicase-form-control text-input" name="price" step="0.01" required type="number" placeholder="">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="info-title"  for="input">İndirimli Fiyat</label>
                                        <input class="form-control unicase-form-control text-input" name="sale_price" step="0.01"   type="number" placeholder="">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="info-title"  for="input">Stok Sayısı</label>
                                        <input class="form-control unicase-form-control text-input" name="stock" required type="number" placeholder="">
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="input">Ürün OEM Kodu </label>
                                        <input class="form-control unicase-form-control text-input" name="oem_code" required   type="text" placeholder="">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="info-title"  for="input">Ürün Kodu</label>
                                        <input class="form-control unicase-form-control text-input" name="product_code" required type="text" placeholder="">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="info-title" >Ürün Garantisi  </label> <br>
                                        <input class="form-control unicase-form-control text-input" name="warranty" type="number" placeholder="">

                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="info-title" >Ürün Kampaniyası Varmı?  </label> <br>
                                        <select name="kampanya" class="form-control unicase-form-control text-input" id="kampanya">
                                            <option value="evet">Evet</option>
                                            <option value="hayir">Hayır</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8 form-group" id="kampanyacontentdiv">
                                        <label class="info-title" >Ürün Kampaniyası İçeriği</label> <br>
                                        <input type="text" name="kampanyacontent" class="form-control unicase-form-control text-input">
                                    </div>



                                    {{--                                    <div class="col-md-4">--}}
{{--                                        <label for="input">Kargo Firmaları</label>--}}
{{--                                        <select name="kargo" class="customFormInput" id="">--}}
{{--                                            <option value="aras">Aras</option>--}}
{{--                                            <option value="yurtiçi">Yurtiçi</option>--}}
{{--                                            <option value="ptt">Ptt</option>--}}
{{--                                            <option value="sürat">Sürat</option>--}}
{{--                                            <option value="mng">Mng</option>--}}
{{--                                            <option value="ups">Ups</option>--}}
{{--                                            <option value="dhl">Dhl</option>--}}
{{--                                            <option value="fillo">Fillo</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <label for="input">Kargo Ücreti</label>--}}
{{--                                        <input class="customFormInput" required type="number" placeholder="">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <label for="input">Teslimat Süresi</label>--}}
{{--                                        <input class="customFormInput" required type="text" placeholder="">--}}
{{--                                    </div>--}}

                                    <div class="col-md-12">
                                        <label for="input" class="d-block">Açıklama</label>
                                        <textarea name="description" class="description" id="description"></textarea>
                                    </div>

                                    @csrf
                                    <div class="col-md-12 mt-5 mb-5">
                                        <div class="row mb-5">
                                            <div class="col-md-6 mb-10">
                                                <h4> <b>Özellik</b>  </h4>
                                            </div>
                                            <div class="col-md-6 mb-10">
                                                <h4> <b>Değer</b>  </h4>
                                            </div>
                                        </div>
                                        <div  class="row" id="teknik_inputs">


                                            {{--Ürün Markası--}}
                                            <div class="col-md-6 mb-3">
                                                <strong>Ürün Markası :</strong>
                                                <input name="teknik_key[]" class="customFormInput"  value="Ürün Markası"  type="hidden">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <input name="teknik_value[]" class="form-control"    type="text">
                                            </div>
                                            {{--Ürün Markası--}}



                                            {{-- Durumu--}}
                                            <div class="col-md-6 mb-3">
                                                <strong>Durumu :</strong>
                                                <input name="teknik_key[]" class="customFormInput"  value="Durumu"  type="hidden">

                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <select name="teknik_value[]" class="form-control" >
                                                    <option selected disabled>Seçiniz</option>
                                                    <option value="Sıfır">Sıfır</option>
                                                    <option value="İkinci El">İkinci El</option>
                                                </select>
                                            </div>
                                            {{--Durumu--}}

                                            {{-- KEY Value--}}
                                            <div class="col-md-6 mb-3">
                                                <input name="teknik_key[]" class="form-control"   type="text">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <input  name="teknik_value[]" class="form-control"   type="text"  >
                                            </div>
                                            {{-- KEY Value--}}

                                        </div>
                                        <small>Özellik kullanım örneği: Özellik Adı : Ürün Markası, Değer : XXXX </small>
                                         <div class="row">
                                            <div class="col-md-6 mt-4 ">
                                                <button type="button" id="addteknik" class="btn btn-block theme-btn--dark1 btn--md"> <i class="fa fa-plus"></i> Özellik Ekle</button>
                                            </div>
                                            <div class="col-md-6 mt-4 ">
                                                <button type="submit" class="btn btn-primary" style="width: 100%"><i class="fa fa-plus"></i> Ürün Kaydet</button>
                                            </div>
                                         </div>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="site/dropzone-5.7.0/dist/min/dropzone.min.js"></script>


    <script>
        CKEDITOR.replace( 'description' );

        function img_pathUrl1(input){
            $('#img_url1')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
        }
        function img_pathUrl2(input){
            $('#img_url2')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
        }
        function img_pathUrl3(input){
            $('#img_url3')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
        }
        function img_pathUrl4(input){
            $('#img_url4')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
        }


        $('.showCheckoutHistory').change(function() {
            if ($(this).prop('checked')) {
                dataprid = $(this).attr('data-productid');
                $.ajax({
                    'method'    : 'post',
                    'url'       : '{{route('productstatus')}}',
                    data:{
                        'productid' :dataprid,
                        'status'    : 1,
                        '_token'    : '{{csrf_token()}}'
                    },
                    success: function (data) {

                    }
                })
            }
            else {
                dataprid = $(this).attr('data-productid');

                $.ajax({
                    'method'    : 'post',
                    'url'       : '{{route('productstatus')}}',
                    data:{
                        'productid' : dataprid,
                        'status'    :   0,
                        '_token'    : '{{csrf_token()}}'
                    },
                    success: function (data) {

                    }
                })
            }
        });
        $('#RCparent ul li').click(function() {
            $('#RCparent ul li.active').removeClass('active');
            var a =$(this).attr('id');

            $('.subcategory').css('display', 'none');
            $('.secondsubcategory').css('display', 'none');
            $('.subcategory').each(function(){

                if(a ==$(this).data('parentid')){

                    $('#RCsubParent').css('display', 'block');
                    $(this).css('display', 'block');
                }

            })

            $('#RCsubParent ul li').attr('data-parentid');
            $(this).addClass('active');
            $('#RCsubParent').css('display', 'block');
            $('input[name=category]').val(a);
            $('input[name=subcategory]').val('')
            $('input[name=secondsubcategory]').val('')
        });
        $('#RCsubParent ul li').click(function() {
            $('#RCsubParent ul li.active').removeClass('active');
            $(this).addClass('active');
            $('#RCchild').css('display', 'block');
            $('.secondsubcategory').css('display', 'none');
            // console.log($(this).data('id'))
            a = $(this).data('id');
            $('.secondsubcategory').each(function(){

                if(a == $(this).data('subparent')){
                    $(this).css('display', 'block');
                }
               // console.log($(this).data('subparent'))
            })

            $('input[name=subcategory]').val(a)
            $('input[name=secondsubcategory]').val('')
        });
        $('#RCchild ul li').click(function() {
            $('#RCchild ul li.active').removeClass('active');
            $(this).addClass('active');
            a = $(this).data('id');
            $('input[name=secondsubcategory]').val(a)
        });
        $("#addteknik").click(function() {

                var inputs =
                    '    <div class="col-md-6 mt-3">\n' +
                    '        <input name="teknik_key[]"  class="form-control"  type="text"> \n' +
                    '    </div>\n' +
                    '    <div class="col-md-6 mt-3">\n' +
                    '        <input  name="teknik_value[]" class="form-control"   type="text">\n' +
                    '    </div>';
                $('#teknik_inputs').append(inputs);

                });
        $('#cars').on('change', function () {
            var carid = $(this).find(":selected").val();

            $.ajax({ /* AJAX REQUEST */
                type: 'post',
                url: "{{ route('car_models') }}",
                data: {
                    'carid': carid,
                    "_token": "{{ csrf_token() }}"
                },
                success: function (data) {
                    $('#carmodels').html(data);
                }
            });


        });


    </script>
@endsection
