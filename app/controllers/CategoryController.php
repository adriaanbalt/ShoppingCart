<?php

class CategoryController extends BaseController {

	public function index()
	{
		$this->layout->content = View::make('templates.categories');
	}

	public function showCategory( $id = null )
	{
		if (is_null($id)) {
			$id = 'categories';
		}

		// retreives the data based on the $id

		$this->layout->content = View::make('templates.category');
	}

}