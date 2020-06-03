<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    //
    protected $table = 'guru';
    public function mapels(){
    	return $this->hasMany(\App\Mapel::class);
    }
}
