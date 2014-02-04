<?php

App::singleton('Colors', function()
{
	$_color = new ColorModel;
	$colors = $_color->getAll();
	return $colors;
});

function debug ( $arg ) {
	file_put_contents( '/Users/adriaan.scholvinck/PROJECTS/BALT/ShoppingCart/logs/temp.log', $arg, FILE_APPEND );

	file_put_contents( '/Users/adriaan.scholvinck/PROJECTS/BALT/ShoppingCart/logs/temp.log', "-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-\n\n\n\n\n\n\n\n\n\n\n\n", FILE_APPEND );
}
