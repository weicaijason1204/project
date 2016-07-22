@extends('layouts.app')

@section('content')

	<div class="top_right">
		<ul>
			<li>Doctor</li>
			<li><a href="{{url('doctor/reset')}}" target="main">修改密码</a></li>
			<li><a href="{{url('doctor/quit')}}">退出</a></li>
		</ul>
	</div>
<div class="menu_box">
	<ul>
		<li>
			<h3><i class="fa fa-fw fa-clipboard/"></i>常用操作</h3>
			@foreach($reservations as $reservation)
				{{$reservation->id}}<br/>
				<a href="{{url('doctor/reservation/'.$reservation->id)}}" ></i>{{$reservation->name}}</a><br/>
				{{$reservation->report}}<br/>
				{{$reservation->created_at}}<br/>
			@endforeach
		</li>
	</ul>
</div>

@endsection