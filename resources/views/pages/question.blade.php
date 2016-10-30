@extends('layouts.masters.main')

@section('title','Register')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2" >
		<div class="panel panel-default">
			<div class="panel-heading">Post</div>
			<div class="panel-body">
				<form action="{{ route('post_question') }}" method="POST">
				{{ csrf_field() }}
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" class="form-control">
					</div>
					<div class="form-group">
						<label for="category">Category</label>
						<select name="category" class="form-control">
							@foreach($category as $cat)
								<option value="{{ $cat->id }}">{{ $cat->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="body">Body</label>
						<textarea name="body" id="body" cols="50" rows="10" class="form-control"></textarea>
					</div>
					
					<input type="submit" value="Post" class="btn btn-success">
				</form>
			</div>
		</div>
	</div>	
</div>

@endsection