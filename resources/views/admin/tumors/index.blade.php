@extends('layouts.app')
@section('content')
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; Tumor 列表
</div>
<div>
    <a href="{{url('admin/tumor/create')}}">新增</a>
</div>
<form action="#" method="post">
    <div class="result_wrap">
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr >
                    <th class="tc">ID</th>
                    <th width=20 height=20>图片</th>
                    <th>名称</th>
                    <th>操作</th>
                </tr>
                @foreach($tumors as $tumor)
                <tr>
                    <td>{{$tumor->id}}</td>
                    <td><img src="/"/></td>
                    <td>{{$tumor->name}}</td>
                    <td>
                        <a href="{{url('admin/tumor/'.$tumor->id.'/edit')}}">修改</a>
                    </td>
                    <td>
                        <form action="{{url('admin/tumor/'.$tumor->id)}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button>删除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->

@endsection
