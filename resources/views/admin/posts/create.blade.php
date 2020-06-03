
@extends('layouts.admin')
@section('title', 'create post')
@push('style')

	<style>
		.form-check-label{
			cursor: pointer;
		}
	</style>
@endpush

@push('script')
<script>						    
  $('.content').summernote({
    placeholder: 'content',
    tabsize: 2,
    height: 150
  });
</script>
    
@endpush
@section('content')

		<div class="col-8">
			<div class="card">
				<div class="card-header">
					<h2>@if( isset($edit) ) Edit {{$edit->title}}  @else Create Post @endif</h2>
				</div>
				<div class="card-body">
					@if(count($errors) > 0)
						<ul class="list-group">
							@foreach($errors->all() as $error)
							<li class="list-group-item text-danger">
								{{$error}}
							</li>
							@endforeach
						</ul>
					@endif

					@if( isset($edit) )
						<form action="{{route('posts.update', $edit->id)}}" method="post" enctype="multipart/form-data">
							@method('PUT')
							@csrf
							<div class="form-group">
								<label for="title">title</label>
								<input type="text" class="form-control" name="title" value="{{ $edit->title }}">
							</div>
							<div class="form-group">
								<label for="featured">featured</label>
								<input type="file" name="featured" class="form-control" >
							</div>
							<div class="form-group">
								<label for="content">content</label>

								<textarea name="content" class="content" cols="30" rows="10">{{ $edit->content }}</textarea>
							    
								
							</div>
							<div class="form-group">
								<label for="category">Category</label>
								<select name="category_id" id="category_id" class="form-control">
									@foreach($categories as $category)
									<option @if( $edit->category_id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
									@endforeach
								</select>
							</div>
							@if(isset($tags))

							@foreach($tags as $tag)
							
							<div class="form-check">
								
							  <input name="tags[]" class="form-check-input" 
							@foreach($edit->tags as $t)
							  @if( $tag->id == $t->id ) 
							  	checked 	
							  @endif
							  @endforeach   
							  type="checkbox" 
							  value="{{ $tag->id }}" 
							  id="{{ $tag->name }}"
							  >
							  <label class="form-check-label" for="{{ $tag->name }}">
							    {{ $tag->name }}
							  </label>
							</div>
							
							@endforeach
							@endif

							<div class="form-group">
								<button class="btn btn-success" type="submit">Update</button>
							</div>
						</form>
	
					@else


					<form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="title">title</label>
							<input type="text" class="form-control" name="title" value="{{ old('title') }}">
						</div>
						<div class="form-group">
							<label for="featured">featured</label>
							<input type="file" name="featured" class="form-control" >
						</div>
						<div class="form-group">
							<label for="content">content</label>

							<textarea name="content" class="content" cols="30" rows="10">{{ old('content') }}</textarea>

							
						</div>

						@if(isset($tags))

						@foreach($tags as $tag)

						<div class="form-check">
						  <input class="form-check-input" 
						  		type="checkbox" 
						  		name="tags[]" 
						  		
						  		value="{{$tag->id}}" 
						  		id="{{$tag->name}}">
						  <label class="form-check-label" for="{{$tag->name}}">
						    {{$tag->name}}
						  </label>						  
						</div>
						@endforeach

						@endif

						<div class="form-group">
							<label for="category_id">Category</label>
							<select name="category_id" id="category_id" class="form-control">
								@foreach($categories as $category)
								<option @if( old('category_id') == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<button class="btn btn-success" type="submit">Store</button>
						</div>
					</form>

					@endif
					
				</div>
			</div>
		</div>
	
@stop