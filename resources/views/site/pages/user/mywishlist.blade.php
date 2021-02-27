@php
    use App\Http\Controllers\Helper\HelperController
@endphp
@extends('site.index')

@section('css')
@endsection


@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Shopping Cart</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="body-content mb-5">
        <div class="container">
            <div class="my-wishlist-page">
                <div class="row">
                    <div class="col-md-12 my-wishlist">
                        <div class="table-responsive">
                            <h1 class="heading-title">Beğendiklerim</h1>
                            @if(count($products)!=0)
                            <table class="table" id="favTable">
                                <thead>
                                <tr>
                                    <button onclick="clickonwishlistaddtocart()" class=" btn-sm btn-info"><i class="fa fa-shopping-bag"> </i> Toplu Sepete Ekle</button>
                                    <button onclick="clickonremovefromwishlist()" class=" btn-sm btn-warning"><i class="fa fa-shopping-bag"> </i> Toplu Sil</button>
                                </tr>
                                </thead>
                                <tbody>

                                 @foreach($products as $product)
                                    @php $image= json_decode($product->product->images); @endphp
                                <tr  delete="{{$product->product->id}}">
                                    <td class="col-md-2">
                                        <img src="{{env('APP_URL')}}/storage/uploads/thumbnail/malls/{{$product->product->market_id}}/productimages/small/{{$image->cover}}"
                                            style="width: 100px;height: 100px;object-fit: cover;" alt="imga"></td>
                                    <td class="col-md-7">
                                        <div class="product-name"><a href="#">{{$product->product->name}}</a></div>
                                        <div class="rating">
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star non-rate"></i>
                                            <span class="review">( 06 Reviews )</span>
                                        </div>
                                           @if($product->product->sale_price != NULL)
                                            <div class="price">
                                                {{$product->product->sale_price}}₺
                                                <span> {{$product->product->price}}₺ </span>
                                            </div>
                                         @endif
                                          @if($product->product->sale_price == NULL)
                                               <div class="price">
                                                 {{$product->product->price}}₺
                                               </div>
                                          @endif


                                    </td>
                                    <td class="col-md-2">
                                        <a class="btn-upper btn btn-primary addtocart" data-productId="{{$product->product->id}}|{{$product->product->name}}|{{$image->cover}}|{{$product->product->sale_price==NULL?$product->product->price:$product->product->sale_price}}|1|{{$product->product->market_id}}" >Sepete Ekle</a>
                                    </td>
                                    <td class="col-md-1 close-btn  cartrowTrash" data-id="{{$product->product->id}}">
                                        <a href="#" class=""><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                            @else
                                <div class="emptyS">Hiç mi beğendiğiniz ürün yok ? :(</div>
                            @endif
                        </div>
                    </div>			</div><!-- /.row -->
            </div><!-- /.sigin-in-->
           	</div><!-- /.container -->
    </div>

@endsection

@section('js')
    <script>

        function clickonwishlistaddtocart(){
            productswishlisttocart =Array() ;

            $('.addtocart').each(function (data) {
             var productdataid =  $(this).attr('data-productId');
             var productdata= productdataid.split("|");
                productswishlisttocart.push(productdata);
            })

            $.post(
                '{{route('wishlisttocart')}}',
                { products:productswishlisttocart,_token:'{{csrf_token()}}',
                  function(data){
                     clickonremovefromwishlist()

                  }
            })
        }

        function clickonremovefromwishlist(){

            ids = Array() ;

            $('.addtocart').each(function (data) {
                var productdataid =  $(this).attr('data-productId');
                var productdata= productdataid.split("|");
                ids.push(productdata[0]);
            })


            $.post(
                '{{route('wishlistdestroy')}}',
                { productsid:ids,
                    _token:'{{csrf_token()}}',
                    function(data){
                        console.log('sadasdasd')

                    }
                })
        }


        $('.cartrowTrash').click(function () {
            var id =  $(this).attr('data-id');
             $.ajax({
                 method : 'POST',
                 url : '{{route('productremovefromwishlist')}}',
                 data: {
                     'productid': id,
                    '_token'  :'{{csrf_token()}}'
                 },
                 success : function(data){

                     if(data.alerttype == 'info'){
                         toastr.info( data.message);
                     }
                     if(data.alerttype == 'success'){
                         $('tr[delete="'+id+'"]').remove();
                         var rowCount = $('#favTable tr').length;

                         if (rowCount == 1) {
                             $('#favTable').html('<div class="emptyS">Beğendiğiniz ürünleri listenizden çıkardınız :(</div>');
                         }
                         toastr.success(data.message);

                     }
                 }
             })
        })
    </script>
@endsection
