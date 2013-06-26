<?php

class ItemController extends BaseController {

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


// everyone
	// new item


// creator 
	// delete item
	// rename item
	// add/update description
	// get past sales
	// get oustanding sales
	// get # of followers/likes
	// add photo
	// remove photo


// admin
	// delete item
	// rename item
	// get past sales #

}