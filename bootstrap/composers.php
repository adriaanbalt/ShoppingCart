<?php
/**
 * View Composers
 */

/**
 * Inject navigation data into the navigation partial which is included from the main layout.
 */
View::composer('partials.navigation', function($view)
{
	$navigation = NavigationModel::getNavigation();
	$view->with('navigation', $navigation);
});
