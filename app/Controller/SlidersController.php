<?php
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
class SlidersController extends AppController {
		
	function edita($id=null,$acao=null){
		$this->layout='ajax';
		$this->Slider->id=$id;
		if(!$this->Slider->exists()){
			throw new NotFoundException('Banner não encontrado');
		}
		$retorno='erro';
		if($acao==null):
			if($this->request->is('post') || $this->request->is('put')):
				if($this->Slider->save($this->request->data)):
					$retorno = 'ok';
				endif;
			else:
				$retorno = 'requisição inválida';
			endif;
		elseif($acao=='Sobe'):
			if($this->Slider->moveUp($id,abs(1))):
				$retorno = 'reload';
			endif;
		elseif($acao=='Desce'):
			if($this->Slider->moveDown($id,abs(1))):
				$retorno = 'reload';
			endif;
		endif;
		$this->set('retorno',$retorno);
	}
	
	function add($id=null){
		$this->layout='ajax';
		$this->set('retorno','erro');
		$this->set('pagina_id',$id);
		if($this->request->is('post')):
			if($this->Slider->saveAll($this->request->data)){
				$this->set('retorno','reload');
			}
		endif;
	}
	
	function editaFull($id=null){
		$this->layout='ajax';
		$this->Slider->id=$id;
		if(!$this->Slider->exists()){
			throw new NotFoundException('Banner não encontrado');
		}
		$retorno='erro';
		if($this->request->is('post') || $this->request->is('put')):
			if($this->Slider->save($this->request->data)):
				$retorno = 'reload';
			endif;
		else:
			$this->request->data = $this->Slider->read();
			$retorno ='';
		endif;
		$this->set('retorno',$retorno);
	}
	
	function index($id=null){
		$this->layout='ajax';
		$this->set('retorno',$this->Slider->find('all',array('conditions'=>array('pagina_id'=>$id),'order'=>array('Slider.lft ASC'))));
		$this->set('pagina_id',$id);
		$this->sliderImagem();
	}
	
	
	function remove($id=null){
		$this->layout='ajax';
		$this->Slider->id = $id;
		if(!$this->Slider->exists()):
			throw new NotFoundException('Página inexistente');
		endif;
		$retorno='erro';
		$arquivo=$this->Slider->read();
		$arquivo = $arquivo['Slider']['arquivo'];
		if($this->Slider->delete()):
			$retorno='reload';
		endif;
		$this->set('retorno',$retorno);
	}
	
	//funções
	
	function checkImagem(){
		$tema = $tema['Tema'];
		//
		$dir = new Folder(WWW_ROOT.'img'.DS.$this->Auth->user('id').DS.'slider'.DS);
		$files = $dir->find('.*', true);
		$i=0;
		foreach($files as $file){
			$file = WWW_ROOT.'img'.DS.$this->Auth->user('id').DS.'slider'.DS.$file;
			list($width, $height, $type, $attr)=getimagesize($file);
			if($width!=$tema['slider_larg']||$height!=$tema['slider_alt']) $i++;
		}
		if($i==0){
			return false;
		}else{
			return true;
		}
	}
	
	function contaImagem(){
		$dir = new Folder(WWW_ROOT.'img'.DS.$this->Auth->user('id').DS.'slider'.DS);
		$files = $dir->find('.*', true);
		$i=0;
		foreach($files as $file){
			$i++;
		}
		return $i;
	}
	
	function sliderImagem(){
		$this->layout='ajax';
		/*
		$this->loadModel('Tema');
		$tema = $this->Auth->user('tema_id');
		if($tema==0 )$tema=1;
		$this->Tema->id=$tema;
		$tema=$this->Tema->read();*/
		$tema = array('Tema'=>array(
			'slider_larg'=>'1170',
			'slider_alt'=>'250'
		));
		$tema = $tema['Tema'];
		
		
		//
		$dir = new Folder(WWW_ROOT.'img'.DS.$this->Auth->user('id').DS.'slider'.DS);
		$files = $dir->find('.*', true);
		$i=0;
		foreach($files as $file){
			list($width, $height, $type, $attr)=getimagesize(WWW_ROOT.'img'.DS.$this->Auth->user('id').DS.'slider'.DS.$file);
			if($width!=$tema['slider_larg']||$height!=$tema['slider_alt']){
				$temp_arquivo = new File(WWW_ROOT.'img'.DS.$this->Auth->user('id').DS.'slider'.DS.$file,false);
				$arquivo = $temp_arquivo->read();
				$pathinfo = $temp_arquivo->info();
				$resizeArquivo['nomebase']=	$pathinfo['basename'];
				$resizeArquivo['nome']=		$pathinfo['filename'];
				$resizeArquivo['extensao']=	$pathinfo['extension'];
				$resizeArquivo['diretorio']=WWW_ROOT.'img'.DS.$this->Auth->user('id').DS;
				$this->ImgUpload->redimensionaSlider($resizeArquivo,$tema['slider_larg'],250,WWW_ROOT.'img'.DS.$this->Auth->user('id').DS);
				$temp_arquivo->close();
			}
		}
	}
	
}