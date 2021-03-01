@extends('adminpanel.index')

@section('css')
@endsection


@section('content')
    <!-- Table Hover -->
    <div class="col-sm-12">
        <div class="panel panel-default border-panel card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">Alt Kategori Listesi</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                 <div class="row">
                     <div class="col-md-3 col-xs-12 mt-15">
                         <a href="{{route('createnewProductsubcategory',$id)}}" class="btn btn-info btn-rounded btn-block btn-anim"><i class="fa fa-pencil"></i><span class="btn-text">Yeni Kategori Ekle</span></a>
                     </div>
                 </div>
                    <div class="table-wrap mt-40">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kategori adı</th>
                                    <th>Etkileşim İstatistiği</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td><span class="peity-bar" data-width="90" data-peity='{ "fill": ["#ed8739"], "stroke":["#ed8739"]}' data-height="40">0,-3,-2,-4,5,-4,3,-2,5,-1</span> </td>
                                        <td>
                                            <div class="button-list">
                                                 <a href="{{route('updateProductsubcategory',$category->id)}}" class="btn btn-default btn-icon-anim btn-square btn-sm"><i class="fa fa-pencil"></i></a>
                                                <button class="btn btn-danger  btn-icon-anim btn-square btn-sm"><i class="fa fa-ban"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Table Hover -->
@endsection


@section('js')
@endsection
