@extends('main')

@section('title', "| Edit Tag")

@section('content')
	<div class="row">
		<form method="POST" action="{{ route('tags.update', $tag->id) }}">
			{{method_field('PUT')}}
				<div class="col-md-8">
					<div class="form-group">
					 	<label for="name">Title</label>
						<input type="text" class="form-control input-lg" name="name" id="name" value="{{ $tag->name }}" rows="1">
						<button type="submit" class="btn btn-success" style="margin-top:20px">Save Changes</button>
						<input type="hidden" name="_token" value="{{ Session::token() }}">
					</div>
					
				</div>
		</form>
	</div>

@endsection