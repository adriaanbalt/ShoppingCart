<?php

class NavItemModel extends Model {

	protected $subnav = array();

	protected $color_id;

	protected $url;

	public function NavItemModel () {
		// here i could get the subnav base don the $id
	}

	public function setUrl($url)
	{
		$this->url = $url;
		return $this;
	}
	public function getUrl()
	{
		return $url;
	}

	public function addSubNavItem( $subNavItem )
	{
		$this->subnav[] = $subNavItem;
		return $this;
	}

	public function getSubnav()
    {
        return $this->hasMany('SubNavItemModel');
    }


	public function setColor( $color_id )
	{
		$this->color_id = $color_id;
		return $this;
	}
	public function getColor()
	{
		return $this->color_id;
	}
}

/*
	id				primary key		unique identifier ie: 283208234
	label
	url
*/