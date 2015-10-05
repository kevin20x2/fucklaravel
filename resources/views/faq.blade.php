@extends('master')
@if (Auth::user()==NULL)
@endif


@section('content')
<div class="container">
	@include('flash')
	@include('search')
</div>
<div class="container">
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
		<form action="{{ url('user/reserve') }}" method ="get">
		<input type="hidden" name="user_id" value ="{{ Auth::user()==NULL?NULL:Auth::user()->id }}" >
		<input type="hidden" name="book_id" value ="{{ $book->id }}">
		<button class="btn  btn-success">预约</button>
		</form>
		</div>
</div>
@endforeach
</div>
@endsection

