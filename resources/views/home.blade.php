@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">查询</div>
				<form action ="{{ action('FaqController@index') }}" method="GET">
				<input type = "hidden" name="_token" value="{{ csrf_token() }}" required ="required">
				<input type ="text"  name="kword" class="form-control" >
				<button class="btn btn-success" >查询</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
