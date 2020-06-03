@extends('layouts.master-1')
@section('title', 'Update')
@section('content')

<div class="row mt-5">
            <div class="col-6">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-item">
                            @foreach ($errors->all() as $error)
                                <li class="list-group-item">{!! $error !!}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2>Update Data</h2>


            <form action="{{ route('siswas.update', $edit->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_depan">Nama Depan</label>
                    <input type="text" class="form-control" name="nama_depan" value="{{ $edit->nama_depan }}">
                </div>
                <div class="form-group">
                    <label for="nama_belakang">Nama Belakang</label>
                    <input type="text" class="form-control" name="nama_belakang" value="{{ $edit->nama_belakang }}">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="" class="form-control">
                        <option value="">--Pilih--</option>
                        <option @if( $edit->jenis_kelamin == 'laki-laki' ) selected @endif value="laki-laki">Laki Laki</option>
                        <option @if( $edit->jenis_kelamin == 'perempuan' ) selected @endif value="perempuan" >Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="agama">Agama</label>
                    <input type="text" class="form-control" name="agama" value="{{$edit->agama }}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="" cols="10" rows="5" class="form-control">{{ $edit->alamat }}</textarea>
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input type="file" name="avatar" class="form-control">
                </div>
                <div class="form-group">
                    
                    <button type="submit" class="btn btn-primary">Update</button>   
                </div>
            </form>

            </div>
        </div>
@endsection