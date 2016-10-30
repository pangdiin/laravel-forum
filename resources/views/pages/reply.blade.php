@extends('layouts.masters.main')

@section('title','Home')

@section('content')

<div class="col-md-10">
	<div class="well">
		<div class="media">
			<div class="media-body">
				<h4 class="media-heading">{{ $post->title }}</h4>
				<p class="text-right">By: {{ $post->user->name }}</p>
				<p>{{ $post->body }}</p>
				<ul class="list-inline list-unstyled">
					<li><span><i class="glyphicon glyphicon-calendar"></i>
					{{ $post->created_at->diffForHumans() }}</span></li> <!--New carbon command in laravel -->
					<a class="btn btn-md btn-primary pull-right" href="#" role="button">Read More...</a>
				</ul>
			</div>
		</div>
	</div>
	@forelse($post->replies as $reply)
	<div class="well">
		<div class="media">
			<div class="media-body">
				<p class="text-right">By: {{ $reply->user->name }}</p>
				<p>{{ $reply->body }}</p>
				<ul class="list-inline list-unstyled">
					<li><span><i class="glyphicon glyphicon-calendar"></i>
					{{ $post->created_at->diffForHumans() }} </span></li> <!--New carbon command in laravel -->
				</ul>
			</div>
			@if(Auth::user()->id == $reply->user_id )
			<form action="{{ route('delete_reply', $reply->id) }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('DELETE')}}
				<button type="submit" class="btn btn-danger pull-right">Delete</button>			
			</form>
		@endif
		</div>
	</div>
	@empty
	<p>Be the first to reply.</p>
	@endforelse
	
	@if(Auth::check())

	<form action="{{ route('save_reply') }}" method="POST">
		
		{{ csrf_field() }}

		<div class="form-group">
			<label for="body">Reply</label>
			<textarea name="body" id="body" cols="50" rows="5" class="form-control" placeholder="Type your reply here"></textarea>
		</div>
		<input type="hidden" name="slug" value="{{ $post->slug }}">
		<input type="submit" value="Reply" class="btn btn-success">
	</form>
	@endif
</div>

@endsection
