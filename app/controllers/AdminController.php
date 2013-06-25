<?php

class AdminController extends BaseController {

	public $layout = 'layouts.static';

	public function index()
	{
		error_log('showLanding im here');

		$this->layout->content = View::make('templates.admin.admin-index');
	}

	// add

	// delete

	


}