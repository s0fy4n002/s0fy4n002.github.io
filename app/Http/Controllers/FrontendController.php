<?php

namespace App\Http\Controllers;
use App\Setting;
use App\Category;
use App\Tag;
use App\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function index(){
    	
		$posts = Post::orderBy('created_at', 'desc')->get();

    	return view('frontend')
    		->with('title', Setting::first()->site_name)
    		->with('categories', Category::take(5)->get())
    		->with('first_post', Post::orderBy('created_at', 'desc')->first())
    		->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first() )
    		->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first() )
    		->with('career', Category::find(4) )
    		->with('tutorial', Category::find(5) )
            ->with('posts',  $posts)
    		->with('setting', Setting::first());
    }
    public function single($slug){
    	$post = Post::where('slug', $slug)->first();
    	$next_id = Post::where('id', '>', $post->id)->min('id');      
    	$prev_id = Post::where('id', '<', $post->id)->max('id');
    	
    	return view('single')
    		->with('post', $post)
    		->with('title', $post->title)
    		->with('categories', Category::take(5)->get())
    		->with('setting', Setting::first())
    		->with('tags', Tag::all())
    		->with('next', Post::find($next_id))
    		->with('prev', Post::find($prev_id));

    }
    public function categories($id){
    	
    	return view('categories')
    		->with('cat', Category::findOrFail($id))
    		->with('setting', Setting::first())
    		->with('categories', Category::take(5)->get())
    		->with('tags', Tag::all());

    }

    public function tags($id){
    	
    	return view('tags')
    				->with('t', Tag::findOrFail($id))
    				->with('setting', Setting::first())
    				->with('tags', Tag::take(5)->get())
    				->with('categories', Category::take(5)->get());
	}
	
	public function cari(Request $request){
    	
    	return view('tags')
    				->with('t', Tag::findOrFail($id))
    				->with('setting', Setting::first())
    				->with('tags', Tag::take(5)->get())
    				->with('categories', Category::take(5)->get());
    }
}
