@php
    use App\Http\Controllers\Site\Market\MarketProcessController ;
    $market = (new MarketProcessController())->getMarketrow(auth()->guard('market')->user()->id);
    //print_r($market);die;
@endphp

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
                @include('site.pages.market.partial.marketnavbar')
            </div>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="blog-page">

                    <div class="col-md-12">
                        <div class="blog-post">
                            <div class="row">

                                {{--    MAGAZA COVER IMAGE  --}}
                                <div class=" wow fadeInUp col-12 ppChangeHover" id="coverPreviewimgdiv"  style="margin-bottom: 20px;">
                                    @if($market->service_cover_photo != NULL  )
                                        <div style="height:150px;background: url('/storage/uploads/thumbnail/malls/{{$service->provider_id}}/profil/medium/{{$service->service_cover_photo}}') no-repeat;
                                            background-size: cover;background-position: center center !important;"></div>
                                    @else
                                        <div style="height:150px;background: url('/site/img/cover.jpg') no-repeat;
                                            background-size: cover;background-position: center center !important;"></div>
                                        {{-- <img class="img-responsive" id="coverPreviewimg"  src="/site/img/cover.jpg" alt="">--}}
                                    @endif

                                    <a onclick="document.getElementById('coverUpdate').click()" id="coverPreview" class="ppChange"><i class="fa fa-picture-o" aria-hidden="true"></i></a>
                                    <form method="post" id="cover_upload_form" name="cover_upload_form"  enctype="multipart/form-data">

                                        <input type="file" class="d-none" name="market_cover_photo" id="coverUpdate">   @csrf
                                        <button type="submit" name="market_cover_photo_submit"  id="market_cover_photo_submit"
                                                class="btn btn-outline-success" style="margin-top:10px;display: none" for="market_cover_photo">Resmi Yükle</button>
                                    </form>
                                </div>
                                {{--   MAGAZA COVER IMAGE  --}}


                                {{--  MAGAZA PROFIL IMAGE  --}}

                                <div class="wow fadeInUp col-sm-2 col-xs-6 ppChangeHover" id="profilPreviewimgdiv">
                                    @if($market->service_profil_photo != NULL  )

                                        <div style="height:150px;background: url('/storage/uploads/thumbnail/malls/{{$service->provider_id}}/profil/medium/{{$service->service_profil_photo}}') no-repeat;
                                            background-size: cover;background-position: center center !important;"></div>
                                    @else
                                        <div style="height:150px;background: url('/site/img/profil.jpg') no-repeat;
                                            background-size: cover;background-position: center center !important;"></div>

                                    @endif
                                    <a class="ppChange" onclick="document.getElementById('profileUpdate').click()"><i class="fa fa-picture-o" aria-hidden="true"></i></a>
                                    <form style="margin-bottom: 10px;"  id="profil_upload_form" enctype="multipart/form-data">

                                        <input type="file"  name="market_profil_photo" class="d-none" id="profileUpdate">
                                        @csrf
                                        <button style="display: none" type="submit" name="market_profil_photo_submit"
                                                id="market_profil_photo_submit"
                                                class="btn btn-outline-success" style="margin-top:10px"
                                                for="market_profil_photo">Resmi Yükle</button>
                                    </form>
                                </div>
                                {{--  MAGAZA PROFIL IMAGE  --}}





                                <div class="wow fadeInUp col-sm-5 col-xs-6">
                                    <h1>Mağaza Adı</h1>
                                    <a href="#HesapBilgileri"><span class="author">Hesap Bilgileri</span></a>
                                </div>
                                <div class="wow fadeInUp col-sm-5 col-xs-6 hidden-xs">

                                    <button  onclick="event.preventDefault();
                                    document.getElementById('form-submit').submit()" class="btn btn-primary cart-btn pull-right" style="margin-top: 25px;" type="button"> <i class="fa fa-sign-out" aria-hidden="true"></i> Çıkış Yap</button>


                                    <form action="{{route('market.logout')}}" method="post" id="form-submit" style="display: none;">
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
                                <form id="" action="" method="post" >
                                    <div class="col-md-6">
                                        <label for="input">Kullanıcı Adı</label>
                                        <input class="customFormInput" required type="text" value="{{$market->user_name}}">
                                    </div>
                                    @csrf
                                    <div class="col-md-6">
                                        <label for="input">E-Mail</label>
                                        <input class="customFormInput" required type="text" value="{{$market->email}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Mağaza Adı</label>
                                        <input class="customFormInput" required disabled type="text" value="{{$market->market_name}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Üyelik Türü</label>
                                        <select class="customFormInput" disabled >
                                            @if($market->user_type=='personal')<option  selected  value="personal" selected>Şahıs</option> @endif
                                            @if($market->user_type=='company')<option  selected  value="company" selected>Şirket</option> @endif
                                        </select>
                                    </div>


                                    @if(isset($market->sahisadi)  )
                                        <div class="col-md-6">
                                            <label for="input">Şahıs Adı</label>
                                            <input class="customFormInput" required type="text" disabled value="{{$market->sahisadi}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="input">Şahıs Soyadı</label>
                                            <input class="customFormInput" required type="text" disabled value="{{$market->sahissoyadi}}">
                                        </div>
                                    @endif

                                    @if(isset($market->yetkiliname))
                                        <div class="col-md-6">
                                            <label for="input">Şahıs Adı</label>
                                            <input class="customFormInput"  required type="text" name="yetkiliname" value="{{$market->yetkiliname}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="input">Şahıs Soyadı</label>
                                            <input class="customFormInput"  required type="text" name="yetkilisurname" value="{{$market->yetkilisurname}}">
                                        </div>
                                    @endif


                                    @if(isset($market->tckimlik))
                                        <div class="col-md-6">
                                            <label for="input">TC Kimlik No</label>
                                            <input class="customFormInput" required type="text" disabled value="{{$market->tckimlik}}">
                                        </div>
                                    @endif

                                    @if(isset($market->company_title))
                                        <div class="col-md-6">
                                            <label for="input">Şirket Ünvanı</label>
                                            <input class="customFormInput" required type="text" disabled value="$market->company_title">
                                        </div>
                                    @endif
                                    <div class="col-md-6">
                                        <label for="input">İşletme Adı</label>
                                        <input class="customFormInput" required type="text" disabled value="{{$market->business_name}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Kurumsal E-posta Adresi</label>
                                        <input class="customFormInput" required type="text" value="{{$market->kep_address}}">
                                    </div>
                                    @if(isset($market->trade_registry_number)) )
                                    <div class="col-md-6">
                                        <label for="input">Vergi Numarası</label>
                                        <input class="customFormInput" required type="text" disabled value="{{$market->trade_registry_number}}">
                                    </div>
                                    @endif
                                    @php  $ilvergi_mudurlugu =(new \App\Http\Controllers\Helper\HelperController)->findilvergidairesi($market->ilvergi_mudurlugu) @endphp
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
                                        <input class="customFormInput" required type="text" value="{{$market->ceptelefonu}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">İş Telefonu</label>
                                        <input class="customFormInput" required type="text" value="{{$market->istelefonu}}">
                                    </div>
                                    <div class="col-md-12">
                                        <h1 class="pb-3">Kişisel Bilgileriniz</h1>
                                    </div>
                                    @php $il = (new App\Http\Controllers\Helper\HelperController)->findil($market->il) @endphp
                                    @php $ilce = (new App\Http\Controllers\Helper\HelperController)->findilce($market->ilce) @endphp
                                    <div class="col-md-6">
                                        <label for="input">İl Seçin</label>
                                        <select class="customFormInput" disabled>
                                            <option value="1" selected >{{$il->name}}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">İlçe Seçin</label>
                                        <select class="customFormInput" disabled>
                                            <option value="1" selected >{{$ilce->name}}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Posta Kodu</label>
                                        <input class="customFormInput" required disabled type="text" value="{{$market->postcode}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Adres</label>
                                        <input class="customFormInput" required disabled type="text" value="{{$market->adress}}">
                                    </div>
                                    @php $hesapbilgileri = json_decode($market->hesapbilgileri)  @endphp
                                    <div class="col-md-6">
                                        <label for="input">Hesap Sahibi Ünvan</label>
                                        <input class="customFormInput" required type="text" disabled value="{{$hesapbilgileri->hesabsahibiadi}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Banka</label>
                                        <select class="customFormInput" disabled>
                                            <option value="1" selected>{{$hesapbilgileri->bank}}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">IBAN No</label>
                                        <input class="customFormInput" required disabled type="text" value="{{$hesapbilgileri->ibanno}}">
                                    </div>
                                    {{--                                    <div class="col-md-6">--}}
                                    {{--                                        <button class="btn btn-primary cart-btn pull-right mt-5" type="submit">Güncelle</button>--}}
                                    {{--                                    </div>--}}
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
        $(document).ready(function() {



            $('#coverUpdate').on('change',function(){
                $('#market_cover_photo_submit').trigger('click');
            });
            $('#cover_upload_form').on('submit',function(){
                event.preventDefault();
                $.ajax({
                    /* AJAX REQUEST*/
                    url: "{{ route('market_cover_image') }}",
                    method : "POST",
                    dataType: 'JSON',
                    data: new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    success: function(data) {

                        $('#coverPreviewimg').remove();
                        $image = '<div id="coverPreviewimg" style="height:150px;background: url(\'/storage/uploads/thumbnail/malls/{{$market->market_id}}/profil/medium/'+data.img+'\') no-repeat; background-size: cover;background-position: center center !important;"></div>' +
                            '<a onclick="document.getElementById(\'coverUpdate\').click()" id="coverPreview" class="ppChange"><i class="fa fa-picture-o" aria-hidden="true"></i></a> ';
                        $('#coverPreviewimgdiv').html($image);
                    }
                });
            });

            /** profil photo change*/
            $('#profileUpdate').on('change',function(){
                $('#market_profil_photo_submit').trigger('click');

            });
            $('#profil_upload_form').on('submit',function(){
                var market_profil_photo = $('#market_profil_photo').val() ;

                event.preventDefault();
                $.ajax({
                    /* AJAX REQUEST*/
                    url: "{{ route('market_profil_image') }}",
                    method : "POST",
                    dataType: 'JSON',
                    data: new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    success: function(data) {

                        $('#profilPreviewimg').remove();
                        var image = '<img id="profilPreviewimg" src="/storage/uploads/thumbnail/market_profil_photo/medium/'+data.img+'">';
                        var image = '<div style="height:150px;background: url(\'/storage/uploads/thumbnail/malls/{{$market->market_id}}/profil/medium/'+data.img+'\') no-repeat; background-size: cover;background-position: center center !important;"></div>' +
                            '<a class="ppChange" onclick="document.getElementById(\'profileUpdate\').click()"><i class="fa fa-picture-o" aria-hidden="true"></i></a>';

                        $('#profilPreviewimgdiv').html(image);

                    }
                });
            });


            $('#bekleyenSiparis').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                pageLength: 5,
                "searching": false,
                paging: false,
                "bInfo": false
            });

            $('#coverUpdate').change(function(){
                alert()
                //   $('#market_cover_photo_submit').trigger('click');
            });



        });
        var ctx = document.getElementById('siparis').getContext('2d');
        var siparis = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi', 'Pazar'],
                datasets: [{
                    label: 'Bu Haftaki Siparişler',
                    data: [0, 1, 5, 3, 7, 0],
                    borderColor: [
                        '#00446dcc'
                    ],
                    borderWidth: 2,
                    pointRadius: 10,
                    pointHoverRadius: 10
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        var ctx2 = document.getElementById('gelir').getContext('2d');
        var gelir = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
                datasets: [{
                    label: 'Kazanç ₺',
                    backgroundColor: [
                        '#00446d44',
                        '#00446d55',
                        '#00446d66',
                        '#00446d77',
                        '#00446d88',
                        '#00446d99',
                        '#00446daa',
                        '#00446dbb',
                        '#00446dcc',
                        '#00446ddd',
                        '#00446dee',
                        '#00446dff',
                    ],
                    barPercentage: 0.5,
                    barThickness: 30,
                    data: [16213, 26598, 17865, 14256, 25424, 28563, 20453, 18597, 19898, 22587, 23654, 27898]
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        stacked: true
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }
        });
        var ctx3 = document.getElementById('urunler').getContext('2d');
        var urunler = new Chart(ctx3, {
            type: 'pie',
            data: {
                labels: [
                    "Ürünler",
                    "Kritik Stok",
                    "Tükenen Ürünler"
                ],
                datasets: [{
                    data: [268, 59, 3],
                    backgroundColor: [
                        "#00446dbb",
                        "#00446d88",
                        "#00446d22"
                    ]
                }]
            }
        });



    </script>
@endsection
