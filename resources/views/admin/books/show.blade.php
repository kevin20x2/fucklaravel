@extends('app')

@section('content')
<p>
book_name :
{{ $books->book_name }}
</p>

<p>
author :
{{ $books->author }}
</p>
<p>
ISBN :
{{ $books->ISBN }}
</p>
<p>
press_name :
{{ $books->press_name }}
</p>
<p>
press_date :
{{ $books->press_date }}
</p>
<p>
url :
{{ $books->url }}
</p>
<p>
in_use :
{{ $books->in_use }}
</p>
@endsection
