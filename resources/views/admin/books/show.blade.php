@extends('master')

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
                    <td>in_use</td>
                    <td>{{ $book->in_use }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection