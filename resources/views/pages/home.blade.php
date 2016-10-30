@extends('layouts.masters.main')

@section('title','Home')

@section('content')

@forelse($posts as $post )

<div class="col-md-10 col-md-offset-1">
	<div class="well">
		<div class="media">
			<div class="media-body">
				<h4 class="media-heading"><a href="{{ route('view_post',$post->slug) }}">{{ $post->title }}</a></h4>
				<p class="text-right">By {{ $post->user->name }}</p>
				<p>{{ $post->body }}</p>
				<ul class="list-inline list-unstyled">
					<li><span><i class="glyphicon glyphicon-calendar"></i>
					{{ $post->created_at->diffForHumans() }}</span></li> <!--New carbon command in laravel -->
					<li>|</li>

					@if( $post->replies->count() > 0)
						<li>{{ $post->replies->count() }} Comments</li>
					@else
						<li>Be the first to reply</li>
					@endif
	
				</ul>
			</div>
			@if(Auth::check())
			<form action="{{ route('delete_question', $post->id) }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('DELETE')}}
				@if(Auth::user()->id == $post->user_id )
				<button type="submit" class="btn btn-danger pull-right">Delete</button>		
				@endif		
			</form>
			@endif
		</div>
	</div>
</div>
@empty

<p>No found post!</p>

@endforelse

<div class="text-center">
	{!! $posts->appends(Request::all())->render() !!}
</div>

@endsection
