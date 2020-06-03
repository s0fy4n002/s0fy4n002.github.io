<?php

namespace App\Http\Controllers;
use App\User;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard')
            ->with('trashed_count', Post::onlyTrashed()->get()->count())
            ->with('posts_count', Post::all()->count())
            ->with('categories_count', Category::all()->count())
            ->with('users_count', User::all()->count());
    }

    public function getData(Request $request){

        $posts_count = Post::all()->count();
        $trashed_count = Post::onlyTrashed()->get()->count();
        $categories_count = Category::all()->count();
        $users_count = User::all()->count();


        echo "
        <div class=\"col-xl-3 col-md-6 mb-4\">
          <div class=\"card border-left-primary shadow h-100 py-2\">
            <div class=\"card-body\">
              <div class=\"row no-gutters align-items-center\">
                <div class=\"col mr-2\">
                  <div class=\"text-xs font-weight-bold text-primary text-uppercase mb-1\">Posted</div>
                  <div class=\"h5 mb-0 font-weight-bold text-gray-800\">$posts_count</div>
                </div>
                <div class=\"col-auto\">
                  <i class=\"fas fa-calendar fa-2x text-gray-300\"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class=\"col-xl-3 col-md-6 mb-4\">
          <div class=\"card border-left-danger shadow h-100 py-2\">
            <div class=\"card-body\">
              <div class=\"row no-gutters align-items-center\">
                <div class=\"col mr-2\">
                  <div class=\"text-xs font-weight-bold text-danger text-uppercase mb-1\">Trahsed Post</div>
                  <div class=\"h5 mb-0 font-weight-bold text-gray-800\">$trashed_count</div>
                </div>
                <div class=\"col-auto\">
                  <i class=\"fas fa-calendar fa-2x text-gray-300\"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class=\"col-xl-3 col-md-6 mb-4\">
          <div class=\"card border-left-success shadow h-100 py-2\">
            <div class=\"card-body\">
              <div class=\"row no-gutters align-items-center\">
                <div class=\"col mr-2\">
                  <div class=\"text-xs font-weight-bold text-success text-uppercase mb-1\">Users Post</div>
                  <div class=\"h5 mb-0 font-weight-bold text-gray-800\">$users_count</div>
                </div>
                <div class=\"col-auto\">
                  <i class=\"fas fa-calendar fa-2x text-gray-300\"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class=\"col-xl-3 col-md-6 mb-4\">
          <div class=\"card border-left-warning shadow h-100 py-2\">
            <div class=\"card-body\">
              <div class=\"row no-gutters align-items-center\">
                <div class=\"col mr-2\">
                  <div class=\"text-xs font-weight-bold text-warning text-uppercase mb-1\">Categories</div>
                  <div class=\"h5 mb-0 font-weight-bold text-gray-800\">$categories_count</div>
                </div>
                <div class=\"col-auto\">
                  <i class=\"fas fa-calendar fa-2x text-gray-300\"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        ";
    }
}
