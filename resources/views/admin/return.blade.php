@extends('master')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">还书</div>

        <div class="panel-body">

          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ URL('admin/return') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
			<p>user_id</p>
            <input type="text" name="user_id" class="form-control" required="required">
			<p>book_id</p>
            <input type="text" name="book_id" class="form-control"  required="required">
			<p > </p>
            <button class="btn btn-lg btn-info">还吧</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>


@endsection


