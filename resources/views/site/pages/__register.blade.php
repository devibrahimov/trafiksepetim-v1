@extends('site.index')

@section('css')
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
                                    <a data-transition-type="backSlide" id="uye" href="#uye" data-toggle="tab">Üye</a>
                                </li>
                                <li class="loginTabSwitch">
                                    <a data-transition-type="backSlide" id="magaza"  href="#magaza" data-toggle="tab">Mağaza</a>
                                </li>
                                <li class="loginTabSwitch">

                                    <a data-transition-type="backSlide" id="hizmet" href="#hizmetVeren" data-toggle="tab">Hizmet
                                        Veren</a>
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

                            <form id="regForm" action="#">
                                <div class="tab">
                                    <div>
                                        <label for="input">Adınız</label>
                                        <input class="customFormInput" required type="text">
                                    </div>

                                    <div>
                                        <label for="input">Soyadınız</label>
                                        <input class="customFormInput" required type="text">
                                    </div>

                                    <div>
                                        <label for="input">Numaranız</label>
                                        <input class="customFormInput" required type="text">
                                    </div>
                                </div>
                                <div class="tab">
                                    <div>
                                        <label for="input">E-Mail Adresiniz</label>
                                        <input class="customFormInput" required type="text">
                                    </div>
                                    <div>
                                        <label for="input">Şifreniz</label>
                                        <input class="customFormInput" required type="text">
                                    </div>
                                    <div>
                                        <label for="input">Şifreniz Doğrulama</label>
                                        <input class="customFormInput" required type="text">
                                    </div>
                                </div>
                                <div class="tab">
                                    <div>
                                        <label for="input">Cinsiyetiniz</label>
                                        <select class="customFormInput">
                                            <option value="">Erkek</option>
                                            <option value="">Kadın</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="input">Doğum Tarihiniz</label>
                                        <input class="customFormInput" required type="date">
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
                    <a href="">
                        <img src="https://via.placeholder.com/1000x1030?text=zate+üye+misin+Tarzında+bir+görsel" class="img-responsive center-block" style="margin: auto;" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')

    <script>
        $("#uye").click(function(){

            $("#registerform").text( "@include('site.partials.register.user')" );

        });



        function showHideDiv() {
            var x = document.getElementById("showHideID").options[document.getElementById("showHideID").selectedIndex].value;
            if (x == 1) {
                document.getElementById('write').innerHTML = " ";
                document.getElementById('write').innerHTML = '<div class="col-md-6"><label for="input">Şahıs Adı</label><input class="customFormInput" required type="text" placeholder="Beyler"></div><div class="col-md-6"><label for="input">Şahıs Soyadı</label><input class="customFormInput" required type="text" placeholder="İbrahimov"></div><div class="col-md-6"><label for="input">TC Kimlik No</label><input class="customFormInput" required type="text" placeholder="İbrahimov"></div><div class="col-md-6"><label for="input">Şirket Ünvanı</label><input class="customFormInput" required type="text" placeholder="İbrahimov"></div>';
            } else if (x == 2) {
                document.getElementById('write').innerHTML = " ";
                document.getElementById('write').innerHTML = '<div class="col-md-6"><label for="input">Şirket Türü</label><select class="customFormInput"><option value="1">Anonim</option><option value="2">Limited</option><option value="2">Hisseli Komandit</option></select></div><div class="col-md-6"><label for="input">Tiacaret Odası</label><input class="customFormInput" required type="text" placeholder="İbrahimov"></div><div class="col-md-6"><label for="input">Ticaret Sicil Numarası</label><input class="customFormInput" required type="text" placeholder="İbrahimov"></div><div class="col-md-6"><label for="input">Şirket Ünvarı</label><input class="customFormInput" required type="text" placeholder="İbrahimov"></div>';
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
    </script>
@endsection
