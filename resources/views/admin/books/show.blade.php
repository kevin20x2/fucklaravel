@extends('master')

@section('content')
<div class = "container">
<div class ="row">
<div class="col-md-10 col-md-offset-1">
<div class ="panel panel-default">
<div class ="panel-body">
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
</div>
</div>
</div>
</div>
</div>
@endsection
