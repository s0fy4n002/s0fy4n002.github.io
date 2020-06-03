	<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mapels_siswas extends Model
{
    //
    protected $table = 'mapels_siswas';
    protected $fillable = ['siswa_id', 'mapel_id', 'nilai'];
}
