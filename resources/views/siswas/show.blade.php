@extends('layouts.master-1')
@section('title', 'Index')
@section('content')
@push('style')
<link rel="stylesheet" href="{{ asset('') }}bsv4/x-editable/jquery-editable/css/jquery-editable.css">

@endpush
@push('script')
	<script src="{{ asset('') }}highcharts.js"></script>
	<script src="{{ asset('') }}bsv4/x-editable/jquery-editable-poshytip.js"></script>
	<script>
		Highcharts.chart('chartNilai', {
			chart: {
			    type: 'column'
			},
			title: {
			    text: 'Laporan Nilai'
			},
			xAxis: {
			    categories: {!! json_encode($categories) !!},
			    crosshair: true
			},
			yAxis: {
			    min: 0,
			    max:100,
			    title: {
			        text: 'Nilai'
			    }
			},
			tooltip: {
			    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
		        
		        footerFormat: '</table>',
		        shared: true,
		        useHTML: true
			},
			plotOptions: {
			    column: {
			        pointPadding: 0.2,
			        borderWidth: 0
			    }
			},
			series: [{
			    name: 'Nilai',
			    data: {!! json_encode($data, JSON_NUMERIC_CHECK) !!},


			}]
			});

		$(document).ready(function() {
		    $('.nilai').editable({
		    	 mode: 'inline',
		    })
		});

	</script>
@endpush

<div class="row">
	<div class="col-6">
		<h2>Profile Siswa</h2>
	</div>
</div>
<div class="row">
	<div class="col-sm-12 col-md-4">
		<div class="card">
			<div class="card-header bg-primary text-white border-bottom-0">
				<h3>
					{{$siswa->nama_depan . $siswa->nama_belakang}}
				</h3>
			</div>
			<img src="{{asset('siswa/avatar/'.$siswa->avatar)}}" class="" alt="..." height="300">
			<div class="abc d-flex">
				<div class="section bg-primary text-white text-center w-100 border-right ">
					<h5 class="p-0">Mapel</h5>
					<p class="p-0">{{ $siswa->mapel->count() }}</p></div>
				<div class="section bg-primary text-white text-center w-100 border-right">
					<h5>Nilai Rata2</h5>
					<p>{{$siswa->nilaiRataRata()}}</p>
				</div>
				<div class="section bg-primary text-white text-center w-100 border-right">
					<h5>Project</h5>
					<p>45</p>
				</div>
			</div>
			
			<div class="card-body">
				<h5>Data Diri</h5>
				<table class="table border-0">
					<tbody>
						<tr>
							<td class="border-0">Jenis Kelamin</td>
							<td class="float-right border-0">{{$siswa->jenis_kelamin}}</td>
						</tr>
						<tr>
							<td class="border-0">Alamat</td>
							<td class="float-right border-0">{{$siswa->alamat}}</td>
						</tr>
						<tr>
							<td class="border-0">Agama</td>
							<td class="float-right border-0">{{$siswa->agama}}</td>
						</tr>
					</tbody>
				</table>
				<div class="form-group justify-content-center d-flex">
					<a href="{{route('siswas.edit', $siswa->id)}}" class="btn btn-info btn-block">Edit</a>
				</div>
					
			</div>
		</div>
	</div>
	<div class="col-sm-12 col-md-8">
		<div class="table-responsive">
			<div class="card">
				<div class="card-body shadow">
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary btn-sm float-right mb-2" data-toggle="modal" data-target="#exampleModal">
					  <i class="fas fa-plus fa-fw fa-lg"></i>
					</button>

					<table class="table">
						<thead>
							<tr>
								<th>Kode</th>
								<th>Nama</th>
								<th>Semester</th>
								<th>Guru</th>
								<th>Nilai</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@if($siswa->mapel->count() > 0)
							@foreach($siswa->mapel as $mapel)
							<tr>
								<td>{{$mapel->kode}}</td>
								<td>{{$mapel->nama}}</td>
								<td>{{$mapel->semester}}</td>
								<td><a href="{{route('guru.show', $mapel->guru->id)}}">{{$mapel->guru->nama}}</a></td>
								<td>
									<a href="#" class="nilai" data-type="text" data-pk="{{$mapel->id}}" data-url="{{url('/api/siswas/'.$siswa->id.'/editNilai')}}" data-title="Masukkan Nilai">{{$mapel->pivot->nilai}}
									</a>
								</td>
								<td>
								<form action="{{url('/siswas/'.$siswa->id.'/'.$mapel->id.'/hapus')}}" method="post" class="d-inline">
									@csrf
									@method('DELETE')
									<button type="submit" onclick="return confirm('Hapus??')" class="btn btn-danger">
										<i class="fas fa-trash fa-fw fa-sm"></i>
									</button>
								</form>
									
								</td>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	
      	<form action="{{ url('siswas/'.$siswa->id.'/addNilai') }}" method="post" enctype="multipart/form-data">
      		@csrf
      		<div class="form-group">
        		<label for="mapel_id">Mata Pelajaran</label>
        		<select name="mapel_id" class="form-control">
        			<option value="">--pilih--</option>
        			@foreach($mata_pelajaran as $m)
        			<option @if(old('mapel_id') == $m->id) selected @endif value="{{$m->id}}">{{$m->nama}}</option>
        			@endforeach
        		</select>
        		@if($errors->has('mapel_id'))
					<span class="help-block"> {!!$errors->first('mapel_id')!!} </span> 
        		@endif
        		
	        </div>
      		<div class="form-group">
        		<label for="nilai">Nilai</label>
        		<input type="text" class="form-control" name="nilai" value="{{ old('nilai') }}">
        		@if($errors->has('nilai'))
					<span class="help-block"> {!!$errors->first('nilai')!!} </span> 
        		@endif
	        </div>
	        <div class="form-group">
	        	<button type="submit" class="btn btn-primary"><i class="fas fa-save fa-fw fa-sm"></i> Simpan</button>	
	        	<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle fa-fw fa-sm"></i> Close</button>
		        
	        </div>
	        
      	</form>
      	
        
      </div>
    </div>
  </div>
</div>
@endsection