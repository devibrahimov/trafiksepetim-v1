@extends('index')
@section('content')

    <!-- breadcrumb-section start -->
    <nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-15">
                        <h2 class="title text-dark text-capitalize">login</h2>
                    </div>
                </div>
                <div class="col-12">
                    <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Log in to your account </li>
                    </ol>
                </div>
            </div>
        </div>
    </nav>
    <!-- breadcrumb-section end -->
    <!-- product tab start -->
    <div class="my-account pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="title text-capitalize mb-30 pb-25">Marekt Hesap Giriş Sayfası</h3>
                    <form method="post" action="{{route('marketlogin')}}" class="log-in-form">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-md-3 col-form-label">Email</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" id="staticEmail">
                            </div>
                        </div>
                        @csrf
                        <div class="form-group row">
                            <label for="inputPassword" class="col-md-3 col-form-label">Şifre</label>
                            <div class="col-md-6">
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="password" class="form-control" name="password" id="inputPassword">
                                    <div class="input-group-prepend">
                                        <button type="button" class="input-group-text  theme-btn--dark1 btn--md show-password">show</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="form-group row pb-3 text-center">
                            <div class="col-md-6 offset-md-3">
                                <div class="login-form-links">
                                    <a href="#" class="for-get">Forgot your password?</a>
                                    <div class="sign-btn">
                                        <button type="submit" class="btn theme-btn--dark1 btn--md">Sign in</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row text-center mb-0">
                            <div class="col-12">
                                <div class="border-top">
                                    <a href="register.html" class="no-account">No account? Create one here</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- product tab end -->
@endsection
