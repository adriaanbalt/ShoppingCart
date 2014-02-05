<?php

class UserController extends BaseController {

	public function index()
	{
		$this->layout->content = View::make('templates.site.users');
	}

	public function getUser( $id )
	{
		// get data specific to $name

		error_log( $id );

		$this->layout->content = View::make('templates.site.user');
	}


// everyone
	// new user
	// display single user
	// display all users


// creator 
	// delete store
	// rename store
	// add/update description
	// get # of followers
	// get orders
	// add photo to store
	// remove photo from store
	// add product to store
	// remove product from store


// admin
	// delete store
	// rename store
	// get orders

}