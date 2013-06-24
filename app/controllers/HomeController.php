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

	public function landing($id = null)
	{
		error_log('showLanding im here');
		// if (is_null($id)) {
		// 	$id = 'home';
		// }

		// Pull data from CMS
		// $red = Red::get_instance();
		// $data = $red->get_page_data('landing', $id);

		// if (is_null($data)) {
		// 	return Event::first('404');
		// }

		// // Pull pulse data based on social stream name from CMS
		// $pulse_data = $this->_get_mass_relevance_data(
		// 	$data->get_social_stream_name(),
		// 	Config::get('vars.mass_relevance_num_results')
		// );

		// // Pull the Turn Twitter Red post from Mass Relevance
		// $turn_twitter_red_data = $this->_get_mass_relevance_data(
		// 	Config::get('vars.mass_relevance_turn_twitter_red_stream'),
		// 	1
		// );

		// // Create and add the data to the view
		// $this->layout->nest(
		// 	'content',
		// 	'hello'
		// 	,
		// 	array(
		// 		// 'data' => $data,
		// 		// 'pulse_data' => $pulse_data,
		// 		// 'turn_twitter_red_data' => $turn_twitter_red_data
		// 	)
		// );

		$this->layout->content = View::make('hello');

		// $this->layout->with(array('seo_data' => $this->_get_seo_data($data)));
	}


	public function showWelcome()
	{
		error_log('showWelcome im here');
		return View::make('hello');
	}

}