@extends('master')   {{-- 继承master模版 --}}

@section('title')   {{-- 对应@yield('title') --}}
    学生成绩管理系统
@stop

@section('content')   {{-- 对应@yield('content') --}}
    <div class="container">
        <div class="jumbotron">
            <h2><div class="quote">{{ Inspiring::quote() }}</div></h2>
			@include('search')
        </div>
    </div>
@stop
