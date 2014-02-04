<?php

class SubNavItemModel extends Model {

	protected $table = 'subnavigation';

	public function NavigationModel()
	{
        return $this->belongsTo('NavigationModel');
	}

	
}


/*
	id				primary key		unique identifier ie: 283208234
	label
	url
*/