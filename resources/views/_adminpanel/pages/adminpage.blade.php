@extends('adminpanel.index')

@section('css')
@endsection


@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-default border-panel card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark">default form</h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="form-wrap">
                        <form action="{{route('adminstore')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="control-label mb-10" for="email_de">isim:</label>
                                <input type="text" name="name" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10" for="email_de">email:</label>
                                <input type="email" name="email" class="form-control" id="email_de">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10" for="pwd_de">Şifre:</label>
                                <input type="password" name="password" class="form-control" id="pwd_de">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10" for="pwd_de">Şifre Tekrar:</label>
                                <input type="password" name="password_confirmation" class="form-control" id="pwd_de">
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-orange btn-anim"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
@endsection
