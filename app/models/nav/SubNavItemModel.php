<?php

class SubNavItemModel extends Model {

	protected $table = 'subnavigation';

	public function navitem()
	{
        return $this->belongsTo('NavItemModel');
	}

	
}


/*
	id				primary key		unique identifier ie: 283208234
	label
	url
*/