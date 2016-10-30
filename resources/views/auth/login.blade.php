@extends('layouts.masters.main')

@section('title','Register')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2" >
		<div class="panel panel-default">
			<div class="panel-heading">Login</div>
			<div class="panel-body">
				<form action="{{ route('post_login') }}" method="POST">
				{{ csrf_field() }}
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control">
					</div>
					<input type="submit" value="Register" class="btn btn-success">
				</form>
			</div>
		</div>
	</div>	
</div>

@endsection