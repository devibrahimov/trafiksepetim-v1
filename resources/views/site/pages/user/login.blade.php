@extends('site.index')
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
                    <h3 class="new-product-title center-block loginHeading">Giriş Yap</h3>
                    <div class="loginTabsContent center-block">
                        <ul class="nav nav-tabs nav-tab-line text-center" id="loginForms">
                            <li class="loginTabSwitch active" >
                                <a data-transition-type="backSlide" href="#uye"   data-toggle="tab">Üye</a>
                            </li>
                            <li class="loginTabSwitch" >
                                <a data-transition-type="backSlide" href="#magaza"   data-toggle="tab">Mağaza</a>
                            </li>
                            <li class="loginTabSwitch">
                                <a data-transition-type="backSlide"  href="#hizmetveren" data-toggle="tab">Hizmet Veren</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="tab-content outer-top-xs">
                    <div class="tab-pane in active center-block loginFormContent" id="uye">
                        <form  class="customForm80" name="userpostform"  method="post" action="{{route('userloginpost')}}">
                            <div>
                                <label for="input">Üye E-mail Adresi </label>
                                <input class="customFormInput"name="email" required type="email" placeholder="username@mail.com">
                            </div>
                            <div>
                                <label for="input">Şifre</label>
                                <input class="customFormInput"name="password"  required type="password" placeholder="******">
                            </div>
                            @csrf
                            <div>
                                <input type="checkbox" id="rememberMe" name="rememberMe" checked>
                                <label for="rememberMe">Beni Hatırla</label>
                                <a href="" class="pull-right">
                                    Şifremi Unuttum
                                </a>
                            </div>
                            <button type="submit" name="userpostform" class="customFormButton pull-right"> Giriş Yap </button>
                        </form>
                    </div>
                    <div class="tab-pane in center-block loginFormContent" id="magaza">
                        <form action="{{route('marketlogin')}}" method="post" class="customForm80">
                            <div>
                                <label for="input">Mağaza E-mail Adresi</label>
                                <input class="customFormInput" name="email" required type="text" placeholder="username@mail.com">
                            </div>
                            @csrf
                            <div>
                                <label for="input">Şifre</label>
                                <input class="customFormInput" required name="password" type="password" placeholder="******">
                            </div>
                            <div>
                                <input type="checkbox" id="rememberMe" name="rememberMe" checked>
                                <label for="rememberMe">Beni Hatırla</label>
                                <a href="" class="pull-right">
                                    Şifremi Unuttum
                                </a>
                            </div>
                            <button type="submit" class="customFormButton pull-right"> Giriş Yap </button>
                        </form>
                    </div>
                    <div class="tab-pane in center-block loginFormContent" id="hizmetveren">
                        <form action="{{route('servicelogin')}}" method="post" class="customForm80">
                            <div>
                                <label for="input">Hizmet Veren E-mail Adresi </label>
                                <input class="customFormInput" name="email" required type="text" placeholder="username@mail.com">
                            </div>
                            @csrf
                            <div>
                                <label for="input">Şifre</label>
                                <input class="customFormInput" name="password" required type="password" placeholder="******">
                            </div>
                            <div>
                                <input type="checkbox" id="rememberMe" name="rememberMe" checked>
                                <label for="rememberMe">Beni Hatırla</label>
                                <a href="" class="pull-right">
                                    Şifremi Unuttum
                                </a>
                            </div>
                            <button type="submit" class="customFormButton pull-right"> Giriş Yap </button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-5">
                    <img src="{{env('APP_URL')}}/site/img/trafik-sepetim-girisyap.png" class="img-responsive"  alt="trafik sepetim giriş formu" title="trafik sepetim giriş formu">
            </div>
        </div>
    </div>
</div>
<!-- product tab end -->
@endsection


@section('js')

@endsection
