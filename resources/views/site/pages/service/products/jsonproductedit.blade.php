

@extends('index')

@section('css')

@endsection

@section('content')
    @include('pages.market.partial.breadcrumb')
    <!-- product tab start -->
    <div class="my-account pt-80 pb-80">
        <div class="container-center ">
            <div class="row">
                <div class="col-12">
                    <h3 class="title text-capitalize mb-30 pb-25">Ürün Düzenleme Sayfası</h3>
                    <div class="myaccount-content">
                        <div class="account-details-form">



                            <form action="{{route('market-create-product')}}" method="post" enctype="multipart/form-data">
                                <div class="row" id="categories">
{{--                                    <input name="category" type="hidden">--}}
{{--                                    <input name="subcategory" type="hidden">--}}
{{--                                    <input name="secondsubcategory" type="hidden">--}}
                                    @php
                                        $category = json_decode($product->category );
                                    @endphp
                                    <div class="col-3 mb-30">
                                        <label for="category"><strong>Ürün Kategorisi</strong></label>
                                        <select  name="category" id="category" class="form-control">
{{--                                            @foreach($categories as $cat)--}}
{{--                                                <option {{$category->category==$cat->id ? 'selected'  : ''}} value="{{$cat->id}}">{{$cat->name}}</option>--}}
{{--                                            @endforeach--}}
                                        </select>
                                    </div>
                                    @if($category->subcategory != null)
                                        <div class="col-3 mb-30" id="subcategories">

                                            <label> </label>

                                        </div>
                                    @endif
                                    @if($category->secondsubcategory != null)
                                        <div class="col-3 mb-30" id="secondsubcategories">
                                            <label> </label>
                                        </div>
                                    @endif
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- product tab end -->

@endsection


@section('js')

    <script>
       categoriesjson = {!!utf8_decode( $categories )!!};
       categories = JSON.parse(categoriesjson) ;
console.log(categories)

       utf8_decode()
       utf8_decode()
    </script>
@endsection
