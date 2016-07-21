@extends('layouts.app')

@section('content')
		<!--头部 开始-->
<div class="top_box">
	<div class="top_left">
		<div class="logo">后台管理模板</div>
		<ul>
			<li><a href="#" class="active">首页</a></li>
			<li><a href="#">管理页</a></li>
		</ul>
	</div>
	<div class="top_right">
		<ul>
			<li>管理员：admin</li>
			<li><a href="{{url('admin/pass')}}" target="main">修改密码</a></li>
			<li><a href="{{url('admin/quit')}}">退出</a></li>
		</ul>
	</div>
</div>
<!--头部 结束-->

<!--左侧导航 开始-->
<div class="menu_box">
	<ul>
		<li>
			<h3><i class="fa fa-fw fa-clipboard/"></i>常用操作</h3>
			<ul class="sub_menu">
				<li><a href="{{url('admin/reservation')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>Reservation</a></li>
				<li><a href="{{url('admin/city')}}" target="main"><i class="fa fa-fw fa-image"></i>City</a></li>
				<li><a href="{{url('admin/hospital')}}" target="main"><i class="fa fa-fw fa-image"></i>Hospital</a></li>
				<li><a href="{{url('admin/doctor')}}" target="main"><i class="fa fa-fw fa-list-alt"></i>Doctor</a></li>
				<li><a href="{{url('admin/tumor')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>Tumor</a></li>
				<li><a href="{{url('admin/desease')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>Desease</a></li>
				<li><a href="{{url('admin/user')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>User</a></li>
			</ul>
		</li>
	</ul>
</div>
<!--左侧导航 结束-->

<!--主体部分 开始-->
<div class="main_box">
	<iframe src="{{url('admin/info')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
</div>
<!--主体部分 结束-->

<!--底部 开始-->
<div class="bottom_box">
	CopyRight © 2015. Powered By <a href="http://www.houdunwang.com">http://www.houdunwang.com</a>.
</div>
<!--底部 结束-->
@endsection