<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use App\User;
use App\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware(['auth'])->only(['create', 'store']);
    }

    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        if ($categories->count() == 0) {
            return redirect()->route('categories.create')->with('error', 'You must have some categories before attempting to create a post');
        }
        $tags = Tag::all();
        if ($tags->count() == 0) {
            return redirect()->route('tags.create')->with('error', 'You must have some tag before attempting to create a post');
        }
        return view('admin.posts.create')->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'title' => 'required',
            'featured' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
        ]);

        $image = $request->featured->store('posts', 'public');
        
        $post = Post::create([
            'title' => $request->title,
            'featured' => $image,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->title),
            'user_id' => auth()->user()->id,
        ]); 
        $post->tags()->attach($request->tags);

        return redirect()->route('posts.index')->with('success', 'Post Telah ditambahkan');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.create')->with('edit', $post)->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
        ]); 
        $data = $request->only(['title', 'content', 'category_id']);
        if ($request->hasFile('featured')) {
            
            $featured = $request->featured->store('posts', 'public');
            // delete old one
            $post->deleteImage();

            // $data['featured'] = $featured;
            $post->featured = $featured;
        }
        // upload it
        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();
            // upload it
        // $post->update($data);

        // redirect
        return redirect()->route('posts.index')->with('success', 'post Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('success', 'The Post Was Just Trashed');
    }

    public function trashed()
    {
        return view('admin.posts.index')->with('trashed', Post::onlyTrashed()->get());
    }

    public function deletePermanen($id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();
        return redirect()->back()->with('success', 'Post Deleted Permanetly');

    }

    public function restore($id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        return redirect()->back()->with('success', 'Post restored Successfully');
    }

}
