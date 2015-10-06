@if (Session::has('message_warning'))
    <div class="alert alert-warning">
        {{ session('message_warning') }}
    </div>
@endif
@if (Session::has('message_success'))
	<div class ="alert alert-success">
		{{ session('message_success') }}
	</div>
@endif
@if (Session::has('message_info'))
	<div class ="alert alert-info">
		{{ session('message_info') }}
	</div>
@endif
@if (Session::has('message_danger'))
	<div class ="alert alert-danger">
		{{ session('message_danger') }}
	</div>
@endif
