<?php

class UserController extends BaseController {

	public function index()
	{
		$this->layout->content = View::make('templates.site.users');
	}

	public function getSpecificUser( $id )
	{
		// get data specific to $name

		error_log( $id );

		$this->layout->content = View::make('templates.site.user');
	}
}