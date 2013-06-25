<?php

class UserController extends BaseController {

	public function index()
	{
		$this->layout->content = View::make('templates.site.users');
	}
}