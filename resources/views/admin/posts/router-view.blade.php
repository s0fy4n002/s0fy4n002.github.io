@extends('layouts.admin')
@section('title', 'create post')
@push('style')
	<style>
		.form-check-label{
			cursor: pointer;
		}
	</style>
@endpush
@section('content')
	
	<router-view></router-view>
	
@endsection