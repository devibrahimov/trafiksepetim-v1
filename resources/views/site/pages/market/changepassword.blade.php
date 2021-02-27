@extends('index')


@section('content')
<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-15">
                    <h2 class="title text-dark text-capitalize">my account</h2>
                </div>
            </div>
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">my account</li>
                </ol>
            </div>
        </div>
    </div>
</nav>
<!-- breadcrumb-section end -->
<!-- product tab start -->
<div class="my-account pt-80 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="title text-capitalize mb-30 pb-25">my account</h3>
            </div>
        @include('pages.market.partial.leftbar')

            <!-- My Account Tab Content Start -->
            <div class="col-lg-9 col-12 mb-30">
                <div class="tab-content" id="myaccountContent">

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade active show" id="account-info" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>Şifreni Değiştir</h3>

                            <div class="account-details-form">
                                <form action="{{route('changepasswd')}}" method="post" >
                                    <label for="password" class="col-md-3 col-form-label">Şifre <sup
                                            style="color: red;font-size: 12px;">*</sup></label>
                                    <div class="row">

                                          <div class="col-md-6">

                                              <div class="form-group row">

                                                              <div class="input-group mb-2 mr-sm-2">
                                                                  <input type="password" required class="form-control" value="{{old('password')}}"
                                                                         name="password" id="password">

                                                          </div>
                                                      </div>
                                          </div>
                                          <div class="col-md-6">
                                              <div class="form-group row">

                                                              <div class="input-group mb-2 mr-sm-2">
                                                                  <input type="password" required class="form-control" value="{{old('password')}}"
                                                                         name="password_confirmation" id="password">

                                                          </div>
                                                      </div>
                                          </div>
                                    </div>
                                    @csrf
                                    <div class="mt-2 pt-3">
                                        <button type="submit" class="btn theme-btn--dark3 btn--xl mt-5 mt-sm-0 rounded-5 ">
                                           ŞİFRENİ DEĞİŞTİR
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->
                </div>
            </div>
            <!-- My Account Tab Content End -->
        </div>
    </div>
</div>
<!-- product tab end -->
@endsection
