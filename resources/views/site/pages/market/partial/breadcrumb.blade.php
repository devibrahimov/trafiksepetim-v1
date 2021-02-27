


@if(auth()->guard('market') != NULL)

    <!-- breadcrumb-section start -->
    <nav class="breadcrumb-section theme1   pt-110 pb-110"
         style="height:400px;background: url('/storage/uploads/thumbnail/market_cover_photo/medium/{{auth()->guard('market')->user()->market_cover_photo}}') no-repeat;
             background-size: cover;background-position: center center !important;"
            {{-- style="background-image: url('{{}} ')"--}}
    >
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-15">
                        <h2 class="title text-dark text-capitalize">{{auth()->guard('market')->user()->user_name}}</h2>
                    </div>
                </div>
                <div class="col-12">
                    <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Ana Sayfa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Log in to your account </li>
                    </ol>
                </div>
            </div>
        </div>
    </nav>
    <!-- breadcrumb-section end -->



@else


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

@endif



