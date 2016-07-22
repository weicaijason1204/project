@extends('layouts.app')
@section('content')
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; Hospital 列表
</div>
<div>
    <a href="{{url('admin/hospital/create')}}">新增</a>
</div>
<form action="#" method="post">
    <div class="result_wrap">
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr >
                    <th class="tc">ID</th>
                    <th>名称</th>
                    <th>等级</th>
                </tr>
                @foreach($hospitals as $hospital)
                    <tr>
                        <td>{{$hospital->id}}</td>
                        <td>{{$hospital->name}}</td>
                        <td>{{$hospital->grading}}</td>
                        <td>
                            <a href="{{url('admin/hospital/'.$hospital->id.'/edit')}}">修改</a>
                        </td>
                        <td>
                            <form action="{{url('admin/hospital/'.$hospital->id)}}" method="POST">
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
