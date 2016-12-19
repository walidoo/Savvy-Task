<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use Auth;

use App\User;
use App\Post;
use App\Category;


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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function get_dashboard_details() {
        $users_count = User::count();
        $user_id = Auth::user()->id;
        $posts_count = Post::where('user_id', $user_id)->count();
        $category_count = Category::count();
        return view('home')->with('users_count', $users_count)
                           ->with('posts_count', $posts_count)
                           ->with('category_count', $category_count);
    }
}
