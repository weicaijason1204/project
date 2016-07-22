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

                    <form action="{{ URL('admin/doctor/'.$doctor->id) }}" method="POST" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PUT">
                       {{csrf_field()}}
                        <img src="{{$doctor->avatar}}">
                        <br>
                        <input type="file" name="avatar" class="form-control" value="{{ $doctor->avatar }}" >
                        <br>
                        <input name="name" class="form-control" value="{{ $doctor->name }}" >
                        <br>
                        <input name="summary" class="form-control" value="{{ $doctor->summary }}" >
                        <br>
                        <input name="content" class="form-control" value="{{ $doctor->content }}" >
                        <br>
                        <input name="appellation" class="form-control" value="{{ $doctor->appellation }}" >
                        <br>
                        <input name="phone" class="form-control" value="{{ $doctor->phone }}" >
                        <br>
                        <input name="password" class="form-control" value="{{ $doctor->password }}" >
                        <br>
                        <input type="submit" name="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection