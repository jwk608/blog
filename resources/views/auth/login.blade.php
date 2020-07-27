@extends('main')

@section('title', '| Login')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
            @endif
            <label name="email" id="email" value="email">Email</label>
            <input type="text" id="email" name="email" class="form-control" data-parsley-required>

            <label name="password">Password</label>
            <input type="password" id="emal" name="password" class="form-control">
            <br>
            <input type="checkbox" value="rememberme">
            <label id="rememberme">Remember me</label>
            <br>
            <input type="submit" value="submit" class="btn btn-primary btn-block">
            <br>
            <p>
                <a href="{{ url('auth/register')}}">Register Now!</a>
                <p><a href="{{ url('password/reset')}}">Forgot Password</a>
                    <br>
                    <br>
                    <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">

                                <a class="btn btn-sm " href="{{ url('socialauth/github') }}">
                                   <i class="fa fa-github fa-3x"></i> 
                                </a>
                                <a class="btn btn-sm" href="{{ url('socialauth/facebook') }}">
                                   <i class="fa fa-facebook-square fa-3x"></i> 
                                </a>
                                <a class="btn btn-sm" href="{{ url('socialauth/twitter') }}">
                                   <i class="fa fa-twitter-square fa-3x"></i> 
                                </a>
                            </div>
                        </div>
                     {!! csrf_field() !!}
        </form>
    </div>
</div>
@endsection