<?php

class AdminController extends BaseController {

	public $layout = 'layouts.static';

	public function index()
	{
		$this->layout->content = View::make('templates.admin.admin-index');
	}

	// add

	// delete

	


}