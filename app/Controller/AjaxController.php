<?php
class AjaxController extends AppController{
	public function beforeFilter() {
        parent::beforeFilter();
    }
	
	function Menu(){
		$this->layout='ajax';
	}
	
	function View($view){
		$this->layout='ajax';
		$this->render($view);
	}
	
}