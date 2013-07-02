<?php
/**
 * View Composers
 */

/**
 * Inject navigation data into the navigation partial which is included from the main layout.
 */
View::composer('partials.navigation', function($view)
{
	$navigation = new NavigationModel;
	$view->with('navigation', $navigation->getNavigation());
});
