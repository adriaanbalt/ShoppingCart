<?php

class CategoryController extends BaseController {

	public function index()
	{
		$this->layout->content = View::make('templates.users');
	}

}