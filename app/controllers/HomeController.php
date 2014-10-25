<?php

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
		return View::make('hello', ['hkt_sdk' => $this->hkt_sdk]);
	}

    public function login()
    {
        $user = $this->hkt_sdk->getUser();
        var_dump($user);die();
        // return View::make('hello', ['hkt_sdk' => $hkt_sdk]);
    }
}
