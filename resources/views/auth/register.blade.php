@extends('main')

@section('title', '| Login')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">          
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" data-parsley-required>

                <label for="email" id="email" value="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" data-parsley-required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control">
                <br>
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">               
                <br>
                <input type="submit" value="Register" class="btn btn-primary btn-block" form-spacing-top>

                {!! csrf_field() !!}
            </form>
        </div>
    </div>
@endsection
                   