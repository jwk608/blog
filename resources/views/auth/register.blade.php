@extends('main')

@section('title', '| Login')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">			
			<form>
				<label name="name">Name:</label>
				<input type="text" id="name" name="name" class="form-control" data-parsley-required>

				<label name="email" id="email" value="email">Email:</label>
				<input type="email" id="email" name="email" class="form-control" data-parsley-required>

				<label name="password">Password:</label>
				<input type="password" id="password" name="password" class="form-control">
				<br>
				<label name="password_confirmation">Confirm Password:</label>
				<input type="password_confirmation" id="password_confirmation" name="password_confirmation" class="form-control">				
				<br>
				<input type="submit" value="Register" class="btn btn-primary btn-block" form-spacing-top>

				{!! csrf_field() !!}
			</form>
		</div>
	</div>
@endsection