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
                <div   class="scroll-tabs wow fadeInUp col-md-5">
                    <div class="more-info-tab clearfix ">
                        <h4>Reklam Başvurusu Formu</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet,
                            Lorem ipsLorem ipsum dolor sit amet, consectetur adipiscing elit
                            um dolor sit amet, consectetur adipiscing elitconsectetur adipiscing elit</p>

                        <p>Ana Sayfa Baner ölçüleri kaçolacağı bilgileri sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet,
                            Lorem ipsLorem ipsum dolor sit amet, consectetur adipiscing elit
                            um dolor sit amet, consectetur adipiscing elitconsectetur adipiscing elit</p>

                        <p>Ürünler Sayfası Baner   ölçüleri kaçolacağı bilgileri sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet,
                            Lorem ipsLorem ipsum dolor sit amet, consectetur adipiscing elit
                            Lorem ipsLorem ipsum dolor sit amet, consectetur adipiscing elit
                            Lorem ipsLorem ipsum dolor sit amet, consectetur adipiscing elit
                            um dolor sit amet, consectetur adipiscing elitconsectetur adipiscing elit</p>

                        <p>Mağazalar Baner ölçüleri kaçolacağı bilgileri sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet,
                            Lorem ipsLorem ipsum dolor sit amet, consectetur adipiscing elit
                            um dolor sit amet, consectetur adipiscing elitconsectetur adipiscing elit</p>

                        <p>Trend Ürünler Baner ölçüleri kaçolacağı bilgilerisit amet, consectetur adipiscing elitLorem ipsum dolor sit amet,
                            Lorem ipsLorem ipsum dolor sit amet, consectetur adipiscing elit
                            Lorem ipsLorem ipsum dolor sit amet, consectetur adipiscing elit
                            um dolor sit amet, consectetur adipiscing elitconsectetur adipiscing elit</p>


                    </div>
                </div>
                <div class="scroll-tabs wow fadeInUp  col-md-7">
                    <div class="more-info-tab clearfix ">

                        <div class="row">


                                <div class="col-md-6 ">

                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputName">Ad <span>*</span></label>
                                            <input type="email" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="">
                                        </div>

                                </div>
                                <div class="col-md-6 ">

                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputName">Soyad <span>*</span></label>
                                            <input type="email" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="">
                                        </div>

                                </div>
                                <div class="col-md-6">

                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputEmail1">E-Posta <span>*</span></label>
                                            <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
                                        </div>

                                </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Reklam Sayfası<span>*</span></label>
                                    <select class="form-control unicase-form-control text-input" >
                                        <option value="Ana Sayfa Baner">Ana Sayfa Baner</option>
                                        <option value="Ürünler Sayfası Baner">Ürünler Sayfası Baner</option>
                                        <option value="Mağazalar Baner">Mağazalar Baner</option>
                                        <option value="Trend Ürünler Baner">Trend Ürünler Baner</option>
                                    </select>
                                </div>
                            </div>
                                <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputEmail1">Reklam İçin Resim Dosyası <span>*</span></label>
                                            <input type="file" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
                                        </div>

                                </div>
                                <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputEmail1">Yönlendirilecek Link Adresi <span>*</span></label>
                                            <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
                                        </div>

                                </div>


                                <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputComments">Mesajınız <span>*</span></label>
                                            <textarea class="form-control unicase-form-control" id="exampleInputComments"></textarea>
                                        </div>

                                </div>
                                <div class="col-md-12 outer-bottom-small m-t-20">
                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Formu Gönder</button>
                                </div>

                            </div><!-- /.contact-page -->
                    </div>
                 </div>
            </div>
        </div>
    </div>
    <!-- product tab end -->
@endsection


@section('js')

@endsection
