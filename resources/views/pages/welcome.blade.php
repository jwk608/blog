@extends('main')

@section('title', '| Homepage')

@section('content')
        <div class="row">
               <div class="jumbotron">
                   <div class="container">
                <h1>Hello, Welcome to Jkim's Blog</h1>

                <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
               </div>
               </div>
        </div><!-- end row -->
        <div class="row">
            <div class="col-md-8">
                @foreach($posts as $post)                                   
                    <div class="post">
                        <div class="post--img">
                            <img loading=lazy src="{{$post->image ? asset('images/' . $post->image) : asset('images/default-blog.png')}}">
                        </div>
                        <div class="post--contents">
                            <h3>{{ $post->title}}</h3>
                            <p>{{ substr(strip_tags($post->body), 0, 300) }}{{strlen(strip_tags($post->body)) > 300 ? "..." : ""}}</p>
                            <a href="{{ url('blog/'.$post->slug)}}" class="btn btn-primary btn--read-more">Read more</a>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
            <div class="col-md-3 col-md-offset-1">
                <h2>Sidebar</h2>
            </div>
        </div>
  @endsection