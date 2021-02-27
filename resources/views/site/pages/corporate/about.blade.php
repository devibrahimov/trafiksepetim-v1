@extends('site.index')

@section('css')
@endsection


@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('home')}}">Anasayfa</a></li>
                    <li class='active'>Hakkımızda</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="blog-page">
                    <div class="col-md-12">
                        <div class="blog-post wow fadeInUp">
                            <img class="img-responsive" src="assets/images/blog-post/blog_big_01.jpg" alt="">
                            <div class="row">
                                <div class="col-md-8">
                                    <h1>Nemo enim ipsam voluptatem quia voluptas sit aspernatur</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                                </div>
                                <div class="col-md-4 sidebar">

                                    <div class="sidebar-module-container">
                                          <!-- ============================================== CATEGORY : END ============================================== -->						<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                                            <h3 class="section-title">Vizyonumuz</h3>
                                            <div class="tab-content" style="padding-left:0">
                                                <div class="tab-pane active m-t-20" id="popular">
                                                    <div class="blog-post inner-bottom-30 " >
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet,
                                                            Lorem ipsLorem ipsum dolor sit amet, consectetur adipiscing elit
                                                            um dolor sit amet, consectetur adipiscing elitconsectetur adipiscing elit</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <h3 class="section-title">Misyonumuz</h3>
                                            <div class="tab-content" style="padding-left:0">
                                                <div class="tab-pane active m-t-20" id="popular">
                                                    <div class="blog-post inner-bottom-30 " >

                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet,
                                                            Lorem ipsLorem ipsum dolor sit amet, consectetur adipiscing elit
                                                            um dolor sit amet, consectetur adipiscing elitconsectetur adipiscing elit</p>

                                                    </div>

                                                </div>
                                            </div>

                                            <h3 class="section-title">Statejimiz</h3>
                                            <div class="tab-content" style="padding-left:0">
                                                <div class="tab-pane active m-t-20" id="popular">
                                                    <div class="blog-post inner-bottom-30 " >

                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet,
                                                            Lorem ipsLorem ipsum dolor sit amet, consectetur adipiscing elit
                                                            um dolor sit amet, consectetur adipiscing elitconsectetur adipiscing elit</p>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')
@endsection
