<?php
use App\Siswa;
use App\Guru;

function rangking5besar(){

	$siswa = Siswa::all();
	$siswa->map(function($s){
		$s->nilaiRataRata = $s->nilaiRataRata();
		return $s;		
	});
	$siswa = $siswa->sortByDesc('nilaiRataRata')->take(5);
	return $siswa;
}

function total_siswa(){
	$total_siswa = Siswa::count();
	return $total_siswa;
}

function total_guru(){
	$total_guru = Guru::count();
	return $total_guru;
}

function getSiswa(){
	if (request()->has('cari')) {
            $siswa = Siswa::where('nama_depan', 'LIKE', '%'.$request->cari.'%')->get();
        }else{
            $siswa = Siswa::all();
        }


	$siswa->map(function($s){
	$s->nilaiRataRata = $s->nilaiRataRata();
		return $s;		
	});
	$siswa = $siswa->sortByDesc('nilaiRataRata');
	return $siswa;


}