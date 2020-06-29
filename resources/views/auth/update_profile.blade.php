@extends('master')

@section('content')


@if($message = Session::get('update'))

<div class="alert alert-success mx-md-5 mx-4 mt-3">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	{{ $message }}
</div>

@endif

<form class="m-md-5 m-4 p-0" method="POST" action="/profile/{{ $user->id }}">

	@method('PUT')

	@csrf

	<div class="form-group row">
		<label for="user_name" class="col-sm-2 col-form-label">User Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="user_name" placeholder="User Name" name="name" value="{{ $user->name }}">
		</div>
	</div>
	<div class="form-group row">
		<label for="location" class="col-sm-2 col-form-label">Location</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="location" placeholder="Location" name="location" value="{{ $user->location }}">
		</div>
	</div>
	<div class="form-group row">
		<label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-10">
			<input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" value="{{ $user->email }}">
		</div>
	</div>
	<!-- <div class="form-group row">
		<label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" id="inputPassword3" placeholder="Password">
		</div>
	</div> -->
	<div class="form-group row">
		<div class="col-sm-10">
			<button type="submit" class="btn btn-primary">Update</button>
		</div>
	</div>
</form>

@endsection('content')