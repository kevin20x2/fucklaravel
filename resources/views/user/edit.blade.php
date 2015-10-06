@extends('master')

@section('title')
    修改个人信息
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="/stu/home"><button class="btn btn-info">个人信息</button></a>
                </div>

                @include('errors.list')

                <div class="panel-body">
                    {!! Form::open(['url' => '/user/update', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                        <div class="form-group">
                            {!! Form::label('name', '姓名: ', ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', Auth::user()->name, ['class' => 'form-control', 'readonly'])!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', '邮箱: ', ['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::email('email', Auth::user()->email, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="group">
                            {!! Form::submit('确认修改', ['class' => 'btn btn-success form-control']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
