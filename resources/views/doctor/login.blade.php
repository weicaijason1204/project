@extends('layouts.app')

@section('content')
    <h1>Blog</h1>
    <h2>欢迎使用博客管理平台</h2>
    <div class="form">
        @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif
        <form action="" method="post">
            {{csrf_field()}}
            <ul>
                <li>
                    <input type="text" name="phone" class="text"/>
                    <span>电话</span>
                </li>
                <li>
                    <input type="password" name="password" class="text"/>
                    <span>密码</span>
                </li>

                <li>
                    <input type="submit" value="立即登陆"/>
                </li>
            </ul>
        </form>
@endsection