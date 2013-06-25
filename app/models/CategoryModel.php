<?php

class CategoryModel extends Eloquent {
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

	public function getStoreID()
	{
		return $this->store_id;
	}

	public function getHash()
	{
		return $this->hash;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getPrice()
	{
		return $this->price;
	}

	public function getQuantity()
	{
		return $this->quantity;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getShipMethod()
	{
		return $this->ship_method;
	}

	public function getShipRate()
	{
		return $this->ship_rate;
	}

	public function getGallery()
	{
		return $this->gallery;
	}

	public function getLikes()
	{
		return $this->like;
	}
}


/*
	id				primary key		unique identifier ie: 283208234
	store id		foreign key		reference to store
	user id			foreign key		reference to user
	name			varchar	visual	ie: Pencil Man
	price			number		
	quantity		number		
	description		text		
	ship or pickup 	boolean		
	ship rate		number			based on zipcode of buyer?
	gallery			foreign key		
	hash 			varchar			letters, numbers, underscores
	likes			foreign key		
*/