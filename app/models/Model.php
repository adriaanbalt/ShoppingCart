<?php
/**
 * Base Model
 *
 * Represents the base fields that are used by several other models.
 */

class Model extends Eloquent
{
	/**
	 * The ID of this element
	 */
	protected $id;

	/**
	 * The title of the content or landing page.
	 */
	protected $title;

	/**
	 * 
	 */
	protected $template;

	/**
	 * The type of content model this object represents (EE channel)
	 */
	protected $type;


	public function setID( $id )
	{
		$this->id = $id;
		return $this;
	}
    public function getID()
	{
		return $this->id;
	}


	public function setTitle($title)
	{
		$this->title = $title;
		return $this;
	}
	public function getTitle()
	{
		return $this->title;
	}


	public function setType($type)
	{
		$this->type = $type;
		return $this;
	}
	public function getType()
	{
		return $this->type;
	}


	public function setTemplate($template)
	{
		$this->template = $template;
		return $this;
	}
	public function getTemplate()
	{
		return $this->template;
	}
}