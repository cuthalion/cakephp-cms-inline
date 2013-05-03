<?php

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
}