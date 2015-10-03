@extends('app')

@section('content')
@foreach ($faqs as $book)
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
@endforeach
@endsection

