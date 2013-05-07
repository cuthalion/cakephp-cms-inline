<?php
class SeoController extends AppController {
	
	public $components = array('RequestHandler');
	
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('robots','sitemap'));
    }
	
	public function index(){
		$this->layout='ajax';
		$this->Seo->id = 1;
		$retorno='erro';
		if($this->request->is('post')||$this->request->is('put')){
			if($this->Seo->save($this->request->data)){
				$retorno='reload';
			}
		}else{
			$retorno='';
		}
		$this->request->data=$this->Seo->read();
		$this->set('retorno',$retorno);
	}
	
	public function robots(){
		$this->layout='ajax';
		
		$this->RequestHandler->respondAs('text');
		$this->Seo->id = 1;
		$this->set('retorno',$this->Seo->read());
	}
	
	public function sitemap(){
		$this->layout='ajax';
		$this->Seo->id = 1;
		$retorno = $this->Seo->read();
		if($retorno['Seo']['sitemap']=='NULL'):
			$sitemap=$retorno['Seo'];
		else:
			$this->loadModel('Pagina');
			$sitemap = $this->Pagina->find('all');
		endif;
		$this->set('sitemap',$sitemap);
		$this->RequestHandler->respondAs('xml');
	}
}