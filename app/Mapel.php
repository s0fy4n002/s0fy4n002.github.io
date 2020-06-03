<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $fillable = ['kode', 'nama', 'semester'];
    public function siswa(){
    	return $this->belongsToMany(\App\Siswa::class)->withPivot(['nilai']);
    }
    public function guru(){
    	return $this->belongsTo(\App\Guru::class, 'guru_id');
    }
}
