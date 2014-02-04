<?php

App::singleton('Colors', function()
{
	$_color = new ColorModel;
	$colors = $_color->getAll();
	return $colors;
});