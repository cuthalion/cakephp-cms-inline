<?php

	Router::connect('/admin', array('controller' => 'Users', 'action' => 'login', 'home','admin'=>true));
	Router::connect('/admin/:controller', array('action' => 'index','admin'=>true));
	Router::connect('/admin/:controller/:action', array('admin'=>true));
	Router::connect('/admin/:controller/:action/*', array('admin'=>true));
	
	Router::connect('/instalar', array('controller' => 'Users', 'action' => 'instalar'));
	
	Router::connect('/', array('controller' => 'Paginas', 'action' => 'display', 'home'));
	//Router::connect('/*', array('controller' => 'Paginas', 'action' => 'display'));

	CakePlugin::routes();

	require CAKE . 'Config' . DS . 'routes.php';
