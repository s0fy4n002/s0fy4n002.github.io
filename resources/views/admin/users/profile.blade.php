
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
					<h2>@if( isset($user) ) Edit Profile {{$user->title}}  @else Create Post @endif</h2>
				</div>
				<div class="card-body">
					@if( count($errors) > 0 )
						<ul class="list-group">
							@foreach($errors->all() as $error)
							<li class="list-group-item text-danger">
								{{$error}}
							</li>
							@endforeach
						</ul>
					@endif

					@if( isset($user) )
						<form action="{{route('profiles.update', $user->id)}}" method="post" enctype="multipart/form-data">
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
								<label for="password">new password</label>
								<input type="password" class="form-control" name="password" value="{{ $user->password }}">
							</div>
							<div class="form-group">
								<label for="facebook">facebook</label>
								<input type="text" class="form-control" name="facebook" value="{{ $user->profile->facebook }}">
							</div>

							<div class="form-group">
								<label for="youtube">youtube</label>
								<input type="text" class="form-control" name="youtube" value="{{ $user->profile->youtube }}">
							</div>

							<div class="form-group">
								<label for="about">about</label>
								<textarea class="form-control" name="about" id="about" cols="30" rows="10">{{ $user->profile->about }}</textarea>
							</div>

							<div class="form-group">
								<label for="avatar">avatar</label><br>
								<img class="my-2" src="{{ asset('storage/'.$user->profile->avatar) }}" alt="" width="30%" height="30%">
								<input type="file" class="form-control" name="avatar" value="{{ $user->avatar }}">
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