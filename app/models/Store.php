<?php

class Store extends Eloquent {
    protected $guarded = array();

    public static $rules = array();


	public function getID()
	{
		return $this->id;
	}

	public function getUserID()
	{
		return $this->user_id;
	}

	public function getStorename()
	{
		return $this->storename;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getAvgPrice()
	{
		return $this->address;
	}

	public function getLocation()
	{
		//physical location in the world
		return $this->location;
	}

	public function getFollowers()
	{
		return $this->followers;
	}

	public function getPhoto()
	{
		return $this->photo;
	}

	public function getAvgVisits()
	{
		return $this->avgVisits;
	}

}


/*
	id				primary key		unique identifier ie: 283208234
	user id			foreign key		reference to user
	storename		text			letters, numbers, underscores
	name			text			visual	BIG RED BICYCLE
	average price?	varchar			average of all items in the store
	location		varchar			physical location in the world
	followers		foreign key		
	avg visit/day	number			private to the username owner
	photo			varchar			logo
*/