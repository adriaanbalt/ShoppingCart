<?php

class ColorModel extends Eloquent {

	protected $table = 'colors';

    public function getID()
	{
		return $this->id;
	}

    public function getLabel()
	{
		return $this->label;
	}
	
	public function getHex()
	{
		return $this->hex;
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