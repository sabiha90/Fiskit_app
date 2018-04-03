<?php

class FormController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}
       
	//Get the 10 most recent users
        public function getRecent()
	{
		$results = DB::select('select * from users_new order by created_at DESC LIMIT 10;');
		return $results;
	}
 
        public function userLogin()
        {
             $userdata = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );
 		
        /* Try to authenticate the credentials */
        if(Auth::attempt($userdata)) 
        {
            // we are now logged in, go to admin
           #$users = DB::select('select id from users where username = ?',[$userdata['username']]);
           return Redirect::to('admin');  
	
        }
        else
        {
            return Redirect::to('login');
        }
     }
	//Users having the most followers
       public function getFollowers($num)
	{
          		
		if (Auth::check())
		{
			$results = DB::select('select * from users_new order by follower_count DESC limit ?',[$num]);
			return $results;
		}
		else
		{
			return Redirect::to('login');
		}

	}
	//Getting the last num comments of a user
      public function getComments($id,$num)
	{
		if (Auth::check())
		{		
			$results = DB::select('select * from sentence_comments where user_id = ? order by created_at DESC limit ?',[$id,$num]);
			return $results;
		}
		else
        	{
            		return Redirect::to('login');
        	}
	}
	//Logging out a User
	public function logout()
	{
		if (Auth::check())
		{
			Auth::logout();
			return Redirect::to('login');
		}
	}


}
