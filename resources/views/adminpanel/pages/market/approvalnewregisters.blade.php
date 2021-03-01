@extends('adminpanel.index')

@section('css')

@endsection


@section('content')
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">Onay bekleyen mağazalar</h5>
        </div>

    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default border-panel card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Kayıtlılar Listesi</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="datable_1" class="table table-hover display  pb-30" >
                                    <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Mağaza Adı</th>
                                        <th>Kullanıcı Adı</th>
                                        <th>Email</th>
                                        <th>Üyelik Türü</th>
                                        <th>Kayıt Tarihi</th>
                                        <th>İşlemler</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                @foreach($stores as $store)
                                    <tr>
                                        <th>{{$store->id}}</th>
                                        <td>{{$store->market_name}}</td>
                                        <td>{{$store->user_name}}</td>
                                        <td>{{$store->email}}</td>
                                        <td>{{$store->user_type=='personal'?'Şahıs':'Şirket'}}</td>
                                        <td>{{$store->updated_at}}</td>
                                        <td>
                                            <div class="button-list">
                                                <a href="{{route('storeShow',$store->id)}}"  class="btn btn-primary btn-icon-anim btn-square btn-sm"><i class="fa fa-eye"></i></a>
                                                <button class="btn btn-default btn-icon-anim btn-square btn-sm"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-danger  btn-icon-anim btn-square btn-sm"><i class="fa fa-ban"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Mağaza Adı</th>
                                        <th>Kullanıcı Adı</th>
                                        <th>Email</th>
                                        <th>Üyelik Türü</th>
                                        <th>Kayıt Tarihi</th>
                                        <th>İşlemler</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->

@endsection


@section('js')

@endsection
