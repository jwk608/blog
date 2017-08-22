@extends('main')

@section('title', '| Forgot My Password')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">   
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                @endif
                    </div>
                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                    <label name="email" id="email" value="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control" data-parsley-required>
          
                    <br>
                    <input type="submit" value="Reset Password" class="btn btn-primary btn-primary">                    
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection