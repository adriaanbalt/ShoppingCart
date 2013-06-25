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

	public function index()
	{
		error_log('showLanding im here');

		$this->layout->content = View::make('templates.site.home');
	}

	public function showWelcome()
	{
		error_log('showWelcome im here');
		return View::make('hello');
	}

}