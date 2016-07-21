@extends('layouts.app')
@section('content')
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; Doctor 列表
</div>
<div>
    <a href="{{url('admin/doctor/create')}}">新增</a>
</div>
<form action="#" method="post">
    <div class="result_wrap">
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr >
                    <th class="tc">ID</th>
                    <th>头像</th>
                    <th>名字</th>
                    <th>简介</th>
                    <th>详情</th>
                    <th>职称</th>
                    <th>手机</th>
                    <th>密码</th>
                </tr>
                @foreach($doctors as $doctor)
                <tr>
                    <td>{{$doctor->id}}</td>
                    <td>{{$doctor->avatar}}</td>
                    <td>{{$doctor->name}}</td>
                    <td>{{$doctor->summary}}</td>
                    <td>{{$doctor->content}}</td>
                    <td>{{$doctor->appellation}}</td>
                    <td>{{$doctor->phone}}</td>
                    <td>{{$doctor->password}}</td>
                    <td>
                        <a href="{{url('admin/doctor/'.$doctor->id.'/edit')}}">修改</a>
                    </td>
                    <td>
                        <form action="{{url('admin/doctor/'.$doctor->id)}}" method="POST">
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
