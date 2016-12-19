<?php
use App\Post;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
	Route::auth();

//Localization
Route::group(['prefix' => LaravelLocalization::setLocale('ar')], function()
{
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

    Route::any('/postslist', 'Posts_arController@ar_add_new_post');

	Route::any('/post/edit/{id}', 'Posts_arController@ar_edit_post');

	Route::get('/post/{id}', ['as' => 'ar_the_post', 'uses' => 'Posts_arController@ar_view_the_post']);

	Route::delete('/ar_delete_post', 'Posts_arController@ar_delete_post');


	Route::get('/categorieslist', 'Categories_arController@ar_get_categories_list');

	Route::get('/ar_add_category', 'Categories_arController@ar_add_new_category');

	Route::get('/ar_edit_category', 'Categories_arController@ar_edit_category');

	Route::delete('/ar_delete_category', 'Categories_arController@ar_delete_category');

	Route::get('/category/{id}', ['as' => 'the_category', 'uses' => 'Categories_arController@ar_get_category_posts']);

});
//End of Localization




Route::get('/', 'HomeController@index');

Route::get('/', 'HomeController@get_dashboard_details');

Route::get('/userslist', 'UsersController@get_users_list');

Route::get('/edit_user', 'UsersController@edit_user');

Route::get('/add_user', 'UsersController@add_new_user');

Route::delete('/delete_user', 'UsersController@delete_user');


Route::any('/postslist', 'PostsController@add_new_post');

Route::any('/post/edit/{id}', 'PostsController@edit_post');

Route::get('/post/{id}', ['as' => 'the_post', 'uses' => 'PostsController@view_the_post']);

Route::delete('/delete_post', 'PostsController@delete_post');


Route::get('/categorieslist', 'CategoriesController@get_categories_list');

Route::get('/add_category', 'CategoriesController@add_new_category');

Route::get('/edit_category', 'CategoriesController@edit_category');

Route::delete('/delete_category', 'CategoriesController@delete_category');

Route::get('/category/{id}', ['as' => 'the_category', 'uses' => 'CategoriesController@get_category_posts']);

