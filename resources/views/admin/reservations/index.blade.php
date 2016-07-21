@extends('layouts.app')
@section('content')
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; Reservation 列表
</div>
<div>
    <a href="{{url('admin/reservation/create')}}">新增</a>
</div>
<form action="#" method="post">
    <div class="result_wrap">
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr >
                    <th class="tc">ID</th>
                    <th>名字</th>
                    <th>电话</th>
                    <th>密码</th>
                    <th>微信</th>
                    <th>图片</th>
                    <th>描述</th>
                    <th>年龄</th>
                    <th>性别</th>
                    <th>抽烟史</th>
                    <th>居住地</th>
                    <th>发现时间</th>
                    <th>情况</th>
                    <th>订金</th>
                    <th>报告</th>
                </tr>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{$reservation->id}}</td>
                        <td>{{$reservation->name}}</td>
                        <td>{{$reservation->phone}}</td>
                        <td>{{$reservation->password}}</td>
                        <td>{{$reservation->wechat}}</td>
                        <td>{{$reservation->imgs}}</td>
                        <td>{{$reservation->desrcibe}}</td>
                        <td>{{$reservation->age}}</td>
                        <td>{{$reservation->gender}}</td>
                        <td>{{$reservation->smoking}}</td>
                        <td>{{$reservation->city}}</td>
                        <td>{{$reservation->discovery_time}}</td>
                        <td>{{$reservation->situation}}</td>
                        <td>{{$reservation->situation}}</td>
                        <td>{{$reservation->earnest_money}}</td>
                        <td>{{$reservation->report}}</td>
                        <td>
                            <a href="{{url('admin/reservation/'.$reservation->id.'/edit')}}">修改</a>
                        </td>
                        <td>
                            <form action="{{url('admin/reservation/'.$reservation->id)}}" method="POST">
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
