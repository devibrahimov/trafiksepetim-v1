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
    <div class="body-content outer-top-xs outer-bottom-xs">
        <div class="container">
            <div class="row ">
                <div class="shopping-cart" id="sepetTable">
                    <div class="shopping-cart-table  mb-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="cart-romove item">Sil</th>
                                    <th class="cart-description item">Resim</th>
                                    <th class="cart-product-name item">Ürün Bilgileri</th>
                                    <th class="cart-qty item">Adet</th>
                                    <th class="cart-total last-item">Fiyat</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $basketproducts = (new HelperController)->getbasketproducts()  @endphp
                                @php $baskettotalprice = (new HelperController)->baskettotalprice(auth()->user()->id)  @endphp
                                 @if(isset($basketproducts))
                                @foreach($basketproducts as $prdct)

                                <tr id="d1 ">
                                    <td class="romove-item  ">
                                        <i class="fa fa-trash-o fa-2x cartrowTrash" data-id="{{$prdct->id}}"></i>
                                    </td>
                                    <td class="cart-image">
                                        <a class="entry-thumbnail" href="#">
                                            <img src="/storage/uploads/thumbnail/malls/{{$prdct->market_id}}/productimages/small/{{$prdct->image}}" alt="" class="img-responsive mwimg">
                                        </a>
                                    </td>
                                    <td class="cart-product-name-info">
                                        <h4 class='cart-product-description'><a href="#">{{$prdct->name}}</a></h4>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="rating rateit-small"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart-product-quantity">
                                        <div class="quant-input">
                                            <button data-id="{{$prdct->id}}" class="quantyR"><i class="fa fa-minus-square-o" aria-hidden="true"></i></button>
                                            <input data-id="{{$prdct->id}}" data-value="{{$prdct->price}}" class="changeFn" style="position: relative;" type="text" id="plus{{$prdct->id}}"  value="{{$prdct->quantity}}">
                                            <button data-id="{{$prdct->id}}" class="quantyA"><i class="fa fa-plus-square-o" aria-hidden="true"></i>  </button>
                                        </div>
                                    </td>
                                    <td class="cart-product-grand-total"><span class="cart-grand-total-price" id="f{{$prdct->id}}" data-value="{{$prdct->price}}">{{$prdct->price}} ₺</span></td>
                                </tr>
                                @endforeach
                                 @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 pull-right p-0">
                        <div class="satinAlDiv">
                            Toplam <span class="inner-left-md" id="totalC" data-value="{{$baskettotalprice}}">{{$baskettotalprice}}₺</span>
                        </div>
                        <button type="submit" class="btn btn-primary checkout-btn satinAlButton">Satın Al</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(".quantyR").click(function() {
            id = $(this).attr('data-id');
            sVal = $("#" + id).val();
            iNum = parseInt(sVal);
            if (1 < iNum) {
                $("#" + id).val(iNum - 1);
                cF = Number($("#f" + id).attr('data-value'));
                iNumF = parseFloat(iNum - 1);
                $("#" + id).attr('data-value', (cF * iNumF));
                cT = Number($("#totalC").attr('data-value'));
                totalP = parseFloat(cT - cF);
                $('#totalC').text(totalP.toFixed(2) + "₺");
                $('#totalC').attr('data-value', totalP);
            } else {
                $("#" + id).val(1);
            }
        });

        $(".quantyA").click(function() {
            debugger;
            var id = $(this).attr('data-id');

            sVal = $("#plus" + id).val();

            alert(Number(sVal));
            iNum = parseInt(sVal);
            $("#" + id).val(iNum + 1);
            cF = Number($("#f" + id).attr('data-value'));
            iNumF = parseFloat(iNum + 1);
            $("#" + id).attr('data-value', (cF * iNumF));
            cT = Number($("#totalC").attr('data-value'));
            totalP = parseFloat(cT + cF);
            $('#totalC').text(totalP.toFixed(2) + "₺");
            $('#totalC').attr('data-value', totalP);
        });

        $(".changeFn").change(function() {
            id = $(this).attr('data-id');
            sVal = $("#" + id).val();
            iNum = parseInt(sVal);
            if (iNum > 0) {
                cF = Number($("#f" + id).attr('data-value'));
                cT = Number($("#totalC").attr('data-value'));
                cTt = Number($(this).attr('data-value'));
                totalCh = parseFloat(cF * iNum);
                totalP = parseFloat(cT + (totalCh - cTt));
                $(this).attr('data-value', totalCh);
                $('#totalC').text(totalP.toFixed(2) + "₺");
                $('#totalC').attr('data-value', totalP);
            } else {
                cF = Number($("#f" + id).attr('data-value'));
                cT = Number($("#totalC").attr('data-value'));
                cTt = Number($(this).attr('data-value'));
                totalCh = parseFloat(cF * 1);
                totalP = parseFloat(cT + (totalCh - cTt));
                $(this).attr('data-value', totalCh);
                $('#totalC').text(totalP.toFixed(2) + "₺");
                $('#totalC').attr('data-value', totalP);
                $(this).val(1);
            }
        });
 
        $(".cartrowTrash").click(function() {

            var id =  $(this).attr('data-id');
            $('#'+id).trigger('click');

            var cF =  $("#f" + id).attr('data-value') ;
            var sVal = $("#plus" + id).val();
            var iNum = parseFloat(sVal);
            var cT = Number($("#totalC").attr('data-value'));
            var totalP = parseFloat(cT - (cF * iNum));
            $('#totalC').text(totalP.toFixed(2) + "₺");
            $('#totalC').attr('data-value', totalP);

            $(this).parent().parent().remove();
            var rowCount = $('#sepetTable tr').length;

            if (rowCount == 1) {
                $('#sepetTable').html('<div class="emptyS">Sepentiniz Boş</div>');
            }
        });
    </script>
@endsection
