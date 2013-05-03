<?php
App::uses('Security', 'Utility');
class UsersController extends AppController {
	
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('login'));
    }
	
	public function instalar(){
		if($this->User->find('count'))return $this->redirect('/admin');
		if($this->request->is('post')||$this->request->is('put')){
			if($this->User->save($this->request->data)){
				$this->Session->setFlash(__('Ok, Salvo com sucesso!'),'sucesso');
				return $this->redirect('/admin');
			}else{
				$this->Session->setFlash(__('Erro ao salvar!'),'erro');
			}
		}
	}
	
	public function admin_login() {
		if($this->request->is('post')){
			$email = $this->User->findByEmail($this->Auth->request->data['User']['username']);
			if(!empty($email)) $this->Auth->request->data['User']['username'] = $email['User']['username'];
			if ($this->Auth->login()) {
				$acessos = $this->Auth->user('acessos')+1;
				$this->User->id=$this->Auth->user('id');
				$this->User->set('acessos',$acessos);
				$this->User->save();
				$this->Session->setFlash(__('Ok, Você acessou a administração com sucesso!'),'sucesso');
				return $this->redirect('/');
			}else{
				$this->Session->setFlash(__('Erro, Verifique as informações!'),'erro', array(), 'auth');
			}
		}else{
			$this->Session->setFlash(__('Insira suas informações de acesso para prosseguir!'),'info');
		}
	}
	public function admin_logout() {
		$this->redirect($this->Auth->logout());
	}
	
}