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
                    <li><a href="{{route('home')}}">Anasayfa</a></li>
                    <li class='active'>Hizmet Veren Kayıt</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div id="product-tabs-slider" class="scroll-tabs wow fadeInUp col-md-7">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title center-block loginHeading">Hizmet Veren Kayıt Formu</h3>
                        <div class="loginTabsContent center-block">
                            <ul class="nav nav-tabs nav-tab-line text-center" id="loginForms">
                                <li class="loginTabSwitch ">
                                    <a  href="{{route('userregister')}}">Üye</a>
                                </li>
                                <li class="loginTabSwitch ">
                                    <a data-transition-type="backSlide" id="magaza"  href="{{route('marketregister')}}"  >Mağaza</a>
                                </li>
                                <li class="loginTabSwitch active">

                                    <a data-transition-type="backSlide" id="hizmet"  href="{{route('serviceregister')}}" >Hizmet
                                        Veren</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="tab-content outer-top-xs" id="registerform">
                        <div class="tab-pane in active center-block loginFormContent" style="max-width: 1000px;" id="hizmetVeren">
                            <div style="text-align:center;margin-bottom:20px;">
                                <span class="step">Genel Bilgiler</span>
                                <span class="step">Vergi Bilgileri</span>
                                <span class="step">Adres Bilgileri</span>
                                <span class="step">Hükümler ve Koşullar</span>
                            </div>
                            <form id="regForm" action="{{route('service_register_formpost')}}" method="post">
                                <div class="tab row">
                                    <div class="col-md-12">
                                        <label for="input">Hizmet Adı
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Vereceginiz hizmetin ismini belirlerken türkçe karakter kullanımına  yer vermeniz yeterlidir.(A-z)">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required name="service_name"
                                               value="{{old('service_name')}}" type="text">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Kullanıcı Adı
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Kullanıcı adınızı belirlerken min.3 karakter max.8 karakter aralıgında olmasına dikkat ediniz.">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput"name="user_name" value="{{old('user_name')}}"
                                               required type="text" >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Adınız
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Adınızın yazımıyla ilgili herhangi bir sınırlandırma bulunmamaktadır. ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required name="name" value="{{old('name')}}"
                                               type="text">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Soyadınız
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Soyadınızın yazımıyla ilgili herhangi bir sınırlandırma bulunmamaktadır.">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required name="surname" value="{{old('surname')}}"
                                               type="text">
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
                                        <input class="customFormInput" required name="email" value="{{old('email')}}"
                                               type="text">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Şifre
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Şifrenizi belirlerken min.6 karakter aralıgında olmasına  ve büyük küçük harf,sayı,noktalama kullanımına dikkat ediniz. ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required  value="{{old('password')}}" name="password"
                                               type="password" >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Şifre Kontrol
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Belirlediginiz şifreyi tekrar giriniz. ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required name="password_confirmation"
                                               value="{{old('password_confirmation')}}" type="password" >
                                    </div>
                                </div>
                                @csrf
                                <div class="tab row">
                                    <div class="col-md-6">
                                        <label for="input">Şirket Ünvanı
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title=" Gerçek,tüzel şirket ünvanınızı herhangi bir sınırlama olmadan yazınız.">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required name="company_title"
                                               value="{{old('company_title')}}" type="text" >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">İşletme Adı
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="İşletme adınızı belirlerken min.3  karakter aralığında olmasına dikkat ediniz. ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required name="business_name"
                                               value="{{old('business_name')}}" type="text" >
                                    </div>

                                    <div class="col-md-12">
                                        <label for="input">E-Mail
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Tüm mail uzantıları kayıt aşaması için geçerlidir. ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required value="{{old('kep_address')}}"
                                               name="kep_address" type="text" >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Vergi Numarası
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="10 haneli vergi numaranızı yazınız. ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required value="{{old('tax_number')}}"
                                               name="tax_number" type="number" >
                                        </div>
                                    <div class="col-md-6">
                                        <label for="input">TC Kimlik No
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="11 haneli vergi numaranızı giriniz. ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required value="{{old('tckimlik')}}"
                                               name="tckimlik"  type="text" >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Vergi İl
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <select class="customFormInput" required id="vergidairesiil">
                                            @foreach($iller as $il)
                                                <option  {{old('vergidairesiil')==$il->SehirAdi?'selected' :'' }}
                                                         value="{{$il->SehirAdi}}">{{$il->SehirAdi}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Vergi Dairesi
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <select class="customFormInput"  required   name="ilvergi_mudurlugu" id="ilvergimudurlukleri">
                                            <option selected disabled>Vergi Dairesini seçin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab row">
                                    <div class="col-md-6">
                                        <label for="input">Cep Telefonu
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Aktif olarak kullandığınız cep telefonu başına sıfır eklemeden yazınız.">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required type="text" name="ceptelefonu" >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">İş Telefonu
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Aktif olarak kullandığınız cep telefonunu başına sıfır eklemeden giriniz. ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required type="text" name="work_number"  >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">İl
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <select class="customFormInput" required name="province" id="province">
                                            <option disabled selected> Bir İl seçin</option>
                                            @foreach($provinces as $province)
                                                <option value="{{$province->province_no}}">{{$province->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">İlçe
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <select class="customFormInput"   name="district" id="districts">
                                            <option disabled selected> Bir İlçe seçin</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="input">Adres
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı yazarken dikkat edilecek yazım kuralları ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required name="address"  type="text" >
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
                                    <input type="checkbox" name="sozleshmecheck" id="20820">
                                    <label> Kabul Ediyorum </label>
                                </div>
                                <div style="overflow:auto;">
                                    <div style="float:right;">
                                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Geri</button>
                                        <button type="button" id="nextBtn" onclick="nextPrev(1)">İleri</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
                <div class="col-md-5">
                    <img src="{{env('APP_URL')}}/site/img/trafik-sepetim-hizmetveren.png" class="img-responsive center-block" style="margin: auto;" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')

    <script>



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
