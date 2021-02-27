@extends('site.index')

@section('css')
    <link rel="stylesheet" href="/ckeditor/contents.css">
    <style>
        .blog-page .blog-post span{
            padding-right: 0;
        }
        .blog-page .blog-post a {
            margin-top: 0;
        }



        .img-preview{
            width: 100%;
            height: 250px;
            border: initial;
        }
    </style>
@endsection
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Anasayfa</a></li>
                    <li class='active'>Mağazam</li>
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
                            <div class="row mt-5">
                                <div class="col-xs-12 pull-left">
                                    <h1>Ürün Katgorisini Giriniz</h1>
                                </div>
                            </div>
                            <div class="row mt-5 recursiveCategoryContent">
                                @php $productcategory =json_decode($product->category)  @endphp
                                <div class="col-md-4">
                                    <div class="recursiveCategoryHolder" id="RCparent">
                                        <ul class="recursiveCategoryParent" id="category">
                                            @foreach($categories as $category)
                                                <li class="parentEvent {{$productcategory->category ==$category->id ?'active' : ''}}" id="{{$category->id}}" >{{$category->name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="recursiveCategoryHolder"    {{$productcategory->subcategory != 'NULL' ? 'style= display:block ' : ''}} id="RCsubParent">
                                        <ul class="recursiveCategoryParent"  id="subcategory">
                                            @foreach($subcategories as $category)
                                                <li class="parentChild subcategory {{$productcategory->subcategory == $category->id ?' active  ' : ''}} "
                                                    data-parentid="{{$category->parent_id}}"  data-id="{{$category->id}}">{{$category->name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="recursiveCategoryHolder" id="RCchild" {{$productcategory->secondsubcategory != NULL ? 'style=display:block' : ''}} >
                                        <ul class="recursiveCategoryParent"  id="secondsubcategory">
                                            @foreach($secondsubcategories as $category)

                                                <li class="secondsubcategory {{$productcategory->secondsubcategory == $category->id ?' active  ' : ''}}  "  data-id="{{$category->id}}" data-subparent="{{$category->parent_id}}">{{$category->name}}</li>

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
                                <form action="{{route('market-edit-product',$product->id)}}" method="post"  enctype="multipart/form-data">
                                    <input name="category"  value="{{$productcategory->category}}" style="display: none" >
                                    <input name="subcategory" value="{{$productcategory->subcategory}}"   style="display: none">
                                    <input name="secondsubcategory" value="{{$productcategory->secondsubcategory}}"  style="display: none">
                                    <div class="col-md-12 mb-2">

                                        {{--                                            <div class="col-auto">--}}
                                        {{--                                                <button type="button" onclick="imageuploadbuttonfunction()" class="btn btn-primary cart-btn" style="margin-top:24px;margin-bottom:10px;">Resim Ekle</button>--}}
                                        {{--                                                <input type="file" multiple id="fileUpload" accept="image/*" name="proimg[]" class="custom-file-input" style="display: none;">--}}
                                        {{--                                            </div>--}}
                                        {{--                                            <div class="col-auto p-2 d-flex filePreview">  </div>--}}

                                        <div class="row">
                                            <div class="col-md-12 mb-5">
@php $image = json_decode($product->images) @endphp
                                                <div class="row mt-3 ">

                                                    <div class="col-md-3" >
                                                        <label for="proimg1" class="img-preview">

                                                            <img src="/storage/uploads/thumbnail/malls/{{$product->market_id}}/productimages/small/{{$image->images[0]}}" id="img_url1" class="img-preview" alt="your image">
                                                        </label>
                                                        <span>Kapak Fotoğrafı</span>
                                                        <input type="file" id="proimg1" name="proimg[]" onChange="img_pathUrl1(this);" style="display:none;"  >
                                                    </div>

                                                    <div class="col-md-3" >
                                                        <label for="proimg2" class=" img-preview">
                                                            <img src="/storage/uploads/thumbnail/malls/{{$product->market_id}}/productimages/small/{{$image->images[1]}}" id="img_url2" class="img-preview" alt="your image">
                                                        </label>
                                                        <span>İkinci Fotoğraf</span>
                                                        <input type="file" id="proimg2" name="proimg[]" onChange="img_pathUrl2(this);" style="display:none;"  >
                                                    </div>

                                                    <div class="col-md-3" >
                                                        <label for="proimg3" class=" img-preview">
                                                            <img src="/storage/uploads/thumbnail/malls/{{$product->market_id}}/productimages/small/{{$image->images[2]}}" id="img_url3" class="img-preview" alt="your image">
                                                        </label>
                                                        <span>Üçüncü Fotoğraf </span>
                                                        <input type="file" id="proimg3" name="proimg[]" onChange="img_pathUrl3(this);" style="display:none;"    >
                                                    </div>

                                                    <div class="col-md-3" >
                                                        <label for="proimg4" class=" img-preview" >
                                                            <img src="/storage/uploads/thumbnail/malls/{{$product->market_id}}/productimages/small/{{$image->images[3]}}" id="img_url4" class="img-preview" alt="your image">
                                                        </label>
                                                        <span>Dördüncü Fotoğraf</span>
                                                        <input type="file" id="proimg4" name="proimg[]" onChange="img_pathUrl4(this);"style="display:none;"   >
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                    {{--################################################################################################--}}
                                    {{--ARAC MARKASI--}}
                                    <div class="col-md-6 mb-10">
                                        <label>Araç Markası :</label>
                                        <select name="car" id="cars" class="customFormInput" >

                                            @foreach($cars as $car)
                                                <option {{$product->car_company == $car->id?'selected':''}}   value="{{$car->id}}">{{$car->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{--ARAC MARKASI--}}

                                    {{--ARAC Serisi--}}
                                    <div class="col-md-6 mb-10">
                                        <label>Araç Serisi :</label>
                                        <select name="carmodel" id="carmodels" class="customFormInput" >

                                        </select>
                                    </div>

                                    {{--ARAC Serisi--}}

                                    <div class="col-md-6">
                                        <label for="input">Ürün Adı</label>
                                        <input class="customFormInput" name="product_name" required type="text" value="{{$product->name}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Kısa Açıklama</label>
                                        <input class="customFormInput" name="meta_desc" required type="text" value="{{$product->meta_desc}}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="input">Fiyat</label>
                                        <input class="customFormInput" name="price" required type="text" value="{{$product->price}}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="input">İndirimli Fiyat</label>
                                        <input class="customFormInput" name="sale_price"   type="text " value="{{$product->sale_price}}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="input">Stok Adeti</label>
                                        <input class="customFormInput" name="stock" required type="text" value="{{$product->stock}}">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="input">Ürün OEM Kodu </label>
                                        <input class="customFormInput" name="oem_code" required   type="text" value="{{$product->oem_code}}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="input">Ürün Kodu</label>
                                        <input class="customFormInput" name="product_code" required type="text" value="{{$product->product_code}}">
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
                                        <textarea name="description" class="description" id="description">{!!$product->description!!}</textarea>
                                    </div>

                                    @csrf
                                    @php $tecnique = json_decode($product->tecnique)  @endphp
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


                                        @foreach($tecnique  as $key => $value)

                                                @if($key =='Ürün Markası')
                                                    <div class="col-md-6 mb-3">
                                                        <strong> Ürün Markası :</strong>
                                                        <input name="teknik_key[]" class="customFormInput"  value="Ürün Markası"  type="hidden">
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <input name="teknik_value[]" class="form-control"  value="{{$value}}"  type="text">
                                                    </div>
                                                @endif
                                                    @if($key =='Durumu')
                                                        {{-- Durumu--}}
                                                        <div class="col-md-6 mb-3">
                                                            <strong>Durumu :</strong>
                                                            <input name="teknik_key[]" class="customFormInput"  value="Durumu"  type="hidden">
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <select name="teknik_value[]" class="form-control" >
                                                                <option @if($value=='Sıfır')  selected @endif  value="Sıfır">Sıfır</option>
                                                                <option @if($value=='İkinci El') selected   @endif value="İkinci El">İkinci El</option>
                                                            </select>
                                                        </div>
                                                        {{--Durumu--}}
                                                    @endif


                                                @if($key != 'Durumu' && $key !='Ürün Markası')
                                            {{-- KEY Value--}}
                                            <div class="col-md-6 mb-3">
                                                <input name="teknik_key[]" class="form-control"  value="{{$key}}"  type="text">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <input  name="teknik_value[]" class="form-control" value="{{$value}}"   type="text"  >
                                            </div>
                                            {{-- KEY Value--}}
                                                @endif

                                            @endforeach

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mt-4 ">
                                                <button type="button" id="addteknik" class="btn btn-block theme-btn--dark1 btn--md"> <i class="fa fa-plus"></i> Özellik Ekle</button>
                                            </div>
                                            <div class="col-md-6 mt-4 ">
                                                <button type="submit" class="btn btn-primary" style="width: 100%"><i class="fa fa-plus"></i> Ürün Güncelle</button>
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

    <script>

        CKEDITOR.replace( 'description' );


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
                console.log($(this).data('subparent'))
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

        var carid = $( "#cars option:selected" ).val();
       if (carid){
           $.ajax({ /* AJAX REQUEST */
               type: 'post',
               url: "{{ route('car_models') }}",
               data: {
                   'carid': carid,
                   'carmodelid':{{$product->car_model}},
                   "_token": "{{ csrf_token() }}"
               },
               success: function (data) {
                   $('#carmodels').html(data);
               }
           });
       }


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
    </script>
@endsection
