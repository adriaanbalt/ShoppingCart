<?php

class StoreController extends BaseController {

	public function index()
	{	
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

		$this->layout->content = View::make('templates.site.store');

		// $this->layout->with(array('seo_data' => $this->_get_seo_data($data)));
	}

// everyone
	// new store
	// display single store
	// display all stores


// creator 
	// delete store
	// rename store
	// add/update description
	// get # of followers
	// get orders
	// add photo
	// remove photo
	// add product
	// remove product


// admin
	// delete store
	// rename store
	// get orders


}