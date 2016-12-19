<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class UsersController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }

    public function get_users_list() {
    	$all_users = User::all();
    	return view('users.users_list')->with('all_users', $all_users);
    }

    public function add_new_user(Request $request) {
    	$first_name = $request->input('the_fname');;
    	$last_name = $request->input('the_lname');;
    	$email = $request->input('the_email');;
    	$pass = $request->input('the_pass');;

    	User::create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' => bcrypt($pass),
        ]);
        if($request->ajax()){
           return response()->json(['userAdded' => 'yes' ], 200);
        }
    }

    public function edit_user(Request $request) {
    	$user_id = $request->input('the_ID');
    	$user_firstName = $request->input('the_fname');
    	$user_lastName = $request->input('the_lname');
    	$user_email = $request->input('the_email');
    	$user_pass = $request->input('the_pass');
    	$This_user = User::find( $user_id );
    	$This_user->first_name = $user_firstName;
    	$This_user->last_name = $user_lastName;
    	$This_user->email = $user_email;
        if(!empty($user_pass)) {
    	   $This_user->password = bcrypt( $user_pass );
        }
    	$This_user->save();    	
    	if($request->ajax()){
           return response()->json(['userEditit' => 'yes' ], 200);
        }
    }

    public function delete_user(Request $request) {
    	$The_userId = $request->input('this_user_id');
    	User::find( $The_userId )->delete();
    	if($request->ajax()){
           return response()->json(['userDeleted' => 'yes' ], 200);
        }
    }

}
