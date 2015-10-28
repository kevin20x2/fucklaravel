
@extends('master')


@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">所有书籍</div>

        <div class="panel-body">
          @foreach ($books as $book)
            {{--<hr>--}}
            <div class="book">
              <a href="{{ URL("admin/books/$book->id") }}"><h4>{{ $book->book_name }}</h4></a>
              <div class="content">
                <p >
                  {{ $book->author }}
                </p>
				<p>
				  {{ $book->ISBN }}
				</p>
              </div>
            </div>
            <a href="{{ URL("admin/books/$book->id/edit") }}" class="btn btn-success">编辑</a>

            <form action="{{ URL('admin/books/'.$book->id) }}" method="POST" style="display: inline;">
              <input name="_method" type="hidden" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-danger">删除</button>
            </form>
            <hr>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</div>
@endsection

