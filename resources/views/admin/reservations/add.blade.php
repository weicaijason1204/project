@extends('layouts.app')

@section('content')
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
</div>
<!--面包屑导航 结束-->


<div class="result_wrap">
    <form action="{{url('admin/reservation')}}" method="post" enctype="multipart/form-data">
        <label for="name">名称</label>
        <input type="text" name="name"><br/>
        <label for="phone">电话</label>
        <input type="text" name="phone"><br/>
        <label for="password">密码</label>
        <input type="text" name="password"><br/>
        <label for="wechat">微信</label>
        <input type="text" name="wechat"><br/>
        <label for="imgs">图片</label>
        <input type="file" name="imgs"><br/>
        <label for="describe">描述</label>
        <input type="text" name="describe"><br/>
        <label for="age">年龄</label>
        <input type="text" name="age"><br/>
        <label for="gender">性别</label>
        <input type="text" name="gender"><br/>
        <label for="smoking">吸烟</label>
        <input type="text" name="smoking"><br/>
        <label for="city">居住地</label>
        <input type="text" name="city"><br/>
        <label for="discovery_time">发现时间</label>
        <input type="text" name="discovery_time"><br/>
        <label for="situation">情况</label>
        <input type="text" name="situation"><br/>
        <label for="earnest_money">订金</label>
        <input type="text" name="earnest_money"><br/>
        <label for="report">报告</label>
        <input type="text" name="report"><br/>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="submit" name="submit" value="Submit">
    </form>
</div>

@endsection