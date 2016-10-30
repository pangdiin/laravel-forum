@extends('layouts.masters.main')

@section('title','Register')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2" >
		<div class="panel panel-default">
			<div class="panel-heading">Register</div>
			<div class="panel-body">
				<form action="{{ route('post_register') }}" method="POST">
				{{ csrf_field() }}
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control">
					</div>
					<input type="submit" value="Register" class="btn btn-primary">
				</form>
			</div>
		</div>
	</div>	
</div>

@endsection
