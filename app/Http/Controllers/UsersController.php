<?php

namespace App\Http\Controllers;
use App\User;
use App\Tag;
use App\Category;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Seeder;
use Response;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth')->only(['getdata', 'index']);
    }
    public function index()
    {
        return view('admin.users.index');
    }

    public function getdata(Request $request){
        
        $users = User::with('profile')->get();
        return Response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password'),
            'remember_token' => 'asdf90*iaIs',
        ]);

        Profile::create([
            'user_id' => $user->id,
            'avatar' => 'posts/image.jpeg',
            'about' => 'asdf asdf asdf asdf asdf',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com',
        ]);
        return redirect()->route('users.index')->with('success', 'Post was added');
    }

    public function admin($id){
    	
        $user = User::find($id);
        $user->admin = 1;
        $user->save();
        return redirect()->back()->with('success', 'premission was changed to admin');
    }
    public function notadmin($id){
    	
        $user = User::find($id);
        $user->admin = 0;
        $user->save();
        return redirect()->back()->with('success', 'premission was changed to not admin');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
        $user->profile->delete();
        $user->delete();
        return redirect()->back()->with('success', 'User deleted');
    }
}
