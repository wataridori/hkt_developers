<?php

use \Illuminate\Support\Facades\Session;
use \Illuminate\Support\Facades\Redirect;

class HomeController extends BaseController {

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
		return View::make('hello', ['hkt_sdk' => $this->hkt_sdk, 'current_user_info' => $this->current_user_info]);
	}

    public function getLogin()
    {
        $user = $this->hkt_sdk->getUser();
        if ($user) {
            Session::put('current_user_info', json_encode($user));
        } else {
            Session::put('current_user_info', '');
        }

        return Redirect::to('/');
    }

    public function getLogout()
    {
        $this->hkt_sdk->logout();
        Session::put('current_user_info', '');

        return Redirect::to('/');
    }
}
