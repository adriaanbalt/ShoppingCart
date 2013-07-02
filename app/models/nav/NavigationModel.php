<?php

class NavigationModel extends Eloquent {

	private $_navigation_data=null;

	protected $table = 'navigation';

	public function getNavigation()
	{
		if ( !$this->_navigation_data ){
			$_navigation_data = NavigationModel::all();
		}
		return $_navigation_data;
	}

	/**
	 * Build the navigation object for use by the templates
	 *
	 * @param Object $data The data returned by the CMS.
	 * @return Object
	 */
	private function buildNavigation($data)
	{
		$nav = new Navigation;

		// Determine current location
		$uri_segments = explode('/', trim(\Laravel\URI::current(), '/'));
		$cur_section = 'home';
		$cur_subsection = '';
		$num_segments = count($uri_segments);
		if (isset($uri_segments[0])) {
			$cur_section = $uri_segments[0];
		}
		if ($num_segments > 1) {
			$cur_subsection = $uri_segments[$num_segments - 1];
		}

		foreach ($data as $n) {
			$nav_item = new NavItemModel;
			$nav_item->setTitle($n->title);
			$nav_item->setUrlTitle($n->urlTitle);
			$nav_item->setUrl($n->url);

			foreach ($n->subnav as $s) {
				$subnav_item = new SubNavItemModel;
				$subnav_item->setTitle($s->title);
				$subnav_item->setUrlTitle($s->urlTitle);
				// $subnav_item->setChannel($s->channel);

				$nav_item->addSubNavItem($subnav);
			}

			if ($cur_section == $n->url) {
				$nav->setSubnav($nav_item->getSubnav());
				$nav->setSelectedItem($n->url);
			}

			$nav->addItem($nav_item);
		}

		foreach ($nav->getSubnav() as $s) {
			if ($cur_subsection == $s->getUrlTitle()) {
				$nav->getSelectedSubItem($s->getUrlTitle());
			}
		}

		return $nav;
	}

	public function getSubnav()
	{

	}
	public function setSubnav()
	{

	}

	public function getSelectedItem()
	{

	}
	public function setSelectedItem()
	{
		
	}

	public function getSelectedSubItem()
	{

	}
	public function setSelectedSubItem()
	{

	}

	public function addItem()
	{

	}

	

}


/*
	id				primary key		unique identifier ie: 283208234
	label
	url
*/