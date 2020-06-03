@extends('layouts.admin')
@section('content')

		<div class="col-8">
			<div class="card">
				<div class="card-header">
					<h2>{{isset($category)? "Update" : "Create" }} Categories</h2>
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


					<form action="{{ isset($category)? route('categories.update', $category->id) : route('categories.store')}}" method="post" enctype="multipart/form-data">
						@csrf
						@if(isset($category))
							@method('put')
						@endif
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" 
							value="{{!isset($category)?old('name'): $category->name }}">
						</div>
						<div class="form-group">
							<button class="btn btn-success" type="submit">{{isset($category)?"Update":"Store"}} </button>
						</div>
					</form>
					
				</div>
			</div>
		</div>
	
@endsection