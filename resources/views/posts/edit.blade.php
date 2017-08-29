@extends('main')

@section('title', '| Edit blog Post')

@section('stylesheets')

<link rel="stylesheet" href="/css/parsley.css">
<link rel="stylesheet" href="/css/select2.min.css">
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>


	<script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'link',
			menubar: false
		});
	</script>

@endsection

@section('content')
	<div class="row">
		<form method="POST" action="{{ route('posts.update', $post->id) }}">
				<div class="col-md-8">
					<div class="form-group">
					 	<label for="title">Title</label>
						<input type="text" class="form-control input-lg" name="title" id="title" value="{{$post->title}}" rows="1">	
					</div>
					<div class="form-group">
				        <label name="category_id">Category</label>
				        <select class="form-control" name="category_id">
				        	@foreach($categories as $category)
				        	<option value="{{ $category->id }}">{{ $category->name }}</option>
				        	@endforeach
				        </select>
					</div>
					<div class="form-group">
			        <label name="tags">Tags</label>
			        <select class="form-control select2-multi"  name="tags[]" multiple="multiple">
			        	@foreach($tags as $tag)
			        	<option value="{{ $tag->id }}">{{ $tag->name }}</option>
			        	@endforeach
			        </select>
			      </div>
					<div class="form-group">
					 	<label for="slug" class="form-spacing-top">Slug</label>
						<input type="text" class="form-control input-lg" name="slug" id="slug" value="{{$post->slug}}" rows="1"  >	
					</div>
					<div class="form-group">
						<label for="body" class="form-spacing-top">Body</label>
						<textarea class="form-control input-lg" name="body" id="body" rows="10">{{$post->body}}</textarea>	
					</div>
				</div>
				<div class="col-md-4">
					<div class="well">
						<dl class="dl-horizontal">
							<dt>Create At:</dt>
							<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
						</dl>

						<dl class="dl-horizontal">
							<dt>Last Updated:</dt>
							<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
						</dl>
						<hr>
						<div class="row">
							<div class="col-sm-6">
		 						<a href="{{  route('posts.show', $post->id, 'Cancle')  }}" class="btn btn-danger btn-block"> Back</a>﻿		
							</div>
							<div class="col-sm-6">
					            <button type="submit" class="btn btn-success btn-block">Save</button>
					            <input type="hidden" name="_token" value="{{ Session::token() }}">
					            {{ method_field('PATCH') }}							
              				</div>												
						</div>				
					</div>
				</div>
		</form>
	</div>
@endsection

@section('scripts')

<script language="JavaScript" src="/js/parsley.min.js"></script>
<script language="JavaScript" src="/js/select2.min.js"></script>
<script type="text/javascript">
		$(".select2-multi").select2();

        $('.select2-multi').select2().val({!! json_encode($post->tags->pluck('id')) !!} ).trigger('change');﻿
      </script>
 @endsection