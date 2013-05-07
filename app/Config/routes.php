<?php
<<<<<<< HEAD
	//Users
	Router::connect('/Users/:action', array('controller' => 'Users'));
	Router::connect('/Users/:action/*', array('controller' => 'Users'));
	Router::connect('/users/:action', array('controller' => 'Users'));
	Router::connect('/users/:action/*', array('controller' => 'Users'));
	Router::connect('/admin', array('controller' => 'Users', 'action' => 'login'));
	
	//Ajuda
	Router::connect('/Ajuda/index', array('controller' => 'Ajuda','action'=>'index'));
		
	//Ajax
	Router::connect('/Ajax/:action', array('controller' => 'Ajax'));
	Router::connect('/Ajax/:action/*', array('controller' => 'Ajax'));
	
	//Páginas
	Router::connect('/Paginas/:action', array('controller' => 'Paginas'));
	Router::connect('/Paginas/:action/*', array('controller' => 'Paginas'));
	Router::connect('/Paginas/:action/*/*', array('controller' => 'Paginas'));
	
	//Sliders
	Router::connect('/Sliders/:action', array('controller' => 'Sliders'));
	Router::connect('/Sliders/:action/*', array('controller' => 'Sliders'));
	
	//Cobrancas
	Router::connect('/Cobrancas/:action', array('controller' => 'Cobrancas'));
	Router::connect('/Cobrancas/:action/*', array('controller' => 'Cobrancas'));
	
	//Textos
	Router::connect('/Textos/:action', array('controller' => 'Textos'));
	Router::connect('/Textos/:action/*', array('controller' => 'Textos'));
	
	//Mensagens
	Router::connect('/Mensagens/:action', array('controller' => 'Mensagens'));
	Router::connect('/Mensagens/:action/*', array('controller' => 'Mensagens'));
	
	//Imagens
	Router::connect('/Imagens/:action', array('controller' => 'Imagens'));
	Router::connect('/Imagens/:action/*', array('controller' => 'Imagens'));
	
	//Temas
	Router::connect('/Temas/:action', array('controller' => 'Temas'));
	Router::connect('/Temas/:action/*', array('controller' => 'Temas'));
	
	//SEO
	Router::connect('/robots.txt', array('controller' => 'Seo', 'action' => 'robots'));
	Router::connect('/sitemap.xml', array('controller' => 'Seo', 'action' => 'sitemap'));
	Router::connect('/Seo/:action', array('controller' => 'Seo'));
	
	//minify
	//Router::connect('/min-js', array('plugin' => 'Minify', 'controller' => 'minify', 'action' => 'index', 'js'));
	//Router::connect('/min-css', array('plugin' => 'Minify', 'controller' => 'minify', 'action' => 'index', 'css'));
	
	//Navegação
	Router::connect('/', array('controller' => 'Paginas', 'action' => 'display'));
	Router::connect('/*', array('controller' => 'Paginas', 'action' => 'display'));
	
	
	CakePlugin::routes();

	//require CAKE . 'Config' . DS . 'routes.php';
=======

	Router::connect('/admin', array('controller' => 'Users', 'action' => 'login', 'home','admin'=>true));
	Router::connect('/admin/:controller', array('action' => 'index','admin'=>true));
	Router::connect('/admin/:controller/:action', array('admin'=>true));
	Router::connect('/admin/:controller/:action/*', array('admin'=>true));
	
	Router::connect('/instalar', array('controller' => 'Users', 'action' => 'instalar'));
	
	Router::connect('/', array('controller' => 'Paginas', 'action' => 'display', 'home'));
	//Router::connect('/*', array('controller' => 'Paginas', 'action' => 'display'));

	CakePlugin::routes();

	require CAKE . 'Config' . DS . 'routes.php';
>>>>>>> f4e6305d6ec87630dc98d7873ef0e43ad50f9266
