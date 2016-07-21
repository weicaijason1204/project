@extends('layouts.app')

@section('content')
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; 修改商品
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">修改 Page</div>

                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ URL('admin/reservation/'.$reservation->id) }}" method="POST" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PUT">
                       {{csrf_field()}}
                        <input name="name" class="form-control" value="{{ $reservation->name }}" >
                        <br>
                        <input name="phone" class="form-control" value="{{ $reservation->phone }}" >
                        <br>
                        <input name="password" class="form-control" value="{{ $reservation->password }}" >
                        <br>
                        <input name="wechat" class="form-control" value="{{ $reservation->wechat }}" >
                        <br>
                        <input name="imgs" class="form-control" value="{{ $reservation->imgs }}" >
                        <br>
                        <input name="describe" class="form-control" value="{{ $reservation->describe }}" >
                        <br>
                        <input name="age" class="form-control" value="{{ $reservation->age }}" >
                        <br>
                        <input name="gender" class="form-control" value="{{ $reservation->gender }}" >
                        <br>
                        <input name="smoking" class="form-control" value="{{ $reservation->smoking }}" >
                        <br>
                        <input name="city" class="form-control" value="{{ $reservation->city }}" >
                        <br>
                        <input name="discovery_time" class="form-control" value="{{ $reservation->discovery_time }}" >
                        <br>
                        <input name="situation" class="form-control" value="{{ $reservation->situation }}" >
                        <br>
                        <input name="earnest_money" class="form-control" value="{{ $reservation->earnest_money }}" >
                        <br>
                        <input name="report" class="form-control" value="{{ $reservation->report }}" >
                        <br>
                        <input type="submit" name="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection