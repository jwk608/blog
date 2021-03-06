@extends('main')

@section('title', '| Contact')

@section('content')


        <div class="row">
            <div class="col-md-8">
                <h1>Contact Me</h1>
                <div class="form-area">  
        <form action="{{ url('contact') }}" method="POST">
        {{ csrf_field() }}

        <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Contact Form</h3>

                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group">
                    <textarea class="form-control" type="textarea" id="message" placeholder="Message" maxlength="140" rows="7"></textarea>
                        <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>                    
                    </div>
            
        <input type="submit" id="submit" name="submit" class="btn btn-primary pull-right">
        </form>
    </div>
            </div>
        </div><!-- end row -->
    
@endsection