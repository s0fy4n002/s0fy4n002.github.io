
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
					<h2>@if( isset($setting) ) Setting {{$setting->title}}  @else Create Post @endif</h2>
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

					@if( isset($setting) )
						<form action="{{route('settings-update', $setting->id)}}" method="post" enctype="multipart/form-data">
							@method('get')
							@csrf
							<div class="form-group">
								<label for="site_name">site_name</label>
								<input type="text" class="form-control" name="site_name" value="{{ $setting->site_name }}">
							</div>
							<div class="form-group">
								<label for="address">address</label>
								<input type="text" class="form-control" name="address" value="{{ $setting->address }}">
							</div>
							<div class="form-group">
								<label for="contact_email">contact_email</label>
								<input type="email" class="form-control" name="contact_email" value="{{ $setting->contact_email }}">
							</div>
							<div class="form-group">
								<label for="contact_number">contact_number</label>
								<input type="number" class="form-control" name="contact_number"  value="{{ $setting->contact_number }}">
							</div>
							<div class="form-group">
								<button class="btn btn-success" type="submit">Update</button>
							</div>
						</form>
	
					@else


					<form action="" method="post" enctype="multipart/form-data">
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