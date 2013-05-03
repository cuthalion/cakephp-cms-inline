<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array(
        'Session',
        'Auth' => array
		(
			'loginAction' => array
			(
				'controller' => 'Users',
				'action' => 'login'
			),
            'loginRedirect' => '/',
            'loginRedirect' => '/',
			'authenticate'	=> array('Blowfish')
        )
    );
	
	public $helpers = array(
		'Html' => array('className' => 'BootstrapHtml'),
		'Form' => array('className' => 'BootstrapForm'),
		'Paginator' => array('className' => 'BootstrapPaginator'),
	);
	
	public function beforeFilter(){
		//verifica a permissão de acesso
		if($this->params['prefix'] != 'admin'){
			$this->Auth->allow();
		}else{
			
		}
	}
	
	public function beforeRender(){
		// resultado do request/ isso não vai ficar
		$this->set('request',$this->request->params);
		
		//verifica se o usuario está ou nao logado
		$this->set('authUser',$this->Auth->user());
		
		$this->set('mensagens',0);
		
		//vinformações base para o cms
		$cms['base_url']= Router::url('/',true);
		$cms['base_url']= substr($cms['base_url'], 0, -1);
		
		$this->set('cms',$cms);
	}
	
}
