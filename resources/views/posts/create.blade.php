@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')

<link rel="stylesheet" href="/css/parsley.css">
<link rel="stylesheet" href="/css/select2.min.css">


@endsection

@section('content')



	<div class="row">
	  <div class="col-md-8 col-md-offset-2">
	    <h1>Create New Post</h1>
	    <hr>
	    <form method="POST" data-parsley-validate action="{{ route('posts.store') }}">
	      <div class="form-group">
	        <label name="title">Title:</label>
	        <input id="title" name="title" class="form-control" data-parsley-required	maxlength="255">
	      </div>
	      <div class="form-group">
	        <label name="slug">Slug</label>
	        <textarea id="slug" name="slug" rows="1" class="form-control" data-parsley-required minlength="5" maxlength="255" ></textarea>
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
	        <label name="body">Post Body:</label>
	        <textarea id="body" name="body" rows="10" class="form-control" data-parsley-required ></textarea>
	      </div>
	      <input type="submit" value="Create Post" class="btn btn-success btn-lg btn-block">
	      <input type="hidden" name="_token" value="{{ Session::token() }}">
	    </form>
	  </div>
	</div>



@endsection

@section('scripts')

<script language="JavaScript" src="/js/parsley.min.js"></script>
<script language="JavaScript" src="/js/select2.min.js"></script>

<script type="text/javascript">
$(".select2-multi").select2();
</script>


 @endsection