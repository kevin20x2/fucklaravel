<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') </title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @if(Auth::guest())
                    <a class="navbar-brand" href="/">图书信息查询</a>
                @else
                    @if (Auth::user()->is_admin)
                        <a class="navbar-brand" href="/admin">管理员功能页</a>
                        <ul class="nav navbar-nav navbar-left">
                            <li><a href="{{ URL('admin/books/create') }}">添加一本书</a></li>
                            <li><a href="{{ URL('admin/lends') }}">借书</a></li>
                            <li><a href="{{ URL('admin/return') }}">还书</a></li>
                        </ul>
                    @else
                        <a class="navbar-brand" href="/">图书信息查询</a>
                    @endif
                @endif

            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
						<li> <a href="{{ url('/login') }}">登录</a></li>
                    @else
                        <li><a href="{{ url('/user/home') }}">{{ Auth::user()->name }}</a></li>
                        <li><a href="{{ url('/logout') }}">退出</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    @yield('content')

<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
</body>
</html>
