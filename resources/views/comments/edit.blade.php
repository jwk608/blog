@extends('main')

@section('title', '| Edit Comment')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Edit Comment</h1>
			<form method="POST" action="{{ route('comments.update', $comment->id) }}">
				{{ method_field('PUT') }}
				{{csrf_field()}}

				<label name="name">Name:</label>
				<input type="text" id="name" name="name" class="form-control disabled" value="{{$comment->name}}">

				<label name="email">Email:</label>
				<input type="email" id="email" name="email" value="{{ $comment->email }}" class="form-control disabled">

				<label name="comment">Comment:</label>
				<textarea id="comment"  name="comment" class="form-control disabled">{{ $comment->comment }}</textarea>

				<button type="submit" class="btn btn-success btn-block" style="margin-top: 15px;">Save</button>

			</form>
	</div>
</div>
@endsection