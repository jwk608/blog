@extends('main')

@section('title', '| View Post')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $post->title }}</h1>
			<p class="lead"> {{ $post->body }}</p>
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>Url:</label>
					<p><a href="{{ route('blog.single', $post->slug) }}">{{  route('blog.single', $post->slug) }} </a></p>
				</dl>
				<dl class="dl-horizontal">
					<label>Create At:</label>
					<p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
				</dl>
				<dl class="dl-horizontal">
					<label>Last Updated:</label>
					<p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
 						<a href="{{  route('posts.edit', $post->id, 'Edit')  }}" class="btn btn-primary btn-block"> Edit</a>﻿						
					</div>
					<div class="col-sm-6">
						<form method="POST" action="{{ route('posts.destroy', $post->id) }}">
						    <input type="submit" value="Delete" class="btn btn-danger btn-block">
						    <input type="hidden" name="_token" value="{{ Session::token() }}">
						   {{ method_field('DELETE') }}
						</form>﻿					
					</div>
					<div class="col-sm-12">
 						<a href="{{  route('posts.index')  }}" class="btn btn-default btn-block"> See All Posts</a>﻿						
					</div>
										
				</div>				
			</div>
		</div>
	</div>
@endsection