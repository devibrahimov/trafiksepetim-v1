@php
    use App\Http\Controllers\Site\Market\MarketProcessController ;
   // $service = (new ServiceProductController())->getPosts(auth()->guard('service')->user()->id);
    //print_r($market);die;
@endphp

@extends('site.index')

@section('css')
    <link rel="stylesheet" href="site/css/datatables.css">
    <link rel="stylesheet" href="site/css/component-custom-switch.css">
    <link rel="stylesheet" href="/ckeditor/contents.css">

    <style>
        .paginate_button {
            margin: 1px!important;
            padding: 1px!important;
            border: none!important;
        }
        .paginate_button a {
            margin: none!important;
            padding: 1px!important;
            border: none!important;
        }
        .pagination>li:first-child>a,
        .pagination>li:first-child>span {
            margin-right: 10px;
        }
        .pagination>.disabled>span,
        .pagination>.disabled>span:hover,
        .pagination>.disabled>span:focus,
        .pagination>.disabled>a,
        .pagination>.disabled>a:hover,
        .pagination>.disabled>a:focus {
            color: #777;
            cursor: not-allowed;
            background-color: #fff;
            border-color: #ddd;
        }
        .pagination>.active>span,
        .pagination>.active>span:hover,
        .pagination>.active>span:focus,
        .pagination>.active>a,
        .pagination>.active>a:hover,
        .pagination>.active>a:focus {
            color: #777;
            background-color: #fff;
            border-color: #ddd;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #777;
            background-color: #fff;
            border-color: #ddd;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: white !important;
            border: 1px solid #fff!important;
            background-color: #fff;
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fff), color-stop(100%, #fff));
            background: -webkit-linear-gradient(top, #fff 0%, #fff 100%);
            background: -moz-linear-gradient(top, #fff 0%, #fff 100%);
            background: -ms-linear-gradient(top, #fff 0%, #fff 100%);
            background: -o-linear-gradient(top, #fff 0%, #fff 100%);
            background: linear-gradient(to bottom, #fff 0%, #fff 100%);
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button:active {
            outline: none;
            background-color: #fff;
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fff), color-stop(100%, #fff));
            background: -webkit-linear-gradient(top, #fff 0%, #fff 100%);
            background: -moz-linear-gradient(top, #fff 0%, #fff 100%);
            background: -ms-linear-gradient(top, #fff 0%, #fff 100%);
            background: -o-linear-gradient(top, #fff 0%, #fff 100%);
            background: linear-gradient(to bottom, #fff 0%, #fff 100%);
            box-shadow: inset 0 0 3px #fff;
        }

    </style>
@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="index.html">Anasayfa</a></li>
                    <li class='active'>Handbags</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="body-content outer-top-xs">
        <div class="container-fluid p-0">
            <div class="col-md-12 magazaNav">
                @include('site.pages.service.partial.navbar')
            </div>
        </div>

        <div class='container'>
            <div class='row'>
                <div class="col-md-3 p-0">
                    <div class="magazaDiv">
                        <span class="magazaH1">toplam ürün sayısı</span>
                        <span class="magazaSatisGelir"> <b>{{count($services)}} </b></span>
                    </div>
                </div>
                <div class="col-md-3 p-0">
                    <div class="magazaDiv">
                        <span class="magazaH1">stokta olmayan ürünler</span>

                        <span class="magazaSatisGelir"><b>5</b></span>
                    </div>
                </div>
                <div class="col-md-3 p-0">
                    <div class="magazaDiv">
                        <span class="magazaH1">Yayında Olmayan Ürünler</span>
                        <span class="magazaSatisGelir"><b>495</b></span>
                    </div>
                </div>
                <div class="col-md-3 p-0">
                    <div class="magazaDiv">
                        <span class="magazaH1">indirimde olan ürünler</span>
                        <span class="magazaSatisGelir"><b>500</b></span>
                    </div>
                </div>
                <div class="col-md-12 p-0">
                    <div class="magazaDiv">
                        <span class="magazaH1">tüm ürünler
                            <a  href="{{route('service-create-product')}}" class="btn btn-primary btn-lg pull-right mb-3" style="background-color: green;" >
                                <span class="fa fa-shopping-basket"> </span> Ürün Ekle  </a>
                        </span>
                        <div class="magazaNotify">
                            <table id="urunYonetimi" class="display" style="width:100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th width="60%">Ürün Adı</th>
                                    <th>Resim</th>
                                    <th>Fiyat</th>
                                    <th>Durumu</th>
                                    <th>İşlem</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($services))
                                 @foreach($services as $service)
                                    @php $image = json_decode($service->images) @endphp

                                    <tr>
                                    <td> #{{$service->id}}</td>
                                        <td>{{$service->name}}</td>
                                        <td  >
                                            <img src="/storage/uploads/thumbnail/service/{{$service->provider_id}}/posts/small/{{$image->cover}}" width="50px" alt="">
                                            {{--  <img src="http://via.placeholder.com/50" alt="">--}}
                                        </td>
                                        <td>{{$service->price}} ₺</td>

                                        <td>
                                            <div class="custom-switch custom-switch-label-onoff custom-switch-xs pl-0">
                                                <input class="custom-switch-input showCheckoutHistory" data-productid="{{$service->id}}"
                                                       {{$service->status ==0? '' : 'checked'}}  id="example_{{$service->id}}" type="checkbox">
                                                <label class="custom-switch-btn" for="example_{{$service->id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#detay">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </button>
                                            <a href="{{route('market-edit-product', $service->id )}}" class="btn btn-primary btn-lg" style="background-color: green;"  >
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            <button   onclick=" event.preventDefault(); document.getElementById('delete-product').submit()" type="button" class="btn btn-primary btn-lg" style="background-color: red;">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>

                                            <form action="{{route('service-delete-post', $service->id )}}" method="post" id="delete-product" style="display: none;">

                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="detay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel">Ürün Adı</h3>
                </div>
                <div class="modal-body">
                    <div class="blog-post">
                        <div class="row mb-5">
                            <div class="col-xs-12 pull-left">
                                <h4>Ürün Kategorisi</h4>
                            </div>
                        </div>
                        <div class="row mt-5 recursiveCategoryContent">
                            <div class="col-md-4">
                                <input class="customFormInput" required type="text" disabled value="İbrahimov">
                            </div>
                            <div class="col-md-4">
                                <input class="customFormInput" required type="text" disabled value="İbrahimov">
                            </div>
                            <div class="col-md-4">
                                <input class="customFormInput" required type="text" disabled value="İbrahimov">
                            </div>
                            <div class="col-md-12">
                                <h4 class="mt-5 pt-4">Ürün Bilgileri</h4>
                                <form action="#">
                                    <div class="col-md-12 mb-2 ml-4 d-flex">
                                        <div class="col-auto p-2 d-flex filePreview">
                                            <img class="img-responsive MaxW50" src="http://via.placeholder.com/100" alt="">
                                            <img class="img-responsive MaxW50" src="http://via.placeholder.com/100" alt="">
                                            <img class="img-responsive MaxW50" src="http://via.placeholder.com/100" alt="">
                                            <img class="img-responsive MaxW50" src="http://via.placeholder.com/100" alt="">
                                            <img class="img-responsive MaxW50" src="http://via.placeholder.com/100" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Ürün Adı</label>
                                        <input class="customFormInput" required type="text" disabled value="İbrahimov">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input">Açıklama</label>
                                        <input class="customFormInput" required type="text" disabled value="İbrahimov">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="input">Fiyat</label>
                                        <input class="customFormInput" required type="text" disabled value="İbrahimov">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="input">İndirimli Fiyat</label>
                                        <input class="customFormInput" required type="text" disabled value="İbrahimov">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="input">Stok Adeti</label>
                                        <input class="customFormInput" required type="text" disabled value="İbrahimov">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="input" class="d-block">Açıklama</label>
                                        <textarea name="" id="" cols="30" rows="10" disabled>lorem</textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Vazgeç</button>
                    <button type="button" class="btn btn-primary">Ekle</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="site/js/chart.js">

    </script><script src="ckeditor/ckeditor.js"></script>
    <script src="site/js/datatables.js"></script>
    <script src="site/js/dataTables.rowReorder.min.js"></script>
    <script src="site/js/dataTables.responsive.min.js"></script>

    <script>
        $(document).ready(function() {

            $('.showCheckoutHistory').click(function() {

                if ($(this).prop('checked')) {
                    dataprid = $(this).attr('data-productid');
                    $.ajax({
                        'method'    : 'post',
                        'url'       : '{{route('servicepoststatus')}}',
                        data:{
                            'postid' :dataprid,
                            'status'    : 1,
                            '_token'    : '{{csrf_token()}}'
                        },
                        success: function (data) {

                        }
                    })
                }
                else {
                    dataprid = $(this).attr('data-productid');

                    $.ajax({
                        'method'    : 'post',
                        'url'       : '{{route('servicepoststatus')}}',
                        data:{
                            'postid' : dataprid,
                            'status'    :   0,
                            '_token'    : '{{csrf_token()}}'
                        },
                        success: function (data) {

                        }
                    })
                }
            });

            $('#urunYonetimi').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                pageLength: 10,
                oLanguage: {
                    "sLengthMenu": "Görüntülenen _MENU_ Kayıt",
                    "sSearch": "Ara"
                },
                language: {
                    "info": "Gösterilen Kayıt _END_ Toplam Kayıt _TOTAL_",
                    "paginate": {
                        "previous": "Geri",
                        "next": "İleri"
                    }
                }
            });
        });



    </script>
@endsection
