
@extends('layouts.admin')
@push('style')
	<style>
		.form-check-label{
			cursor: pointer;
		}
	</style>
@endpush
@section('content')

		<div class="col-8">
			<div class="card">
				<div class="card-header">
					<h2>@if( isset($user) ) user {{$user->title}}  @else Create User @endif</h2>
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

					@if( isset($user) )
						<form action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
							@method('PUT')
							@csrf
							<div class="form-group">
								<label for="name">name</label>
								<input type="text" class="form-control" name="name" value="{{ $user->name }}">
							</div>
							<div class="form-group">
								<label for="email">email</label>
								<input type="email" class="form-control" name="email" value="{{ $user->email }}">
							</div>
							<div class="form-group">
								<button class="btn btn-success" type="submit">Update</button>
							</div>
						</form>
	
					@else


					<form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" value="{{ old('name') }}">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" name="email" value="{{ old('email') }}">
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