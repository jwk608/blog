@extends('main')

@section('title', '| Delete Comment?')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>DELETE THIS COMMENT?</h1>
			<p>
				<strong>Name:</strong> {{$comment->name}}<br>
				<strong>Email:</strong> {{$comment->email}}<br>
				<strong>Comment:</strong> {{$comment->comment}}

			</p>
			<form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
				{{ method_field('DELETE') }}
				{{csrf_field()}}

				<button type="submit" class="btn btn-lg btn-danger btn-block" style="margin-top: 15px;">YES DELETE THIS COMMENT</button>

			</form>
	</div>
</div>
@endsection