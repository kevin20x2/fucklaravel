@extends('master')

@section('title')
{{ $book->book_name }}
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/book_show.css') }}">
@endsection

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>项目</th>
                    <th>内容</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>书名</td>
                    <td>{{ $book->book_name }}</td>
                </tr>
                <tr>
                    <td>作者</td>
                    <td>{{ $book->author }}</td>
                </tr>
                <tr>
                    <td>ISBN</td>
                    <td>{{ $book->ISBN }}</td>
                </tr>
                <tr>
                    <td>出版社</td>
                    <td>{{ $book->press_name }}</td>
                </tr>
                <tr>
                    <td>出版日期</td>
                    <td>{{ $book->press_date }}</td>
                </tr>
                <tr>
                    <td>当前状态</td>
                    <td>
                        @if($book->in_use)
                            有人在看
                        @else
                            可以借走
                        @endif
                    </td>
                </tr>
                @if($book->in_use)
                <tr>
                    <td>当前预约人数</td>
                    <td>{{ $reserve_num }}</td>
                </tr>
                @endif
            </tbody>

        </table>
        @if($book->in_use and !$reserve_too_many)
        <form action="/user/reserve" method="post">
            <input type="hidden" name="book-id" value="{{ $book->id }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-primary reserve-btn">
                预约这本
            </button>
        </form>

        @elseif($already_reserve)
            <div class="tip">
                你已经预约这本书了
            </div>

        @else
            <div class="tip">
                你还不能预约这本哦~
            </div>
        @endif

    </div>

@endsection