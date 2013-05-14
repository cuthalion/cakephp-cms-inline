<?php
class AjaxController extends AppController{
	public function beforeFilter() {
        parent::beforeFilter();
    }
	
	function Menu(){
		$this->layout='ajax';
		$controllers=Configure::read('controladores');
		$this->set('controllers',$controllers);
	}
	
	function View($view){
		$this->layout='ajax';
		$this->render($view);
	}
	
}