@extends('layouts.app')

@section('content')

<!--左侧导航 开始-->
<div class="menu_box">
	<ul>
		<li>
			<h3><i class="fa fa-fw fa-clipboard/"></i>常用操作</h3>
				{{$reservation->id}}<br/>
				{{$reservation->name}}<br/>
				{{$reservation->phone}}<br/>
				{{$reservation->password}}<br/>
				{{$reservation->wechat}}<br/>
				{{$reservation->imgs}}<br/>
				{{$reservation->desribe}}<br/>
				{{$reservation->age}}<br/>
				{{$reservation->created_at}}<br/>
		</li>
	</ul>
</div>

@endsection