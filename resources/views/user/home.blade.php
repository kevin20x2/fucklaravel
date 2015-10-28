@extends('master')

@section('title')
    欢迎 -- {{ Auth::user()->name }}
@stop

@section('content')

<div class="container" xmlns="http://www.w3.org/1999/html">
	@include('flash')
</div>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="/user/home"><button class="btn btn-info">个人信息</button></a>
                </div>

                <div class="panel-body">
                    <div class="personal-mes">
                        id: {{ Auth::user()->id }}
                        <br />
                        姓名: {{ Auth::user()->name }}
                        <br />
                        邮箱: {{ Auth::user()->email }}
                        <hr />
                        {{--<a href="/user/edit"><button class="btn btn-primary">修改资料</button></a>--}}
                    </div>
                </div>

                @if(count($querys) != 0)
                <form role="form" action="{{ URL('/user/renew') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @foreach ($querys as $query)
                    <div class="panel-body">
                        <div class="checkbox">
                            <label>
                            <input type="checkbox" value="{{ $query->book_id }}" name="checkbox[]">
                                <div class="lend-mes">
                                    书名:
                                    <a href="/books/{{ $query->book_id }}">
                                         {{ $query->book_name }}
                                    </a>

                                    {{--<br />--}}
                                    作者: {{ $query->author }}
                                    {{--<br />--}}
                                    借书时间: {{ date('Y-m-d', $query->lend_date) }}
                                    {{--<hr />--}}
                                    到期时间：{{ date('Y-m-d', $query->due_date) }}
                                </div>
                            </label>
                        </div>
                    </div>
				    @endforeach
                    <input type="submit" class="btn btn-success" value="续借选中书籍">
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@stop
