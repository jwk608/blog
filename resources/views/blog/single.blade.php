@extends('main')

<?php $titleTag = htmlspecialchars($post->title); ?>

@section('title', "| $titleTag")

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<img src="{{ asset('images/' . $post->image)}}" height="400" width="800">
			<h1>{{ $post->title}}</h1>
			<p>{!! $post->body !!}</p>
			<hr>
			<p>Posted In: {{ $post->category->name }}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>{{ $post->comments()->count() }} Comments</h3>
			@foreach($post->comments as $comment)
				<div class="comment">
					<div class="author-info">					
						<img src={{"https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email))).'?d=mm' }} class="author-image">
						<div class="author-name">
							<h4>{{ $comment->name }}</h4>
							<p class="author-time">{{date('F nS, Y - G:iA',strtotime($comment->created_at))}}</p>
						</div>
					</div>
					<div class="comment-content">
						{{ $comment->comment }}
					</div>
				</div>
			@endforeach
		</div>
	</div>
	<div class="row">
		<div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
			<form method="POST" action="{{ route('comments.store', $post->id)}}">
			{!! csrf_field() !!}

				<div class="row">
					<div class="col-md-6">
						<label name="name">Name</label>
						<input type="text" id="name" name="name" class="form-control">
					</div>
					<div class="col-md-6">
						<label name="email">email</label>
						<input type="email" id="email" name="email" class="form-control">
					</div>	
					<div class="col-md-12">
						<label name="comment">comment</label>
						<textarea class="form-control input-lg" name="comment" id="comment" rows="10"></textarea>	
					</div>
					<div>
						<button type="submit" class="btn btn-success btn-block">Add Comment</button>
					</div>
				</div>
			</form>
		</div>
	</div>

@endsection