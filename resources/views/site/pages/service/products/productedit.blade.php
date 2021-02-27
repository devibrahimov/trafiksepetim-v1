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




        /*Copied from bootstrap to handle input file multiple*/
        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: normal;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        /*Also */
        .btn-success {
            border: 1px solid #c5dbec;
            background: #d0e5f5;
            font-weight: bold;
            color: #2e6e9e;
        }
        /* This is copied from https://github.com/blueimp/jQuery-File-Upload/blob/master/css/jquery.fileupload.css */
        .fileinput-button {
            position: relative;
            overflow: hidden;
        }

        .fileinput-button input {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            opacity: 0;
            -ms-filter: "alpha(opacity=0)";
            font-size: 200px;
            direction: ltr;
            cursor: pointer;
        }

        .thumb {
            height: 80px;
            width: 100px;
            border: 1px solid #000;
        }

        ul.thumb-Images li {
            width: 120px;
            float: left;
            display: inline-block;
            vertical-align: top;
            height: 120px;
        }

        .img-wrap {
            position: relative;
            display: inline-block;
            font-size: 0;
        }

        .img-wrap .close {
            position: absolute;
            top: 2px;
            right: 2px;
            z-index: 100;
            background-color: #d0e5f5;
            padding: 5px 2px 2px;
            color: #000;
            font-weight: bolder;
            cursor: pointer;
            opacity: 0.5;
            font-size: 23px;
            line-height: 10px;
            border-radius: 50%;
        }

        .img-wrap:hover .close {
            opacity: 1;
            background-color: #ff0000;
        }

        .FileNameCaptionStyle {
            font-size: 12px;
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
        <div class="container">
            <div class="row">
                <div class="col-md-12 magazaNav">
                    <nav class="customDD">
                        <ul>
                            <li>
                                <a href="magazam.html"><span class="fa fa-home"></span> Anasayfa</a>
                            </li>
                            <li>
                                <a href="#"><span class="fa fa-shopping-cart"></span> Siparişler</a>
                                <ul>
                                    <li><a href="onayBekleyenSiparisler.html">Onay Bekleyen Siparişler <span>1</span></a></li>
                                    <li><a href="bekleyenSiparisler.html">Bekleyen Siparişler</a></li>
                                    <li><a href="tumSiparisler.html">Tüm Siparişler</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="urunYonetimi.html"><span class="fa fa-tags"></span> Ürün Yonetimi</a>
                            </li>
                            <li>
                                <a href="#"><span class="fa fa-bar-chart"></span> Raporlar</a>
                                <ul>
                                    <li><a href="satisRaporu.html">Satış Raporu</a></li>
                                    <li><a href="gelirRaporu.html">Gelir Raporu</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="blog-page">

                    <div class="col-md-12 mt-5 mb-2">
                        <div class="blog-post">
                            <input name="category" type="hidden">
                            <input name="subcategory" type="hidden">
                            <input name="secondsubcategory" type="hidden">
                            <div class="row mt-5 recursiveCategoryContent">

                                <div class="col-md-4">
                                    <div class="recursiveCategoryHolder" id="RCparent">
                                        <ul class="recursiveCategoryParent" id="category">
                                            @foreach($categories as $category)
                                                <li class="parentEvent" id="{{$category->id}}" >{{$category->name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="recursiveCategoryHolder" id="RCsubParent">

                                        <ul class="recursiveCategoryParent"  id="subcategory">

                                            @foreach($subcategories as $category)
                                                <li style="display: none" class="parentChild subcategory"
                                                    data-parentid="{{$category->parent_id}}"  data-id="{{$category->id}}">{{$category->name}}</li>
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
                                <form action="{{route('market-create-product')}}" method="post"  enctype="multipart/form-data">
                                    <div class="col-md-12 mb-2 ml-4">

                                        {{--                                            <div class="col-auto">--}}
                                        {{--                                                <button type="button" onclick="imageuploadbuttonfunction()" class="btn btn-primary cart-btn" style="margin-top:24px;margin-bottom:10px;">Resim Ekle</button>--}}
                                        {{--                                                <input type="file" multiple id="fileUpload" accept="image/*" name="proimg[]" class="custom-file-input" style="display: none;">--}}
                                        {{--                                            </div>--}}
                                        {{--                                            <div class="col-auto p-2 d-flex filePreview">  </div>--}}

                                        <div>
                                            <label style="font-size: 14px;">
                                                <span style='color:navy;font-weight:bold'>Ek Talimatlar:</span>
                                            </label>
                                            <ul>
                                                <li>
                                                    Yalnızca (jpg, png, jpeg) uzantılı dosyalara izin verilir
                                                </li>
                                                <li>
                                                    Her biri için 300 KB olmak üzere izin verilen maksimum dosya sayısı 6
                                                </li>
                                                <li>
                                                    farklı klasörlerden dosya seçebilirsiniz
                                                </li>
                                            </ul>
                                            <!--To give the control a modern look, I have applied a stylesheet in the parent span.-->
                                            <span class="btn btn-success fileinput-button">
            <span>Resim Seçin</span>
            <input type="file" name="proimg[]" id="files" multiple accept="image/jpeg, image/png, image/gif,"><br />
        </span>
                                            <output id="Filelist"></output>
                                        </div>

                                    </div>
                                    {{--################################################################################################--}}
                                    {{--ARAC MARKASI--}}
                                    <div class="col-md-6 mb-10">
                                        <label>Araç Markası :</label>
                                        <select name="car" id="cars" class="customFormInput" >
                                            <option selected disabled>Seçiniz</option>
                                            @foreach($cars as $car)
                                                <option value="{{$car->id}}">{{$car->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{--ARAC MARKASI--}}

                                    {{--ARAC Serisi--}}
                                    <div class="col-md-6 mb-10">
                                        <label>Araç Serisi :</label>
                                        <select name="carmodel" id="carmodels" class="customFormInput" >
                                            <option selected disabled>Seçiniz</option>
                                        </select>
                                    </div>

                                    {{--ARAC Serisi--}}

                                    <div class="col-md-6">
                                        <label for="input">Ürün Adı</label>
                                        <input class="customFormInput" name="product_name" required type="text" placeholder="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Kısa Açıklama</label>
                                        <input class="customFormInput" name="meta_desc" required type="text" placeholder="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="input">Fiyat</label>
                                        <input class="customFormInput" name="price" required type="text" placeholder="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="input">İndirimli Fiyat</label>
                                        <input class="customFormInput" name="sale_price"   type="text" placeholder="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="input">Stok Adeti</label>
                                        <input class="customFormInput" name="stock" required type="text" placeholder="">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="input">Ürün OEM Kodu </label>
                                        <input class="customFormInput" name="oem_code" required   type="text" placeholder="">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="input">Ürün Kodu</label>
                                        <input class="customFormInput" name="product_code" required type="text" placeholder="">
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
                                    <div class="col-md-6 mt-5 mb-5">
                                        <div  class="row" id="teknik_inputs">
                                            <div class="col-md-6 mb-10">
                                                <label for=""><strong>Key</strong> </label>
                                            </div>
                                            <div class="col-md-6 mb-10">
                                                <label for=""><strong>Value</strong> </label>
                                            </div>


                                            {{--Ürün Markası--}}
                                            <div class="col-md-6 mb-3">
                                                <strong> Ürün Markası :</strong>
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
                                                    <option value="evet">Sıfır</option>
                                                    <option value="hayır">İkinci El</option>
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
                                        <div class="row">
                                            <div class="col-4 mt-4 ">
                                                <button type="button" id="addteknik" class="btn btn-block theme-btn--dark1 btn--md"> <i class="fa fa-plus"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-5 mb-5">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Vazgeç</button>
                                        <button type="submit" class="btn btn-primary">Ekle</button>
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
        $(document).ready(function() {
            $('#urunYonetimi').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                pageLength: 10,
                oLanguage: {
                    "sLengthMenu": "Görüntülenen _MENU_ Kayıt",
                    "sSearch": "Ara"
                },
                language: {
                    "info": "Gösterilen Kayıt _END_ Toplam Kayıt _TOTAL_",
                    "paginate": {
                        "previous": "Geri",
                        "next": "İleri"
                    }
                }
            });
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

        $(document).ready(function() {
            document.getElementById('pro-image').addEventListener('change', readImage, false);

            $( ".preview-images-zone" ).sortable();

            $(document).on('click', '.image-cancel', function() {
                let no = $(this).data('no');
                $(".preview-show-"+no).remove();
            });

        });

        $(function() {
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#fileUpload').on('change', function() {
                imagesPreview(this, 'div.filePreview');
            });
        });
        function imageuploadbuttonfunction() {
            $('#fileUpload').trigger('click');
        }

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


        //I added event handler for the file upload control to access the files properties.
        document.addEventListener("DOMContentLoaded", init, false);

        //To save an array of attachments
        var AttachmentArray = [];

        //counter for attachment array
        var arrCounter = 0;

        //to make sure the error message for number of files will be shown only one time.
        var filesCounterAlertStatus = false;

        //un ordered list to keep attachments thumbnails
        var ul = document.createElement("ul");
        ul.className = "thumb-Images";
        ul.id = "imgList";

        function init() {
            //add javascript handlers for the file upload event
            document
                .querySelector("#files")
                .addEventListener("change", handleFileSelect, false);
        }

        //the handler for file upload event
        function handleFileSelect(e) {
            //to make sure the user select file/files
            if (!e.target.files) return;

            //To obtaine a File reference
            var files = e.target.files;

            // Loop through the FileList and then to render image files as thumbnails.
            for (var i = 0, f; (f = files[i]); i++) {
                //instantiate a FileReader object to read its contents into memory
                var fileReader = new FileReader();

                // Closure to capture the file information and apply validation.
                fileReader.onload = (function(readerEvt) {
                    return function(e) {
                        //Apply the validation rules for attachments upload
                        ApplyFileValidationRules(readerEvt);

                        //Render attachments thumbnails.
                        RenderThumbnail(e, readerEvt);

                        //Fill the array of attachment
                        FillAttachmentArray(e, readerEvt);
                    };
                })(f);

                // Read in the image file as a data URL.
                // readAsDataURL: The result property will contain the file/blob's data encoded as a data URL.
                // More info about Data URI scheme https://en.wikipedia.org/wiki/Data_URI_scheme
                fileReader.readAsDataURL(f);
            }
            document
                .getElementById("files")
                .addEventListener("change", handleFileSelect, false);
        }



        //Render attachments thumbnails.
        function RenderThumbnail(e, readerEvt) {
            var li = document.createElement("li");
            ul.appendChild(li);
            li.innerHTML = [
                '<div class="img-wrap" data-imgname="'+ readerEvt.name+'"> <span data-id="'+readerEvt.name+'" class="close">&times;</span>' +
                '<img class="thumb" src="',
                e.target.result,
                '" title="',
                escape(readerEvt.name),
                '" data-id="',
                readerEvt.name,
                '"/>' + "</div>"
            ].join("");

            var div = document.createElement("div");
            div.className = "FileNameCaptionStyle";
            li.appendChild(div);
            div.innerHTML = [readerEvt.name].join("");
            document.getElementById("Filelist").insertBefore(ul, null);
        }


        //To remove attachment once user click on x button
        jQuery(function($) {
            $("div").on("click", ".img-wrap .close", function() {
                var id = $(this)
                    .closest(".img-wrap")
                    .find("img")
                    .data("id");

                //to remove the deleted item from array
                var elementPos = AttachmentArray.map(function(x) {
                    return x.FileName;
                }).indexOf(id);
                if (elementPos !== -1) {
                    AttachmentArray.splice(elementPos, 1);
                }

                //to remove image tag
                $(this)
                    .parent()
                    .find("img")
                    .not()
                    .remove();

                //to remove div tag that contain the image
                $(this)
                    .parent()
                    .find("div")
                    .not()
                    .remove();

                //to remove div tag that contain caption name
                $(this)
                    .parent()
                    .parent()
                    .find("div")
                    .not()
                    .remove();


                for (var i = 0; i < $('#files').get(0).files.length; ++i) {

                    // console.log($('#files').get(0).files[i]['name'] )
                    // parent = $(this).parent() .child(".thumb").attr('title');
                    //console.log( $(this).parent().data("imgname")  )
                    if($('#files').get(0).files[i]['name'] ==$(this).parent().data("imgname")){
                        $('#files').get(0).files[i].value = '';
                    }
                    console.log($('#files').get(0).files[i]['name'] )
                }

                //to remove li tag
                var lis = document.querySelectorAll("#imgList li");
                for (var i = 0; (li = lis[i]); i++) {
                    if (li.innerHTML == "") {
                        li.parentNode.removeChild(li);
                    }
                }
            });
        });

        //Apply the validation rules for attachments upload
        function ApplyFileValidationRules(readerEvt) {
            //To check file type according to upload conditions
            if (CheckFileType(readerEvt.type) == false) {
                alert(
                    "The file (" +
                    readerEvt.name +
                    ") does not match the upload conditions, You can only upload jpg/jpeg/png files"
                );
                e.preventDefault();
                return;
            }

            //To check file Size according to upload conditions
            if (CheckFileSize(readerEvt.size) == false) {
                alert(
                    "The file (" +
                    readerEvt.name +
                    ") does not match the upload conditions, The maximum file size for uploads should not exceed 300 KB"
                );
                e.preventDefault();
                return;
            }

            //To check files count according to upload conditions
            if (CheckFilesCount(AttachmentArray) == false) {
                if (!filesCounterAlertStatus) {
                    filesCounterAlertStatus = true;
                    alert(
                        "You have added more than 10 files. According to upload conditions you can upload 6 files maximum"
                    );
                }
                e.preventDefault();
                return;
            }
        }

        //To check file type according to upload conditions
        function CheckFileType(fileType) {
            if (fileType == "image/jpeg") {
                return true;
            } else if (fileType == "image/png") {
                return true;
            } else if (fileType == "image/jpg") {
                return true;
            } else {
                return false;
            }
            return true;
        }

        //To check file Size according to upload conditions
        function CheckFileSize(fileSize) {
            if (fileSize < 1000000) {
                return true;
            } else {
                return false;
            }
            return true;
        }

        //To check files count according to upload conditions
        function CheckFilesCount(AttachmentArray) {
            //Since AttachmentArray.length return the next available index in the array,
            //I have used the loop to get the real length
            var len = 0;
            for (var i = 0; i < AttachmentArray.length; i++) {
                if (AttachmentArray[i] !== undefined) {
                    len++;
                }
            }
            //To check the length does not exceed 10 files maximum
            if (len > 5) {
                return false;
            } else {
                return true;
            }
        }


        //Fill the array of attachment
        function FillAttachmentArray(e, readerEvt) {
            AttachmentArray[arrCounter] = {
                AttachmentType: 1,
                ObjectType: 1,
                FileName: readerEvt.name,
                FileDescription: "Attachment",
                NoteText: "",
                MimeType: readerEvt.type,
                Content: e.target.result.split("base64,")[1],
                FileSizeInBytes: readerEvt.size
            };
            arrCounter = arrCounter + 1;
        }

    </script>
@endsection
