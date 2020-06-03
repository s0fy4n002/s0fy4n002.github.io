@extends('layouts.admin')
@section('content')

		<div class="col-8">
			<div class="card">
				<div class="card-header">
					<h2>{{isset($tag)? "Update" : "Create" }} tags</h2>
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


					<form action="{{ isset($tag)? route('tags.update', $tag->id) : route('tags.store')}}" method="post" enctype="multipart/form-data">
						@csrf
						@if(isset($tag))
							@method('put')
						@endif
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" 
							value="{{!isset($tag)?old('name'): $tag->name }}">
						</div>
						<div class="form-group">
							<button class="btn btn-success" type="submit">{{isset($tag)?"Update":"Store"}} </button>
						</div>
					</form>
					
				</div>
			</div>
		</div>
	
@endsection