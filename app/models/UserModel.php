<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserModel extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->hasOne('email');
	}

	public function getID()
	{
		return $this->hasOne('id');
	}

	public function getUsername()
	{
		return $this->hasOne('username');
	}

	public function getName()
	{
		return $this->hasOne('name');
	}

	public function getAddress()
	{
		return $this->hasOne('address');
	}

	public function getTelephone()
	{
		return $this->hasOne('telephone');
	}

	public function getFavorites()
	{
		return $this->favorites;
	}

	public function getAvatar()
	{
		return $this->hasOne('avatar');
	}

}


/*
	id			primary key			unique identifier ie: 283208234
	username	varchar				letters, numbers, underscores
	name		varchar	required	visual
	email		varchar	required	
	password	varchar	required	
	address		varchar	required	can be hidden on request
	telephone 	varchar	optional	can be hidden on request
	favorites	varchar	array		can be hidden on request
	photo		varchar				logo
*/