<?php

	Router::connect('/admin/users/:action', array('controller' => 'users','admin' => true));
	Router::connect('/admin', array('controller' => 'pages', 'action' => 'index', 'admin' => true));
	Router::connect('/page/*', array('controller' => 'pages', 'action' => 'index'));
	Router::connect('/contacts', array('controller' => 'pages', 'action' => 'contacts'));
	Router::connect('/search/*', array('controller' => 'products', 'action' => 'search'));
	Router::connect('/portfolio', array('controller' => 'portfolios', 'action' => 'index'));
	Router::connect('/portfolio/*', array('controller' => 'portfolios', 'action' => 'view'));
	Router::connect('/blog', array('controller' => 'news', 'action' => 'index'));
	Router::connect('/blog/*', array('controller' => 'news', 'action' => 'view'));
	Router::connect('/service/*', array('controller' => 'services', 'action' => 'view'));
	Router::connect('/', array('controller' => 'pages', 'action' => 'home'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
