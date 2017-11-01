@extends('main')

@section('title', '| Admin Login')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3"> 
            <h2>Admin Login</h2>
            <form class="form-horizontal" method="POST" action="{{ route('admin.login.submit') }}">
                <label name="email" id="email" value="email">Email</label>
                <input type="text" id="email" name="email" class="form-control" data-parsley-required>

                <label name="password">Password</label>
                <input type="password" id="emal" name="password" class="form-control">
                <br>
                <input type="checkbox" value="rememberme"> 
                <label id="rememberme">Remember me</label>              
                <br>
                <input type="submit" value="submit" class="btn btn-primary btn-block">

                {!! csrf_field() !!}
            </form>
        </div>
    </div>
@endsection
