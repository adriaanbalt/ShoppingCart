<?php
/**
 * Base Model
 *
 * Represents the base fields that are used by several other models.
 */

class Model extends Eloquent
{
	/**
	 * The title of the content or landing page.
	 */
	protected $title;

	/**
	 * The string that is used to get the details for the content
	 * from the CMS.
	 */
	protected $urlTitle;

	/**
	 * The type of content model this object represents (EE channel)
	 */
	protected $type;

	public function setTitle($title)
	{
		$this->label = $title;
		return $this;
	}

	public function getTitle()
	{
		return $this->get('label');
	}

	public function setUrlTitle($urlTitle)
	{
		$this->urlTitle = $urlTitle;
		return $this;
	}

	public function setType($type)
	{
		$this->type = $type;
		return $this;
	}

}