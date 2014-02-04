<?php

class NavigationModel extends Model {

	private $nav = null;

	private $navArr = array();
	private $subNavArr = array();
	private $selected = 'home';
	private $selectedSub = '';

	private $_navigation_data=null;

	protected $table = 'navigation';

	public function getNavigation()
	{
		if ( count($this->navArr) <= 0){
			$this->buildNavigation( NavigationModel::all() );
		}

		debug( print_r( NavigationModel::find(2)->subnav, true ) . "\n" );

		return $this->navArr;
	}

	public function getColor( $id )
	{
		$_color = ColorModel::getAll();
		

		return $_color;
	}

	/**
	 * Build the navigation object for use by the templates
	 *
	 * @param Object $data The data returned by the CMS.
	 * @return Object
	 */
	private function buildNavigation( $data )
	{
		$nav = $this;

		// Determine current location
		$uri_segments = explode('/', trim(Request::root(), '/'));
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
			$nav_item->setID( $n->attributes['id'] );
			$nav_item->setTitle( $n->attributes['title'] );
			$nav_item->setUrl( $n->attributes['url'] );
			$nav_item->setColor( $n->attributes['color_id'] );


			// foreach ($n->subnav as $s) {
			// 	$subnav_item = new SubNavItemModel;
			// 	$subnav_item->setTitle($s->title);
			// 	$subnav_item->setUrlTitle($s->urlTitle);
			// 	// $subnav_item->setChannel($s->channel);

			// 	$nav_item->addSubNavItem($subnav_item);
			// }

			// if ($cur_section == $n->url) {
			// 	$nav->setSubnav($nav_item->getSubnav());
			// 	$nav->setSelectedItem($n->url);
			// }

			$nav->addNavItem($nav_item);
		}

		// foreach ($nav->getSubnav() as $s) {
		// 	if ($cur_subsection == $s->getUrlTitle()) {
		// 		$nav->getSelectedSubItem($s->getUrlTitle());
		// 	}
		// }

		return $nav;
	}


	public function getNav()
	{
		return $this->navArr;
	}

	public function addNavItem( $item )
	{
		$this->navArr[] = $item;
		return $this;
	}

	public function subnav()
	{
		// get subnav based on foreign key
		// $this->where('id','=','nav_id')

		/*
			
		*/
        return $this->hasMany('SubNavItemModel',"nav_id");

		// $this->where( $id ,'=','nav_id')->hasMany('SubNavItemModel');
	}
	public function setSubnav( $subnav )
	{
		$this->subNavArr = $subnav;
		return $this;
	}

	public function getSelectedItem()
	{
		return $this->$selected;
	}
	public function setSelectedItem( $str )
	{
		$this->selected = $str;
		return $this;
	}

	public function getSelectedSubItem()
	{
		return $this->selectedSub;
	}
	public function setSelectedSubItem( $str )
	{
		$this->selectedSub = $str;
		return $this;
	}

}


/*
	id				primary key		unique identifier ie: 283208234
	label
	url
*/