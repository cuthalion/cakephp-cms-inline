<?php
/*
 * Trocar tmp/jquery-ui.css por http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css'
 * Trocar tmp/jquery.min.js por //ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js'
 * Trocar tmp/jquery-ui.js por http://code.jquery.com/ui/1.10.0/jquery-ui.js'
 */

/*** ABRE A ADMINISTRAÇÃO ***/
echo $this->element('base_admin_body');

/*** CSS DO TEMA ***/
if(isset($css)){
	foreach($css as $key =>$value):
		if($value=='bootstrap.min.admin'&&$authUser):
			unset($css[$key]);
		endif;
		if($value=='bootstrap-responsive.min.admin'&&$authUser):
			unset($css[$key]);
		endif;
	endforeach;
	unset($value);

	echo $this->Html->css($css,null,array('inline'=>false));
}

/*** JS DO TEMA ***/
if(isset($js)){
	foreach($js as $key =>$value):
		if($value=='jquery.admin'&&$authUser):
			unset($js[$key]);
		endif;
		if($value=='bootstrap.min.admin'&&$authUser):
			unset($js[$key]);
		endif;
	endforeach;
	unset($value);
	echo $this->Html->script($js,array('inline'=>false));
}

echo $this->Html->charset();
echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->Html->meta('icon');?>
