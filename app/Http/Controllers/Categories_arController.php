<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\Post;
use App\Category;
use App\PostTranslation;
use App\CategoryTranslation;

class Categories_arController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }

    public function lcallfirst($string) {
		$string=explode(" ",$string);
		$i=0;
		while($i<count($string))
		{$string[$i]=lcfirst($string[$i]);
		$i++;}
		return implode(" ",$string);
	}

    public function ar_get_categories_list() {
    	$all_categories = Category::all();
        foreach( $all_categories as $each_category ) {
            $each_category->ar_cat_name = CategoryTranslation::where('category_id', $each_category->id)->get();
        }
    	return view('ar.categories.categories_list')->with('all_categories', $all_categories);
    }

    public function ar_add_new_category(Request $request) {
    	//category_name
    	$category_name = $request->input('cat_name');
        $ar_category_name = $request->input('ar_cat_name');
    	//category_slug
    	$category_slug = $this->lcallfirst($category_name);
    	$category_slug = lcfirst(str_replace(" ", "_", $category_slug));
    	$new_category = new Category();
    	$new_category->category_name = $category_name;
    	$new_category->category_slug = $category_slug;
    	$new_category->save();
        //Add New Translation Category
        $ar_new_category = new CategoryTranslation();
        $ar_new_category->category_id = $new_category->id;
        $ar_new_category->ar_category_name = $ar_category_name;
        $ar_new_category->locale = 'ar';
        $ar_new_category->save();
    	if($request->ajax()){
           return response()->json(['added' => 'yes' ], 200);
        }
    }

    public function ar_edit_category(Request $request) {
    	//category_id
    	$category_id = $request->input('new_cat_id');
    	//category_name
    	$category_name = $request->input('new_cat_name');
        $ar_category_name = $request->input('new_ar_cat_name');
    	//category_slug
    	$category_slug = $this->lcallfirst($category_name);
    	$category_slug = str_replace(" ", "_", $category_slug);
    	$the_category = Category::find($category_id);
    	$the_category->category_name = $category_name;
    	$the_category->category_slug = $category_slug;
    	$the_category->save();
        $updated = CategoryTranslation::where('category_id', $category_id)->get();
        if( sizeof($updated) == 0 ) {
        	$new_ar_cat = new CategoryTranslation();
        	$new_ar_cat->ar_category_name = $ar_category_name;
        	$new_ar_cat->category_id = $category_id;
        	$new_ar_cat->locale = 'ar';
        	$new_ar_cat->save();
        } else {
           CategoryTranslation::where('category_id', $category_id)->update(['ar_category_name' => $ar_category_name]);
        }
    	if($request->ajax()){
           return response()->json(['editit' => $updated ], 200);
        }
    }

    public function ar_delete_category(Request $request) {
    	//category_id
    	$category_id = $request->input('the_cat_id');
    	Category::find($category_id)->delete();
        CategoryTranslation::where('category_id',$category_id)->delete();
    	if($request->ajax()){
           return response()->json(['deleted' => 'yes' ], 200);
        }
    }

    public function ar_get_category_posts($id) {
        $the_category_name = Category::find($id);
        if( sizeof($the_category_name) != 0 ) {
            $ar_category_name = Category::find($id)->translate();
        	$category_posts = Category::find($id)->ar_posts()->paginate(10);
            foreach( $category_posts as $each_category_post ) {
                $each_category_post->user_data = Post::find($each_category_post->post_id)->the_user;
                $each_category_post->ar_post_thumbnail = Post::find($each_category_post->post_id);
            }
            return view('ar.categories.view_category')->with('category_posts', $category_posts)
                                                   ->with('category_name', $ar_category_name);
        } else {
            return view('errors.404');
        }
    }
}
