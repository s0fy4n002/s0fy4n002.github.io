@extends('layouts.master-1')
@section('title', 'Index')
@section('content')
@push('style')

@endpush
@push('script')
	
@endpush

<div class="row">
	<div class="col-6">
		<h2>Profile guru</h2>
	</div>
</div>
<div class="row">
	<div class="col-sm-12 col-md-5">
		<div class="card">
			<div class="card-header bg-primary text-white border-bottom-0">
				<h3>
					{{$guru->nama}}
				</h3>
			</div>
			@if($guru->avatar == true)
				<img src="{{asset('guru/avatar/$guru->avatar')}}" alt="img" class="" alt="..." height="300" width="100">
			@else
				<img src="{{asset('guru/avatar/guru-default.png')}}" alt="img" class="mx-auto my-2" alt="..." height="300" width="70%">
			@endif
			
			<div class="abc d-flex">
				<div class="section bg-primary text-white text-center w-100 border-right ">
					<h5 class="p-0">mapels</h5>
					<p class="p-0">{{ $guru->mapels->count() }}</p></div>
				<div class="section bg-primary text-white text-center w-100 border-right">
					<h5>Project</h5>
					<p>45</p>
				</div>
				<div class="section bg-primary text-white text-center w-100 border-right">
					<h5>Project</h5>
					<p>45</p>
				</div>
			</div>
			
			<div class="card-body">
				<h5>Data Diri</h5>
				<div class="table-responsive">
					<table class="table border-0">
					<tbody>
						<tr>
							<td class="border-0">Jenis Kelamin</td>
							<td class="float-right border-0">{{$guru->jenis_kelamin}}</td>
						</tr>
						<tr>
							<td class="border-0">Alamat</td>
							<td class="float-right border-0">{{$guru->alamat}}</td>
						</tr>
						<tr>
							<td class="border-0">Agama</td>
							<td class="float-right border-0">{{$guru->agama}}</td>
						</tr>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-12 col-md-7">
		<div class="table-responsive">
			<div class="card">
				<div class="card-body shadow">
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>mapels</th>
								<th>Semester</th>
							</tr>
						</thead>
						<tbody>
							@if($guru->mapels->count() > 0)
							@foreach($guru->mapels as $mapels)
							<tr>
								<td>{{$mapels->id}}</td>
								<td>{{$mapels->nama}}</td>
								<td>{{$mapels->semester}}</td>
							</tr>
							@endforeach
							@else
							<tr>
								<td class="text-center">belum ada pelajaran</td>
							</tr>
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div id="chartNilai" class="mt-2 shadow"></div>
	</div>
</div>



@endsection