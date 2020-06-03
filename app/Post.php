<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use softDeletes;
    
	protected $fillable = ['title', 'featured', 'content', 'category_id', 'slug','user_id'];
	// protected $dates = ['deleted_at'];
    public function categories(){
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags(){
    	return $this->belongsToMany(Tag::class);
    }

    public function deleteImage(){
    	Storage::delete($this->image);
    }

    public function users(){
        return $this->belongsTo(\App\User::class, 'user_id');
    }
}
