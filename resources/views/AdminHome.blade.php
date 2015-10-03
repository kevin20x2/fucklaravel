@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">ºóÌ¨Ê×Ò³</div>

        <div class="panel-body">

        <a href="{{ URL('admin/books/create') }}" class="btn btn-lg btn-primary">insert book</a>

          @foreach ($books as $book)
            <hr>
            <div class="book">
              <h4>{{ $book->book_name }}</h4>
              <div class="content">
                <p>
                  {{ $book->author }}
                </p>
				<p>
				  {{ $book->ISBN }}
				</p>
              </div>
            </div>
            <a href="{{ URL('admin/books/'.$book->id.'/edit') }}" class="btn btn-success">±à¼­</a>

            <form action="{{ URL('admin/books/'.$book->id) }}" method="POST" style="display: inline;">
              <input name="_method" type="hidden" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-danger">É¾³ý</button>
            </form>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</div>
@endsection

