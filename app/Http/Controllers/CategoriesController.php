<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;
use App\Category;
use App\PostTranslation;
use App\CategoryTranslation;


class CategoriesController extends Controller
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

    public function get_categories_list() {
    	$all_categories = Category::all();
        foreach( $all_categories as $each_category ) {
            $each_category->ar_cat_name = CategoryTranslation::where('category_id', $each_category->id)->get();
        }
    	return view('categories.categories_list')->with('all_categories', $all_categories);
    }

    public function add_new_category(Request $request) {
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

    public function edit_category(Request $request) {
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
        CategoryTranslation::where('category_id', $category_id)
                            ->update(['ar_category_name' => $ar_category_name]);
    	if($request->ajax()){
           return response()->json(['editit' => 'yes' ], 200);
        }
    }

    public function delete_category(Request $request) {
    	//category_id
    	$category_id = $request->input('the_cat_id');
    	Category::find($category_id)->delete();
        CategoryTranslation::where('category_id',$category_id)->delete();
    	if($request->ajax()){
           return response()->json(['deleted' => 'yes' ], 200);
        }
    }

    public function get_category_posts($id) {
        $category_name = Category::find($id);
        if( sizeof($category_name) != 0 ) {
        	$category_posts = Category::find($id)->posts()->paginate(10);
            foreach( $category_posts as $each_category_post ) {
                $each_category_post->user_data = Post::find($each_category_post->id)->the_user;
            }
            return view('categories.view_category')->with('category_posts', $category_posts)
                                                   ->with('category_name', $category_name);
        } else {
            return view('errors.404');
        }
    }
}
