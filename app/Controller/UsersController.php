<?php
<<<<<<< HEAD
App::uses('CakeEmail', 'Network/Email');
=======
App::uses('Security', 'Utility');
>>>>>>> f4e6305d6ec87630dc98d7873ef0e43ad50f9266
class UsersController extends AppController {
	
	public function beforeFilter() {
        parent::beforeFilter();
<<<<<<< HEAD
        $this->Auth->allow(array('logout','login','add'));
    }
	
	
	function index($origem=null){
		if($origem=='ajax') $this->layout='ajax';
		$this->set('title_for_layout', 'Gerenciamento de usuários');
		$this->User->recursive = 0;
		$this->set('tabs','<ul class="nav nav-tabs"><li><a href="Users/add">Novo</a></li></ul>');
		$this->set('boxClass','box-nomargin');
		$this->set('Users', $this->User->find('all'));
	}
	
	
	public function add() {
	
	if($this->User->find('count')>0)return $this->redirect(array('controller'=>'Users','action'=>'login'));
		
		$this->set('title_for_layout', 'Criando usuário');
		$this->set('title_page','Criando usuário');
        if ($this->request->is('post')) {
				
				$this->User->create();
				$this->request->data['User']['hash']=$this->geraSenha(40, true,  true, true, false);
				
				if ($this->User->save($this->request->data)) {
					
					$this->Session->setFlash(__('Usuário criado com sucesso!'),'sucesso');
						
					$this->redirect(array('action' => 'login'));
					
				} else {
					
					$this->Session->setFlash(__('Verifique suas informações abaixo!'),'erro');
					
				}
				
        }
    }
	
	public function edit($id = null) {
        $this->User->id = $id;
		$this->set('acesso',$this->Auth->user('role'));
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
			if($this->request->data['User']['password']==''):
				unset($this->request->data['User']['password']);
				$this->User->validator()->remove('password');
				$this->User->validator()->remove('password_confirm');
			endif;
			if($this->request->data['User']['base']==$this->Auth->user('base')) $this->User->validator()->remove('base');
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('As alterações foram salvas com sucesso no usuário!'),'sucesso');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Usuário não pode ser salvo, tente novamente.'),'erro');
            }
        }
		$this->request->data = $this->User->read(null, $id);
		unset($this->request->data['User']['password']);
    }
	
	
	public function perfil($id = null) {
		$this->layout='ajax';
        $this->User->id =  $this->Auth->user('id');
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
		$retorno='erro';
        if ($this->request->is('post') || $this->request->is('put')) {
			if($this->request->data['User']['password']==''):
				unset($this->request->data['User']['password']);
				$this->User->validator()->remove('password');
				$this->User->validator()->remove('password_confirm');
			endif;
			if($this->request->data['User']['base']==$this->Auth->user('base')) $this->User->validator()->remove('base');
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('As alterações foram salvas com sucesso no usuário!'),'sucesso');
                $retorno='reload';
            } else {
                $this->Session->setFlash(__('Usuário não pode ser salvo, tente novamente.'),'erro');
            }
        }else{
			$retorno ='';
			$this->request->data = $this->User->read(null, $id);
		}
		
		$this->set('retorno',$retorno);
		unset($this->request->data['User']['password']);
    }
	
	
	public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário não existe'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Usuário apagado'),'sucesso');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Usuário não deletedo'),'erro');
        $this->redirect(array('action' => 'index'));
    }
	
	public function login() {
		$this->set('title_page', 'Login');
		$this->set('Login', 'Login');
=======
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
>>>>>>> f4e6305d6ec87630dc98d7873ef0e43ad50f9266
		if($this->request->is('post')){
			$email = $this->User->findByEmail($this->Auth->request->data['User']['username']);
			if(!empty($email)) $this->Auth->request->data['User']['username'] = $email['User']['username'];
			if ($this->Auth->login()) {
				$acessos = $this->Auth->user('acessos')+1;
				$this->User->id=$this->Auth->user('id');
				$this->User->set('acessos',$acessos);
				$this->User->save();
<<<<<<< HEAD
				$this->redirect('/');
			}else{
				$this->Session->setFlash(__('Usuário/Email e senha não conferem!'),'erro');
			}
		}
	}
		
	public function logout() {
		$this->layout='ajax';
		$this->redirect($this->Auth->logout());
	}
	
	function geraSenha($tamanho = 15, $minusculas = true, $maiusculas = true, $numeros = true, $simbolos = true)
	{
		$lmin = 'abcdefghijkmnopqrstuvwxyz';
		$lmai = 'ABCDEFGHIJKLMNPQRSTUVWXYZ';
		$num = '234567892345678923456789';
		$simb = '!@#$%*-!@#$%*-!@#$%*-';
		$retorno = '';
		$caracteres = '';
	
		if ($minusculas) $caracteres .= $lmin;
		if ($maiusculas) $caracteres .= $lmai;
		if ($numeros) $caracteres .= $num;
		if ($simbolos) $caracteres .= $simb;
	
		$len = strlen($caracteres);
		for ($n = 1; $n <= $tamanho; $n++) {
			$rand = mt_rand(1, $len);
			$retorno .= $caracteres[$rand-1];
		}
		return $retorno;
	}
	
}
=======
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
>>>>>>> f4e6305d6ec87630dc98d7873ef0e43ad50f9266
