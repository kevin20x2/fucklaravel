@extends('app')

@section('content')
<p>
{{ $books->book_name }}
</p>

<p>
{{ $books->author }}
</p>
<p>
{{ $books->ISBN }}
</p>
<p>
{{ $books->press_name }}
</p>
<p>
{{ $books->press_date }}
</p>
<p>
{{ $books->url }}
</p>
<p>
{{ $books->in_use }}
</p>
@endsection
