<?php

class Navigatin extends Eloquent {
    protected $guarded = array();

    public static $rules = array();


	public function getID()
	{
		return $this->id;
	}

	public function getLabel()
	{
		return $this->user_id;
	}

	public function getURL()
	{
		return $this->store_id;
	}

}


/*
	id				primary key		unique identifier ie: 283208234
	label
	url
*/