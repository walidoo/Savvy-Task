<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use App\Post;
use App\Category;
use App\PostTranslation;
use App\CategoryTranslation;


class PostsController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }

    /*public function get_posts_list() {
    	$all_categories = Category::all();
    	return view('posts.post_list')->with('all_categories', $all_categories);
    }*/

    public function add_new_post(Request $request) {
        //get all categories for drop-down
        $all_categories = Category::all();
        $user_id = Auth::user()->id;
        $all_user_posts = Post::where('user_id', $user_id)->get();
        foreach( $all_user_posts as $each_user_post ) {
            $each_user_post->post_category_name = Post::find($each_user_post->id)->category;
            //arabic posts_data
            /*$each_user_post->ar_post_data = PostTranslation::where('post_id', $each_user_post->id)->get();*/
        }
        $submitted = $request->input('add_post');
        if( isset( $submitted ) ) {
            $post_title = $request->input('post_title');
            $ar_post_title = $request->input('ar_post_title');
            $post_category_id = $request->input('post_cat_id');
            $post_desc = $request->input('post_desc');
            $ar_post_desc = $request->input('ar_post_desc');
            $new_post = new Post();
            $new_post->post_title = $post_title;
            $new_post->post_desc = $post_desc;
            $new_post->user_id = $user_id;
            $new_post->category_id = $post_category_id;
            //Upload Post Thumbnail
            if ($request->hasFile('post_thumbnail')) {
                $post_img = $request->file('post_thumbnail');
                $new_post->post_thumbnail = $post_img->getClientOriginalName();
                if ($request->file('post_thumbnail')->isValid()) {
                    $request->file('post_thumbnail')->move(public_path('images/posts'), $post_img->getClientOriginalName());
                }
            }
            $new_post->save();
            $ar_new_post = new PostTranslation();
            $ar_new_post->post_id = $new_post->id;
            $ar_new_post->ar_post_title = $ar_post_title;
            $ar_new_post->ar_post_desc = $ar_post_desc;
            $ar_new_post->ar_category_id = $post_category_id;
            $ar_new_post->locale = 'ar';
            $ar_new_post->save();
            return redirect()->back();
        }
        return view('posts.post_list')->with('all_categories', $all_categories)
                                      ->with('all_user_posts', $all_user_posts);
    }

    public function view_the_post($id) {
        $The_post = Post::find($id);
        if( sizeof($The_post) != 0 ) {
            $The_post->category_name = Post::find($id)->category;
            $The_post->user_data = Post::find($id)->the_user;
            return view('posts.view_post')->with('The_post', $The_post);
        } else {
            return view('errors.404');
        }
    }

    public function edit_post($id, Request $request) {
        $all_categories = Category::all();
        $user_id = Auth::user()->id;
        $The_post = Post::find($id);
        $The_post->category_name = Post::find($id)->category;
        $The_post->ar_post_data = PostTranslation::where('post_id', $id)->get();
        $submitted = $request->input('edit_post');
        if( isset( $submitted ) ) {
            $post_title = $request->input('edit_post_title');
            $ar_post_title = $request->input('edit_ar_post_title');
            $post_category_id = $request->input('edit_post_category');
            $post_desc = $request->input('edit_post_desc');
            $ar_post_desc = $request->input('edit_ar_post_desc');
            $edit_thisPost = Post::find($id);
            $edit_thisPost->post_title = $post_title;
            $edit_thisPost->post_desc = $post_desc;
            $edit_thisPost->user_id = $user_id;
            $edit_thisPost->category_id = $post_category_id;
            //Upload Post Thumbnail
            if ($request->hasFile('edit_post_thumb')) {
                $post_img = $request->file('edit_post_thumb');
                $edit_thisPost->post_thumbnail = $post_img->getClientOriginalName();
                if ($request->file('edit_post_thumb')->isValid()) {
                    $request->file('edit_post_thumb')->move(public_path('images/posts'), $post_img->getClientOriginalName());
                }
            } else {

            }
            $edit_thisPost->save();
            PostTranslation::where('post_id', $id)
                            ->update(['ar_post_title' => $ar_post_title, 'ar_post_desc' => $ar_post_desc]);
            return redirect()->route('the_post', ['id' => $id]);
        }
        return view('posts.edit_post')->with('The_post', $The_post)
                                      ->with('all_categories', $all_categories);
    }

    public function delete_post(Request $request) {
        //post_id
        $post_id = $request->input('this_post_id');
        Post::find($post_id)->delete();
        PostTranslation::where('post_id',$post_id)->delete();
        if($request->ajax()){
           return response()->json(['postDeleted' => 'yes' ], 200);
        }
    }


}
