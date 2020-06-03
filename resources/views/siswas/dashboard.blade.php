@extends('layouts.master-1')
@section('title', 'Index')
@section('content')
@push('style')


@endpush
@push('script')

@endpush

<div class="row mb-3">
	<div class="col-6">
		<h2 class="text-default">Dashboard</h2>
	</div>
</div>
<div class="row">
	<div class="col-sm-12 col-md-6">

		<div class="table-responsive">
			<div class="card">
				<div class="card-body shadow">
					<!-- Button trigger modal -->
					<h4>Rangking</h4>
					<table class="table">
						<thead>
							<tr>
								<th>Rangking</th>
								<th>Nama</th>
								<th>Nilai</th>
							</tr>
						</thead>
						<tbody>
							@php
								$ranking = 1;
							@endphp
							@foreach( rangking5besar() as $siswa )
							<tr>
								<td>{{$ranking++}}</td>
								<td>{{$siswa->nama_lengkap()}}</td>
								<td>{{$siswa->nilaiRataRata()}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
	</div>
	<div class="col-sm-12 col-md-6">
		<div class="row">
			<div class="col-md-6">
				<div class="card text-white bg-primary mb-3">
				  <div class="card-header text-center bg-primary"><i class="fas fa-fw fa-lg fa-users"></i><a class="text-white" href="{{route('siswas.index')}}">
				  	Total Siswa
				  </a></div>
				  <div class="card-body">
				    <h5 class="card-title">{{total_siswa()}}</h5>
				  </div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card text-white bg-success mb-3">
				  <div class="card-header text-center bg-success"><i class="fas fa-graduation-cap fa-fw fa-lg"></i>Total Guru</div>
				  <div class="card-body">
				    <h5 class="card-title">{{total_guru()}}</h5>
				    
				  </div>
				</div>
			</div>
		</div>
	</div>

</div>

@endsection