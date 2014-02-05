<?php

class ProductController extends BaseController {


	public function getProduct( $id )
	{
		// get data specific to $name

		error_log( $id );

		$this->layout->content = View::make('templates.site.product');
	}



// everyone
	// new product


// creator 
	// delete product
	// rename product
	// add/update description
	// get past sales
	// get oustanding sales
	// get # of followers/likes
	// add photo
	// remove photo


// admin
	// delete product
	// rename product
	// get past sales #

}