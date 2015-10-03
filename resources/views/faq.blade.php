<head>
<meta http-equiv="Content-Type" content="text/html;charset=gb2312"/>
</head>
@extends('app')

@section('content')
@foreach ($faqs as $book)
<hr>
<div class="book">
		<a href="{{ URL('admin/books/'.$book->id.'') }}"><h4>{{ $book->book_name }}</h4></a>
		<div class="content">
		<p>
			{{ $book->author }}
		</p>
		<p>
			{{ $book->ISBN }}
		</p>
		</div>
</div>
@endforeach
@endsection

