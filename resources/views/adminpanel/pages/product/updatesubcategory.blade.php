@extends('adminpanel.index')

@section('css')
@endsection


@section('content')
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default border-panel card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Yeni Ürün Kategorini Güncelle</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap">
                            <form action="{{route('updateProductsubcategory',$category->id)}}"  method="POST" class="form-horizontal">
                                <div class="form-group mb-0">
                                    @method('PUT')
                                    @csrf
                                    <div class="col-sm-12">
                                        <div class="row">
                                          <div class="col-md-12">
                                              <div class="input-group mb-15">
                                              <input type="text" name="categoryname" class="form-control" value="{{$category->name}}">
                                                  <span class="input-group-btn">

                                                  <button type="submit" class="btn btn-orange btn-anim"><i class="icon-rocket"></i><span class="btn-text">Güncelle</span></button>
                                                  </span>
                                              </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
