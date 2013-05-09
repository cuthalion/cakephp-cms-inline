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
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
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
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array(
		'ImgUpload',
        'Session',
        'Auth' => array(
            'loginRedirect' => '/',
            'logoutRedirect' => '/'
        )
    );
	
	public $helpers = array(
		'Html' => array('className' => 'BootstrapHtml'),
		'Form' => array('className' => 'BootstrapForm'),
		'Paginator' => array('className' => 'BootstrapPaginator'),
	);
	
	public function beforeFilter() {
		
		$this->ImgUpload->criaPasta(WWW_ROOT.'img'.DS.$this->Auth->user('id').DS);
		
		$this->Auth->allow(array('display'));
		
		//DEFINE O SITE ATUAL
		//carrega os models
		$this->loadModel('AppModel');
		$this->AppModel->install();
		$this->loadModel('User');
		
		$user=$this->User->find('first');
		
		if ((count($user)==0)and($this->request->params['controller']!='Users')) {
			return $this->redirect(array('controller'=>'Users','action'=>'add'));
		}
		
		$this->set('title_page','');
		if (count($user)!=0){
			$this->set('title_site',$user['User']['titulo']);
			$this->set('logo',$user['User']['titulo']);
		}else{
			$this->set('title_site','Criando Seu site');
			$this->set('logo','Criando Seu site');
		}
		
		
		$cms['base_url']=Router::url('/',true);
		$cms['base_url']= substr($cms['base_url'], 0, -1);
		$this->set('authUser', $this->Auth->user());
		$this->set('cms', $cms);
				
	}
	public function beforeRender() {
		
		$this->loadModel('Pagina');
		$this->set('menu',$this->Pagina->find('all',array(
			'fields'=>array('Pagina.id','Pagina.parent_id','Pagina.titulo','Pagina.slug'),
			'order'=>array('lft ASC')
		)));
		$this->loadModel('Mensagem');
		
		$this->set('mensagens',$this->Mensagem->find('count',array(
			'conditions'=>array('lida'=>'nao')
		)));
		
		
		$this->set('request',$this->request->params);
		
	}
}
