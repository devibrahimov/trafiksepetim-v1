@php

    function curl_get($url) {


        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true
        ]);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;

    }

      //  print_r($vergidaireleri);die;
@endphp

@extends('site.index')

@section('css')
    <style>
        i.fa-info-circle{
            color:#0a456d!important;
        }

        i.fa-question-circle{
            color:#f39700!important;
        }

    </style>
@endsection


@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Anasayfa</a></li>
                    <li class='active'>Giriş Yap</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div id="product-tabs-slider" class="scroll-tabs wow fadeInUp col-md-7">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title center-block loginHeading">Mağaza Kayıt Formu</h3>
                        <div class="loginTabsContent center-block">
                            <ul class="nav nav-tabs nav-tab-line text-center" id="loginForms">
                                <li class="loginTabSwitch ">
                                    <a  href="{{route('userregister')}}" >Üye</a>
                                </li>
                                <li class="loginTabSwitch active">
                                    <a data-transition-type="backSlide" id="magaza"  href="{{route('marketregister')}}"  >Mağaza</a>
                                </li>
                                <li class="loginTabSwitch">

                                    <a data-transition-type="backSlide" id="hizmet" href="{{route('serviceregister')}}" >Hizmet
                                        Veren</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="tab-content outer-top-xs" id="registerform">
                        <div class="tab-pane in active center-block loginFormContent" style="max-width: 1000px;" id="magaza">
                            <div style="text-align:center;margin-bottom:20px;">
                                <span class="step">Genel Bilgiler</span>
                                <span class="step">Market Bİlgileri</span>
                                <span class="step">Banka Bilgileri</span>
                                <span class="step">Hükümler ve Koşullar</span>
                            </div>
                            <form id="regForm" action="{{route('market_registerformpost')}}" method="post">
                                <div class="tab row">
                                    <div class="col-md-12">
                                        <label for="input">Mağaza Adı
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Mağaza adınızı belirlerken  min.3 aralığında olmasına dikkat ediniz.">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required type="text" name="market_name"
                                               value="{{old('market_name')}}" placeholder="Mağaza Adı ">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Kullanıcı Adı
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Kullanıcı adınızı belirlerken min.3 karakter aralığında olmasına dikkat ediniz. ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required type="text" placeholder="Kullanıcı Adı"
                                               name="user_name" value="{{old('user_name')}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">E-Mail
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Tüm mail uzantıları kayıt aşaması için geçerlidir. ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required type="email" placeholder="username@mail.com"
                                               name="email" value="{{old('email')}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Şifre
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Şifrenizi belirlerken min.6 karakter aralığında olmasına dikkat ediniz. ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required type="password" placeholder="*******"
                                               value="{{old('password')}}" minlength="6" maxlength="50" name="password" >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Şifre Kontrol
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Belirlediğiniz  şifreyi tekrar giriniz. ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required type="password" placeholder="*******"
                                               name="password_confirmation"  minlength="6" maxlength="50" value="{{old('password_confirmation')}}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="input">Cep Telefonu
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Aktif olarak kullandığınız cep telefonu başına sıfır eklemeden yazınız. ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required type="number" placeholder=" "
                                               name="number"  value="{{old('number')}}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="input">İş Telefonu
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Aktif olarak kullandığınız iş telefonu başına sıfır eklemeden yazınız. ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required type="text" name="work_number"
                                               value="{{old('work_number')}}" placeholder=" ">
                                    </div>

                                    @csrf
                                    <div class="col-md-6">
                                        <label for="input">Üyelik Türü
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı yazarken dikkat edilecek yazım kuralları ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <select class="customFormInput" id="showHideID" required name="user_type" onchange="showHideDiv()">
                                            <option selected disabled>Seçiniz</option>
                                            <option value="personal">Şahıs</option>
                                            <option value="company">Şirket</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab row">
                                    <div id="write">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">İşletme Adı
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="İşletme adınızın yazımıyla ilgili herhangi bir sınırlandırma bulunmamaktadır. ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required type="text" name="business_name"
                                               value="{{old('business_name')}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">E-posta Adresi
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Tüm E-posta uzantıları kayıt aşaması için geçerlidir. ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required type="text"
                                               value="{{old('kep_address')}}" name="kep_address">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="input">Vergi İl
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Bağlı olduğunuz vergi ilinizi seçiniz.  ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <select class="customFormInput" id="vergidairesiil">
                                            <option selected disabled>Vergi Dairesini seçin</option>
                                            @foreach($iller as $il)
                                                <option  {{old('vergidairesiil')==$il->SehirAdi?'selected' :'' }}
                                                         value="{{$il->SehirAdi}}">{{$il->SehirAdi}} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="input">Vergi Dairesi
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Bağlı olduğunuz vergi dairesini seçiniz. ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <select class="customFormInput"  name="ilvergi_mudurlugu" id="ilvergimudurlukleri">
                                            <option selected disabled>Vergi Dairesinin olduğu ili seçin</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="input">Vergi Numarası
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Bağlı olduğunuz vergi Numarasını yazınız.  ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required type="text" value="{{old('tax_number')}}"
                                               name="tax_number" >
                                    </div>

                                </div>

                                <div class="tab row">
                                    <div class="col-md-6">
                                        <label for="input">İl Seçin
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Bağlı olduğunuz il seçiniz.  ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <select class="customFormInput"  name="province" id="province">
                                            <option disabled selected> Bir İl seçin</option>
                                            @foreach($provinces as $province)
                                                <option value="{{$province->province_no}}">{{$province->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">İlçe Seçin
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Bağlı olduğunuz ilçeyi seçiniz. ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <select class="customFormInput"  name="district" id="districts">
                                            <option disabled selected> Bir İlçe seçin</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Posta Kodu
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Posta kodunuzu 5 haneden yazınız.">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required type="text" id="postcode"
                                               name="postcode" placeholder="10408">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Adres
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Bağlı olduğunuz adres'i yazınız.">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title=" ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput"  name="address" requried id="address"  type="text" placeholder="adress">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Hesap Sahibi Adı Soyadı/Ünvanı
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Görünecek olan ad / soyad ve meslek unvanınızı doğru olarak belirtiniz. ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required id="hesabsahibiadi"
                                               name="hesabsahibiadi" type="text" placeholder="İbrahimov">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Banka
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Bağlı olduğunuz bankanızı seçiniz.">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>

                                        </label>
                                        <select class="customFormInput" name="bank" required id="bank">
                                            @foreach($banks as $bank)
                                                <option value="{{$bank}}">{{$bank}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="input">IBAN No</label>
                                        <input class="customFormInput" required  name="ibanno" id="ibanno" type="text" >
                                    </div>
                                </div>
                                <div class="tab">
                                    <div>
                                        <label for="input">Hükümler Ve Koşullar
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>

                                        </label>
                                        <div class="customFormInput" style="height: 170px; overflow-y: scroll;">lorem Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste facilis aut illo nisi voluptate perferendis dicta rerum autem doloribus, nulla amet qui explicabo asperiores ratione molestias, quia praesentium
                                            consequatur iure. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam consequuntur ducimus amet in dolor eum? Quae, asperiores vel modi praesentium itaque dolorum aspernatur, consequuntur impedit
                                            repellat quia, maxime provident laboriosam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Non deserunt totam, ipsam, laborum eos quod modi impedit dolor autem quo nobis maiores voluptatem perspiciatis
                                            quisquam harum. Excepturi adipisci tempore eaque? Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, rem doloribus? Perferendis quidem eaque cumque repellendus repellat vitae quasi temporibus
                                            qui nisi consequatur illo, veritatis minima! Laboriosam temporibus impedit inventore. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit dolorum delectus quos voluptate fugiat minima alias
                                            error amet dicta assumenda iusto sapiente nihil aliquam impedit, ducimus placeat perspiciatis nisi veniam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus excepturi, quae soluta at perferendis
                                            quod deleniti a neque quia incidunt veritatis atque deserunt iure nesciunt! Ipsa doloremque officia corporis! Nulla? Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde totam aperiam veniam tempora,
                                            voluptas nihil ab alias iure officiis aut adipisci quo laboriosam voluptate expedita ipsa odio placeat deserunt. Iste?</div>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="checkbox" name="sozleshmecheck" id="20820">
                                        <label > Kabul Ediyorum
                                        </label>
                                        <div style="overflow:auto;">
                                            <div style="float:right;">
                                                <button type="submit">Kaydol</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div style="overflow:auto;">
                                    <div style="float:right;">
                                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Geri</button>
                                        <button type="button" id="nextBtn" onclick="nextPrev(1)">İleri</button>
                                    </div>
                                </div>
                            </form >
                        </div>

                    </div>

                </div>
                <div class="col-md-5">
                    <img src="{{env('APP_URL')}}/site/img/trafik-sepetim-magazaac.png" class="img-responsive center-block" style="margin: auto;" alt="">
                </div>
            </div>
        </div>
    </div>

    {
@endsection


@section('js')
    <script src="{{env('APP_URL')}}/site/validates.js"></script>
    <script>

        function showHideDiv() {

            var x = document.getElementById("showHideID").options[document.getElementById("showHideID").selectedIndex].value;
            if (x == 'personal') {
                document.getElementById('write').innerHTML = " ";
                document.getElementById('write').innerHTML = '<div class="col-md-6"><label for="input">Şahıs Adı</label><input class="customFormInput" name="sahisadi" required type="text" placeholder="Şahıs Soyadı"></div><div class="col-md-6"><label for="input">Şahıs Soyadı</label><input class="customFormInput"  name="sahissoyadi" required type="text" placeholder="Şahıs Soyadı"></div><div class="col-md-6"><label for="input">TC Kimlik No</label><input class="customFormInput" name="tckimlik"  required type="text" placeholder="TC kimkik No"></div> ';
            } else if (x == 'company') {
                document.getElementById('write').innerHTML = " ";
                document.getElementById('write').innerHTML = '<div class="col-md-6"><label for="input">Şirket Türü</label><select name="company_type" class="customFormInput"><option value="1">Anonim</option><option value="2">Limited</option><option value="2">Hisseli Komandit</option></select></div><div class="col-md-6"><label for="input">Tiacaret Odası</label><input class="customFormInput" name="chamber_of_commerce" required type="text" placeholder="Tiacaret Odası"></div><div class="col-md-6"><label for="input">Ticaret Sicil Numarası</label><input class="customFormInput" required type="text" name="trade_registry_number" placeholder="Ticaret Sicil No"></div><div class="col-md-6"><label for="input">Şirket Ünvarı</label><input class="customFormInput" name="company_title" required type="text" placeholder="Şirket Ünvanı"></div>';
            }
        };


        var currentTab = 0;
        showTab(currentTab);




        function showTab(n) {
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Onaylıyorum";
            } else {
                document.getElementById("nextBtn").innerHTML = "İleri";
            }
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            var x = document.getElementsByClassName("tab");
            if (n == 1 && !validateForm()) return false;
            x[currentTab].style.display = "none";
            currentTab = currentTab + n;
            if (currentTab >= x.length) {
                document.getElementById("regForm").submit();
                return false;
            }
            showTab(currentTab);
        }

        function validateForm() {
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            for (i = 0; i < y.length; i++) {
                if (y[i].value == "") {
                    y[i].className += " invalid";
                    valid = false;
                }
            }
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid;
        }

        function fixStepIndicator(n) {
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            x[n].className += " active";
        }

        $('#vergidairesiil').on('change', function () {
            var il = $(this).find(":selected").val();

            $.ajax({
                /* AJAX REQUEST */
                type: 'post',
                url: "{{route('vergidaireleri')}}",
                data: {
                    'il': il,
                    "_token": "{{ csrf_token() }}"
                },
                success: function (data) {
                    $('#ilvergimudurlukleri').html(data);
                    return data;
                }
            });

        });
        $('#province').on('change', function () {
            var provinceid = $(this).find(":selected").val();


            $.ajax({ /* AJAX REQUEST */
                type: 'post',
                url: "{{ route('get.districts') }}",
                data: {
                    'provinceno': provinceid,
                    "_token": "{{ csrf_token() }}"
                },
                success: function (data) {
                    $('#districts').html(data);
                }
            });

        });
    </script>
@endsection
