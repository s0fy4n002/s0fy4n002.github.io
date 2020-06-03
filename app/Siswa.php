<?php

namespace App;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Mapel;

class Siswa extends Model
{
    use softDeletes;
    
    protected $fillable = ['nama_depan', 'nama_belakang', 'jenis_kelamin', 'agama', 'alamat', 'user_id', 'avatar'];
    public function user(){
    	$this->hasOne(\App\User::class, 'user_id');
    }
    public function mapel(){
    	return $this->belongsToMany(\App\Mapel::class)->withPivot(['nilai'])->withTimeStamps();
    }
    public function nilaiRataRata(){
    	$total = 0;
    	$hitung = Mapel::count();
    	foreach ($this->mapel as $mapel) {
    		$total += $mapel->pivot->nilai;
    	}
    	if ($hitung == false ) {
    		$nilaiRata2 = 0;
    	}elseif($total == 0){
    		$nilaiRata2 = 0;
    	}
    	else{
    		$nilaiRata2 = $total / $hitung;	
    	}
    	
    	return $nilaiRata2;
    }
    public function nama_lengkap(){
    	return $this->nama_depan.' '.$this->nama_belakang;
    }
}
