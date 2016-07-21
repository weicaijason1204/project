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

                    <form action="{{ URL('admin/tumor/'.$tumor->id) }}" method="POST" enctype="multipart/form-data">
                        <input name="_method" type="hidden" value="PUT">
                       {{csrf_field()}}
                        <img src="{{$tumor->imgs}}">
                        <input type="file" name="imgs" class="form-control" >
                        <br>
                        <input name="name" class="form-control" value="{{ $tumor->name }}" >
                        <br>
                        <input type="submit" name="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection