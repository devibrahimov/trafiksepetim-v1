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
                        <h6 class="panel-title txt-dark">Yeni Ürün Kategorisi Ekle</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap">
                            <form action="{{route('createnewProductsubcategory',$id)}}"  method="POST" class="form-horizontal">
                                <div class="form-group mb-0">
                                    <div class="col-sm-12">
                                        <div class="row">
                                          <div class="col-md-12">
                                              <div class="input-group mb-15">
                                                  <input type="text" id="example-input2-group2" name="categoryname" class="form-control" placeholder="Kategori adı">
                                                  <input type="hidden"  name="parent_id" value="{{$id}}">
                                                  <span class="input-group-btn">
												@csrf
                                                      <button type="submit" class="btn btn-orange btn-anim"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>
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
