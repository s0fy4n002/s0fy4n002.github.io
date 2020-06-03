<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{
    protected $fillable = ['user_id', 'avatar', 'about', 'facebook', 'youtube',];

    public function users(){
    	return $this->belongsTo(User::class, 'user_id');
    }
    public function deleteImage(){
    	Storage::delete($this->avatar);
    }
}
