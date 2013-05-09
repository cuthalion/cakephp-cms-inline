<?php
class MensagensController extends AppController {
	
	function index(){
		$this->layout='ajax';
		$this->set('mensagem',$this->Mensagem->find('all'));
	/*	$this->set('mensagens',$this->Mensagem->find('all',array(
			'order'			=>	array('Mensagem.created DESC'),
			'conditions'	=>	array('idResposta'=>'0')
		)));
		$this->set('respostas',$this->Mensagem->find('all',array(
			'order'			=>	array('Mensagem.created DESC'),
			'conditions'	=>	array('idResposta !='=>'0')
		)));
		$this->set('tabs','<ul class="nav nav-tabs"><li class="active"><a href="#inbox" data-toggle="tab">'.__('Caixa de entrada').'</a></li><li><a href="#respostas" data-toggle="tab">'.__('Mensagens enviadas').'</a></li></ul>');*/
	}
	
	function view($id=null,$titulo='ninguém',$marca=null){
		$this->layout='ajax';
		$this->Mensagem->id=$id;
		if (!$this->Mensagem->exists()) {
            throw new NotFoundException(__('Mensagem inválida!'));
        }
		$this->set('mensagem',$this->Mensagem->read(null));
		if($marca=='nao'){
			$this->set('marca','lida');
			$this->Mensagem->set('lida','nao');
			$this->Mensagem->save();
		}else{
			$this->set('marca','não lida');
			$this->Mensagem->set('lida','sim');
			$this->Mensagem->save();
		}
		$this->set('retorno','reload');
	}
	
	function responde($id = null){
		$this->layout='ajax';
		if($this->request->is('post') || $this->request->is('put')){
			
			App::uses('CakeEmail', 'Network/Email');
			$this->loadModel('Email');
			
			$configura=$this->AppModel->find('first');
			$email = new CakeEmail();
			
			$email->from(array($configura['Email']['contato'] => $configura['Email']['titulo']))
				->to($this->request->data['Mensagem']['email'])
				->subject($this->request->data['Mensagem']['titulo']);
				
			if($email->send($this->request->data['Mensagem']['mensagem'])){
				
				if ($this->Mensagem->save($this->request->data)) {
					
					$this->set('retorno','reload');
					
				}else{
					
					$this->set('retorno','erro');
					
				}
				
			}else{
				
				$this->set('retorno','erro');
				
			}
			
		}else{
			
			$this->Mensagem->id=$id;
			if (!$this->Mensagem->exists()) {
				throw new NotFoundException(__('Mensagem inválida!'));
			}
			
			$this->Mensagem->set('lida','sim');
			$this->Mensagem->save();
			
			$this->set('mensagem',$this->Mensagem->read(null));
			$this->set('idResposta',$id);
		}
	}
	
	function delete($id = null){
		$this->layout='ajax';
		$this->Mensagem->id = $id;
        if (!$this->Mensagem->exists()) {
            throw new NotFoundException(__('Mensagem não existe'));
        }
		if ($this->Mensagem->delete()) {
            $this->set('retorno','reload');
        }else{
			$this->set('retorno','erro');
		}
	}
	
}
