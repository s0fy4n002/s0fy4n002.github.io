@extends('layouts.master-1')
@section('title', 'Index')
@push('script')
	<script>
		
		$( ".hapus" ).submit(function( event ) {
			event.preventDefault();
			var siswa_id = $(this).attr('siswa-id');
			var siswa_nama = $(this).attr('siswa-nama');
			  
			swal({
			  title: "Are you sure?",
			  text: "Once deleted, you will not be able to recover this imaginary file!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			  	console.log(willDelete);
			  	
			  }else {

			  	console.log(willDelete);

			  }
			});
			
		});
		
	</script>
@endpush
@section('content')

<div class="row">
	<div class="col-6">
		<h2>Data Siswa</h2>
	</div>
	<div class="col-6">
		<!-- Button trigger modal -->
		

		<button type="button" class="btn btn-primary mx-3 btn-sm float-right" data-toggle="modal" data-target="#exampleModal">
		  <i class="fas fa-plus fa-fw fa-2x"></i>
		</button>

		<a href="siswas/export/excel" class="btn btn-success btn-sm">
		  <i class="fas fa-save fa-fw fa-lg"></i>Excel
		</a>

		<a href="siswas/export/pdf" class="btn btn-info btn-sm">
		  <i class="fas fa-save fa-fw fa-lg"></i>PDF
		</a>

	</div>
</div>
<div class="row mt-5">
	<div class="col">


		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul class="list-item">
		            @foreach ($errors->all() as $error)
		                <li class="list-group-item">{!! $error !!}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		<div class="table-responsive">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Nama Depan</th>
						<th>Nama Belakang</th>
						<th>Jenis Kelamin</th>
						<th>Agama</th>
						<th>Alamat</th>
						<th>Nilai Rata2</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@forelse(getSiswa() as $siswa)
					<tr>
						<td><a href="{{route('siswas.show', $siswa->id)}}">
							{{ $siswa->nama_depan }}
						</a></td>
						<td><a href="{{route('siswas.show', $siswa->id)}}">
							{{ $siswa->nama_belakang }}
						</a></td>
						<td>{{ $siswa->jenis_kelamin }}</td>
						<td>{{ $siswa->agama }}</td>
						<td>{{ $siswa->alamat }}</td>
						<td>{{ $siswa->nilaiRataRata() }}</td>
						<td>
							<a href="{{ route('siswas.edit', $siswa->id) }}" class="btn btn-success btn-sm btn-circle">
								<i class="fas fa-edit fa-fw fa-sm"></i>
							</a>

							<form class="d-inline hapus" siswa-id="{{$siswa->id}}" siswa-nama="{{$siswa->nama_lengkap()}}" action="{{route('siswas.destroy', 90)}}" method="post">
								@csrf
								@method('delete')
								<button type="submit" type="submit" class="btn btn-danger btn-sm btn-circle hapus">
									<i class="fas fa-trash fa-fw fa-sm"></i>
								</button>

							</form>
						</td>
					</tr>
					@empty
					<tr>
						<td colspan="7" class="text-center">Data Kosong</td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	
      	<form action="{{ route('siswas.store') }}" method="post" enctype="multipart/form-data">
      		@csrf
      		<div class="form-group">
        		<label for="nama_depan">Nama Depan</label>
        		<input type="text" class="form-control" name="nama_depan" value="{{ old('nama_depan') }}">
	        </div>
	        <div class="form-group">
        		<label for="nama_belakang">Nama Belakang</label>
        		<input type="text" class="form-control" name="nama_belakang" value="{{ old('nama_belakang') }}">
	        </div>
	        <div class="form-group">
        		<label for="email">Email</label>
        		<input type="email" class="form-control" name="email" value="{{ old('email') }}">
	        </div>
	        
	        <div class="form-group">
        		<label for="jenis_kelamin">Jenis Kelamin</label>
        		<select name="jenis_kelamin" id="" class="form-control">
        			<option value="">--Pilih--</option>
        			<option @if( old('jenis_kelamin') == 'laki-laki' ) selected @endif value="laki-laki">Laki Laki</option>
        			<option @if( old('jenis_kelamin') == 'perempuan' ) selected @endif value="perempuan" >Perempuan</option>
        		</select>
	        </div>
	        <div class="form-group">
        		<label for="agama">Agama</label>
        		<input type="text" class="form-control" name="agama" value="{{ old('agama') }}">
	        </div>
	        <div class="form-group">
        		<label for="alamat">Alamat</label>
        		<textarea name="alamat" id="" cols="10" rows="5" class="form-control">{{ old('alamat')}}</textarea>
	        </div>
	        <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" class="form-control">
            </div>
	        <div class="form-group">
	        	<button type="submit" class="btn btn-primary">Save changes</button>	
	        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        
	        </div>
	        
      	</form>
      	
        
      </div>
    </div>
  </div>
</div>
@endsection