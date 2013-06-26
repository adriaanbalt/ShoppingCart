<?php

class SubNavItemModel extends Model {

	private $subnav = array();

	private $url;

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

	public function getSubNav()
	{
		return $this->subnav;
	}

}


/*
	id				primary key		unique identifier ie: 283208234
	label
	url
*/