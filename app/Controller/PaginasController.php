<?php
<<<<<<< HEAD
class PaginasController extends AppController{
	
	public function beforeFilter() {    
		parent::beforeFilter();
		 $this->Auth->allow(array('slider','menu'));
	}
	
	function slider($id=null){
		$this->layout='ajax';
		if($id==null){
			die('erro');
		}
		$conteudo=$this->Pagina->find('first',
			array(
				'conditions'=>array('Pagina.id'=>$id)
			));
		$this->set('conteudo',$conteudo);
	}
	
	function display($url=null){
			if($url==null){
				$url = 'home';
			}
			$this->set('title_page','Construindo seu site');
			
			$novo=false;
			
			if($this->Pagina->find('count')==0):
				if(!$this->Auth->User()){
					$this->response->header('Status: 503 Service Temporarily Unavailable');
					$this->set('title_page','Site em construção');
					$this->set('title_for_layout','Site em construção');
					$conteudo=array(
						'Pagina'=>array(
							'tags'=>'em construção',
							'descricao'=>'em construção',
							'corpo'=>'<h1>Este site está em construção!</h1>'
						)
					);
					$this->set('conteudo',$conteudo);
				}else{
					$this->render('novo');
				}
			else:
				$conteudo=$this->Pagina->find('first',
					array(
						'conditions'=>array('Pagina.slug'=>$url)
					)
				);
				
				if(count($conteudo) == 0)throw new NotFoundException('Ops! A página que você tentou acessa não existe!');;
				
				if(!$this->Auth->user()){
					$conteudo['Pagina']['corpo'] = preg_replace('/(campo-edita)/', '', $conteudo['Pagina']['corpo']);
					$conteudo['Pagina']['corpo'] = preg_replace('/(class="")/', '', $conteudo['Pagina']['corpo']);
					$conteudo['Pagina']['corpo'] = preg_replace('/(<div >)/', '<div>', $conteudo['Pagina']['corpo']);
				}
				$this->set('title_page',$conteudo['Pagina']['title']);
				$this->set('title_for_layout',$conteudo['Pagina']['title']);
				$this->set('conteudo',$conteudo);
			endif;
	}
	
	function menu(){
		$this->layout='ajax';
		$this->set('retorno',$this->Pagina->find('all',
		array(
			'order'=>array('Pagina.lft ASC')
		)));
	}
	
	function index(){
		$this->layout='ajax';
		$this->set('retorno',$this->Pagina->find('all',
			array('order'=>array('Pagina.lft ASC'))
		));
	}
	
	function add(){
		$this->layout='ajax';
		if($this->request->is('post') || $this->request->is('put')){
			if ($this->request->data['Pagina']['slug']==''):
				$this->request->data['Pagina']['slug'] = Inflector::slug($this->request->data['Pagina']['titulo']);
			endif;
			if ($this->request->data['Pagina']['title']==''):
				$this->request->data['Pagina']['title'] = $this->request->data['Pagina']['titulo'];
			endif;
			$this->request->data['Pagina']['slug'] = Inflector::slug($this->request->data['Pagina']['slug']);
			$this->Pagina->create();
			if($this->Pagina->save($this->request->data)){
				$this->set('save','sim');
			}
			else{
				$this->set('save','nao');
			}
		}else{
			$this->set('save','off');
		}
	}
	
	function edit($id=null,$acao=null){
		$this->layout='ajax';
		$this->Pagina->id = $id;
		if(!$this->Pagina->exists()):
			throw new NotFoundException('Página inexistente');
		endif;
		$retorno='erro';
		if($acao==null):
			if($this->request->is('post') || $this->request->is('put')):
				if($this->Pagina->save($this->request->data,false)):
					$retorno = 'reload';
				endif;
			else:
				$retorno = 'requisição inválida';
			endif;
		elseif($acao=='Sobe'):
			if($this->Pagina->moveUp($id,abs(1))):
				$retorno = 'reload';
			endif;
		elseif($acao=='Desce'):
			if($this->Pagina->moveDown($id,abs(1))):
				$retorno = 'reload';
			endif;
		endif;
		$this->set('retorno',$retorno);
	}
	
	function editSeo($id=null){
		$this->layout='ajax';
		$this->Pagina->id = $id;
		if(!$this->Pagina->exists()):
			throw new NotFoundException('Página inexistente');
		endif;
		if($this->request->is('post') || $this->request->is('put')):
			if(isset($this->request->data['Pagina']['slug'])||(isset($this->request->data['Pagina']['title']))):
				if ($this->request->data['Pagina']['slug']==''):
					$this->request->data['Pagina']['slug'] = Inflector::slug($this->request->data['Pagina']['titulo']);
				else:
					$atual=$this->Pagina->read();
					if($atual['Pagina']['slug']==$this->request->data['Pagina']['slug']) $this->Pagina->validator()->remove('slug');
				endif;
				
				if ($this->request->data['Pagina']['title']==''):
					$this->request->data['Pagina']['title'] = $this->request->data['Pagina']['titulo'];
				endif;
			endif;
			
			if($this->Pagina->save($this->request->data)):
				$this->set('save','sim');
			else:
				$this->set('retorno','erro');
			endif;
			
		else:
			$this->request->data=$this->Pagina->read();
		endif;
	}
	
	function remove($id=null){
		$this->layout='ajax';
		$this->Pagina->id = $id;
		if(!$this->Pagina->exists()):
			throw new NotFoundException('Página inexistente');
		endif;
		$retorno='erro';
		if($this->Pagina->delete()):
			$retorno='reload';
		endif;
		$this->set('retorno',$retorno);
	}
	
=======

class PaginasController extends AppController {
	public function display($slug=null){
		if($slug==null)$slug='home';
		$conditions = array('conditions'=>array('slug'=>$slug));
		if($this->Pagina->find('count',$conditions)){
			$conteudo = $this->Pagina->find('first',$conditions);
			$this->set('conteudo',$conteudo);
		}elseif($slug='home'){
			
			//descomentar a linha 153 do elements/dashboard.ctp
			
			if($this->Auth->user()){
				//cria a página home se não existir
			}else{
				//mostra o conteúdo padrão de quando se instala o sistema
			}
		}else{
			throw new NotFoundException('Ops! A página que você tentou acessar não existe!');
		}
	}
	public function admin_display(){
	}
>>>>>>> f4e6305d6ec87630dc98d7873ef0e43ad50f9266
}