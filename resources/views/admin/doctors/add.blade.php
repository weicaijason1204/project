@extends('layouts.app')

@section('content')
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
</div>
<!--面包屑导航 结束-->


<div class="result_wrap">
    <form action="{{url('admin/doctor')}}" method="post" enctype="multipart/form-data">
        <label for="avatar">头像</label>
        <input type="file" name="avatar"><br/>
        <label for="name">名称</label>
        <input type="text" name="name"><br/>
        <label for="summary">简介</label>
        <input type="text" name="summary"><br/>
        <label for="contents">详情</label>
        <input type="text" name="contents"><br/>
        <label for="appellation">职称</label>
        <input type="text" name="appellation"><br/>
        <label for="phone">电话</label>
        <input type="text" name="phone"><br/>
        <label for="password">密码</label>
        <input type="password" name="password"><br/>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="submit" name="submit" value="Submit">
    </form>
</div>

@endsection