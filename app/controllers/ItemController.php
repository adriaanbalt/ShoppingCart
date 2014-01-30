<?php

class ItemController extends BaseController {


	public function getItem( $id )
	{
		// get data specific to $name

		error_log( $id );

		$this->layout->content = View::make('templates.site.item');
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