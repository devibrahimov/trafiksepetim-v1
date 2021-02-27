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
                        <h3 class="new-product-title center-block loginHeading">Üye Ol</h3>
                        <div class="loginTabsContent center-block">
                            <ul class="nav nav-tabs nav-tab-line text-center" id="loginForms">
                                <li class="loginTabSwitch active">
                                    <a data-transition-type="backSlide" id="uye" href="{{route('userregister')}}"  >Üye</a>
                                </li>
                                <li class="loginTabSwitch">
                                    <a data-transition-type="backSlide" id="magaza"  href="{{route('marketregister')}}" >Mağaza</a>
                                </li>
                                <li class="loginTabSwitch">
                                    <a data-transition-type="backSlide" id="hizmet" href="{{route('serviceregister')}}">Hizmet Veren</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="tab-content outer-top-xs" id="registerform">
                        <div class="tab-pane in  active center-block loginFormContent" style="margin-bottom: 25px;min-height: 305px;" id="uye">
                            <div style="text-align:center;margin-bottom:20px;">
                                <span class="step">Genel Bilgiler</span>
                                <span class="step">Üye Bİlgileri</span>
                                <span class="step">Kişisel Bilgiler</span>
                                <span class="step">Hükümler ve Koşullar</span>
                            </div>

                            <form id="regForm" method="post" action="{{route('userregister.store')}}">
                                <div class="tab">
                                    <div>
                                        <label for="input">Adınız
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Adınızın yazımıyla ilgili herhangi bir sınırlandırma bulunmamaktadır. ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" name="name" value="{{old('name')}}" required type="text" maxlength="50"  >
                                    </div>
                                    <div>
                                        <label for="input">Soyadınız
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Soyadınızın yazımıyla ilgili herhangi bir sınırlandırma bulunmamaktadır.">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" name="lastname" value="{{old('lastname')}}"
                                               required type="text"  maxlength="50"  >
                                    </div>
                                    <div>
                                        <label for="input">Numaranız
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Aktif olarak kullandığınız cep telefonuzun başına sıfır eklemeden yazınız. ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" name="number" value="{{old('number')}}" required
                                               type="number" minlength="13" maxlength="13" placeholder="+90 ">
                                    </div>
                                </div>
                                <div class="tab active">
                                    <div>
                                        <label for="input">E-Mail
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Tüm e-mail uzantıları kayıt aşaması için geçerlidir.">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" name="email" value="{{old('email')}}" required
                                               type="email" maxlength="100"  >
                                    </div>
                                    <div>
                                        <label for="input">Şifreniz
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Şifrenizi belirlerken min.6 karakter aralığında olmasına ve büyük küçük harf, sayı, noktalama kullanımına dikkat ediniz. ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" required name="password" minlength="6" maxlength="50"
                                               value="{{old('password')}}" type="password" >
                                    </div>
                                    <div>
                                        <label for="input">Şifreniz Doğrulama
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Belirlediğiniz şifreyi tekrar giriniz. ">
                                              <i  class="fa fa-question-circle " style="pointer-events: none;"></i>
                                            </span>
                                        </label>
                                        <input class="customFormInput" name="password_confirmation" minlength="6"
                                               maxlength="50" value="{{old('password_confirmation')}}" required type="password">
                                    </div>
                                </div>
                                @csrf
                                <div class="tab">
                                    <div>
                                        <label for="input"> Cinsiyetiniz
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>

                                        </label>
                                        <select  name="gender" required class="customFormInput">
                                            <option {{old('gender')=='erkek' ?'selected' :''}} value="erkek">Erkek</option>
                                            <option {{old('gender')=='kadin' ?'selected' :''}} value="kadin">Kadın</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="input">Doğum Tarihiniz
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hizmet adı ne işeyarayacak metni içeriği">
                                              <i  class="fa fa-info-circle " style="pointer-events: none;"></i>
                                            </span>

                                        </label>
                                        <input class="customFormInput" name="birthdate" required maxlength="10"
                                               value="{{ old('birthdate', date('d.m.Y')) }}" required type="date">
                                    </div>
                                </div>
                                <div class="tab">
                                    <div>
                                        <label for="input">Hükümler Ve Koşullar</label>
                                        <div class="customFormInput" style="height: 170px; overflow-y: scroll;">lorem Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste facilis aut illo nisi voluptate perferendis dicta rerum autem doloribus, nulla amet qui explicabo asperiores ratione molestias, quia praesentium
                                            consequatur iure. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam consequuntur ducimus amet in dolor eum? Quae, asperiores vel modi praesentium itaque dolorum aspernatur, consequuntur impedit
                                            repellat quia, maxime provident laboriosam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Non deserunt totam, ipsam, laborum eos quod modi impedit dolor autem quo nobis maiores voluptatem perspiciatis
                                            quisquam harum. Excepturi adipisci tempore eaque? Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, rem doloribus? Perferendis quidem eaque cumque repellendus repellat vitae quasi temporibus
                                            qui nisi consequatur illo, veritatis minima! Laboriosam temporibus impedit inventore. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit dolorum delectus quos voluptate fugiat minima alias
                                            error amet dicta assumenda iusto sapiente nihil aliquam impedit, ducimus placeat perspiciatis nisi veniam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus excepturi, quae soluta at perferendis
                                            quod deleniti a neque quia incidunt veritatis atque deserunt iure nesciunt! Ipsa doloremque officia corporis! Nulla? Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde totam aperiam veniam tempora,
                                            voluptas nihil ab alias iure officiis aut adipisci quo laboriosam voluptate expedita ipsa odio placeat deserunt. Iste?</div>
                                    </div>
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
                    <img src="{{env('APP_URL')}}/site/img/trafik-sepetim-kayitol.png" class="img-responsive center-block" style="margin: auto;" alt="">
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
                x[n].style.display = "block";
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
    </script>
@endsection
