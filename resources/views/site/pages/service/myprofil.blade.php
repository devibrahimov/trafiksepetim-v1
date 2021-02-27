@extends('site.index')

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
        <div class="container-fluid p-0">
            <div class="col-md-12 magazaNav">
                @include('site.pages.service.partial.navbar')
            </div>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="blog-page">

                    <div class="col-md-12">
                        <div class="blog-post">
                            <div class="row">

                                {{--    MAGAZA COVER IMAGE  --}}
                                <div class=" wow fadeInUp col-12 ppChangeHover" style="margin-bottom: 20px;">
                                   <div  id="coverPreviewimgdiv" >
                                       @if($service->service_cover_photo != NULL  )
                                           <div class="coverPreviewimg" style="height:150px;background: url('/storage/uploads/thumbnail/service/{{$service->id}}/profil/medium/{{$service->service_cover_photo}}') no-repeat;
                                               background-size: cover;background-position: center center !important;"></div>
                                       @else
                                           <div class="coverPreviewimg"  style="height:150px;background: url('/site/img/cover.jpg') no-repeat;
                                            background-size: cover;background-position: center center !important;"></div>
                                           {{-- <img class="img-responsive" id="coverPreviewimg"  src="/site/img/cover.jpg" alt="">--}}
                                       @endif
                                   </div>


                                    <a onclick="document.getElementById('coverUpdate').click()" id="coverPreview" class="ppChange"><i class="fa fa-picture-o" aria-hidden="true"></i></a>
                                    <form method="post" id="cover_upload_form" name="cover_upload_form"  enctype="multipart/form-data">

                                        <input type="file" class="d-none" name="service_cover_photo" id="coverUpdate">   @csrf
                                        <button type="submit" name="service_cover_photo_submit"  id="service_cover_photo_submit"
                                                class="btn btn-outline-success" style="margin-top:10px;display: none" for="service_cover_photo">Resmi Yükle</button>
                                    </form>
                                </div>
                                {{--   MAGAZA COVER IMAGE  --}}


                                {{--  MAGAZA PROFIL IMAGE  --}}

                                <div class="wow fadeInUp col-sm-2 col-xs-6 ppChangeHover" >
                                   <div id="profilPreviewimgdiv">
                                    @if($service->service_profil_photo != NULL  )

                                        <div id="profilPreviewimg"  style="height:150px;background: url('/storage/uploads/thumbnail/service/{{$service->id}}/profil/medium/{{$service->service_profil_photo}}') no-repeat;
                                            background-size: cover;background-position: center center !important;"></div>
                                    @else
                                        <div id="profilPreviewimg" style="height:150px;background: url('/site/img/profil.jpg') no-repeat;
                                            background-size: cover;background-position: center center !important;"></div>

                                    @endif
                                   </div>
                                    <a class="ppChange" onclick="document.getElementById('profileUpdate').click()"><i class="fa fa-picture-o" aria-hidden="true"></i></a>
                                    <form style="margin-bottom: 10px;"  id="profil_upload_form" enctype="multipart/form-data">

                                        <input type="file"  name="service_profil_photo" class="d-none" id="profileUpdate">
                                        @csrf
                                        <button style="display: none" type="submit" name="service_profil_photo_submit"
                                                id="service_profil_photo_submit"
                                                class="btn btn-outline-success" style="margin-top:10px"
                                                for="service_profil_photo">Resmi Yükle</button>
                                    </form>
                                </div>
                                {{--  MAGAZA PROFIL IMAGE  --}}


                                <div class="wow fadeInUp col-sm-5 col-xs-6">
                                    <h1>{{$service->business_name}}</h1>
                                    <a href="#HesapBilgileri"><span class="author">{{$service->name}} {{$service->surname}}</span></a>
                                </div>
                                <div class="wow fadeInUp col-sm-5 col-xs-6 hidden-xs">

                                    <button  onclick="event.preventDefault();
                                        document.getElementById('form-submit').submit()" class="btn btn-primary cart-btn pull-right" style="margin-top: 25px;" type="button">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                                        Çıkış Yap
                                    </button>
                                    <button   class="btn btn-info cart-btn pull-right"  data-toggle="modal" data-target="#detay" style="margin-top: 25px;" type="button">
                                        <i class="fa fa-key" aria-hidden="true"></i>
                                        Şifreni Değiştir
                                    </button>
                                    <form action="{{route('servicelogout')}}" method="post" id="form-submit" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="outer-bottom-xs blog-post outer-top-xs">
                            <div class="row mb-5">
                                <div class="col-xs-12 pull-left">
                                    <h1>Hesap Bilgilerinizi Güncelleyin</h1>
                                </div>
                            </div>
                            <div class="row mt-5 recursiveCategoryContent">
                                {{--                                {{route('market_formupdate')}}--}}
                                <form id="" action="{{route('service_register_update')}}" method="post" >
                                    <div class="col-md-6">
                                        <label for="input">Kullanıcı Adı</label>
                                        <input class="customFormInput"  required type="text" name="user_name" value="{{$service->user_name}}">
                                    </div>
                                    @csrf
                                    <div class="col-md-6">
                                        <label for="input">E-Mail</label>
                                        <input class="customFormInput" required type="text" disabled value="{{$service->email}}">
                                    </div>

                                        <div class="col-md-6">
                                            <label for="input">Şahıs Adı</label>
                                            <input class="customFormInput" required type="text"  disabled value="{{$service->name}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="input">Şahıs Soyadı</label>
                                            <input class="customFormInput" required type="text"  disabled value="{{$service->surname}}">
                                        </div>


                                        <div class="col-md-6">
                                            <label for="input">TC Kimlik No</label>
                                            <input class="customFormInput" required type="text"  disabled value="{{$service->tckimlik}}">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="input">Şirket Ünvanı</label>
                                            <input class="customFormInput" required type="text" disabled value="{{$service->company_title}}">
                                        </div>

                                    <div class="col-md-6">
                                        <label for="input">İşletme Adı</label>
                                        <input class="customFormInput" required type="text" disabled value="{{$service->business_name}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Kurumsal E-posta Adresi</label>
                                        <input class="customFormInput" required type="text" disabled value="{{$service->kep_address}}">
                                    </div>
                                    @if(isset($service->trade_registry_number)) )
                                    <div class="col-md-6">
                                        <label for="input">Vergi Numarası</label>
                                        <input class="customFormInput" required type="text" disabled value="{{$service->trade_registry_number}}">
                                    </div>
                                    @endif
                                    @php  $ilvergi_mudurlugu =(new \App\Http\Controllers\Helper\HelperController)->findilvergidairesi($service->ilvergi_mudurlugu) @endphp
                                    <div class="col-md-6">
                                        <label for="input">Vergi İl</label>
                                        <select class="customFormInput" disabled>
                                            <option value="1" selected>{{$ilvergi_mudurlugu->SehirAdi}}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Vergi Dairesi</label>
                                        <select class="customFormInput" disabled>
                                            <option value="1" selected>{{$ilvergi_mudurlugu->VergiDairesiMudurlugu}}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Cep Telefonu</label>
                                        <input class="customFormInput" required type="text" name="ceptelefonu" value="{{$service->ceptelefonu}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">İş Telefonu</label>
                                        <input class="customFormInput" required type="text" name="istelefonu" value="{{$service->istelefonu}}">
                                    </div>
                                    <div class="col-md-12">
                                        <h1 class="pb-3">Kişisel Bilgileriniz</h1>
                                    </div>
                                    @php $il = (new App\Http\Controllers\Helper\HelperController)->findil($service->il) @endphp
                                    @php $ilce = (new App\Http\Controllers\Helper\HelperController)->findilce($service->ilce) @endphp
                                    <div class="col-md-6">
                                        <label disabled for="input">İl Seçin</label>
                                        <select class="customFormInput" disabled>
                                            <option value="{{$il->id}}" selected >{{$il->name}}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label disabled for="input">İlçe Seçin</label>
                                        <select class="customFormInput" disabled>
                                            <option value="{{$ilce->id}}" selected >{{$ilce->name}}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="input">Adres</label>
                                        <input class="customFormInput" required   type="text" name="address" value="{{$service->adress}}">
                                    </div>

                                  <div class="col-md-6">
                                      <button class="btn btn-primary cart-btn pull-right mt-5" type="submit">Güncelle</button>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{route('updateprofilpassword')}}" name="changepassword" method="post" class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel"> Şifrenizi Değiştirin </h3>
                </div>

                <div class="modal-body">
                    <div class="blog-post">

                        <div class="row mt-5 recursiveCategoryContent">
                            @csrf
                            <div class="col-md-4">
                                <input class="customFormInput" required type="password" name="password" placeholder="yeni şifreniz">
                            </div>
                            <div class="col-md-4">
                                <input class="customFormInput" required type="password" name="password_confirmation" placeholder="yeni şifre tekrar">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Vazgeç</button>
                    <input type="submit"  name="changepassword" class="btn btn-primary" value="Değiştir">
                </div>
            </form>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function() {


            $('#coverUpdate').on('change',function(){
                $('#service_cover_photo_submit').trigger('click');
            });
            $('#cover_upload_form').on('submit',function(){
                event.preventDefault();
                $.ajax({
                    /* AJAX REQUEST*/
                    url: "{{ route('service_cover_image') }}",
                    method : "POST",
                    dataType: 'JSON',
                    data: new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    success: function(data) {
                        $('#coverPreviewimg').remove();
                        $image = '<div class="coverPreviewimg" style="height:150px;background: url(\'/storage/uploads/thumbnail/service/{{auth()->guard('service')->user()->id}}/profil/medium/'+data.img+'\') no-repeat;\n' +
                        'background-size: cover;background-position: center center !important;"></div>';
                        $('#coverPreviewimgdiv').html($image);
                    }
                });
            });

            /** profil photo change*/
            $('#profileUpdate').on('change',function(){
                $('#service_profil_photo_submit').trigger('click');
            });
            $('#profil_upload_form').on('submit',function(){
                var market_profil_photo = $('#service_profil_photo').val() ;

                event.preventDefault();
                $.ajax({
                    /* AJAX REQUEST*/
                    url: "{{ route('service_profil_image') }}",
                    method : "POST",
                    dataType: 'JSON',
                    data: new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    success: function(data) {
                    console.log(data);


                        $('#profilPreviewimg').remove();


                            var image = '<div id="profilPreviewimg" style="height:150px;background: url(\'/storage/uploads/thumbnail/service/{{$service->id}}/profil/medium/'+data.img+'\') no-repeat;\n' +
    '                                            background-size: cover;background-position: center center !important;"></div>';
                         $('#profilPreviewimgdiv').html(image);

                    }
                });
            });

        });

    </script>
@endsection
