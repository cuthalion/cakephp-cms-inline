<?php
if($retorno=='reload'||$retorno=='erro'){
	echo $retorno;
}else{
	echo $this->Form->create('Seo',array('class'=>'form-horizontal'));
	echo $this->Form->input('robots');
	echo $this->Form->input('sitemap',array('after'=>'<span class="help-block">Deixe em branco para gerar automáticamente!</span>'));
	echo $this->Form->button('Salvar',array('class'=>'btn btn-info plugin'));
	echo $this->Form->input('id');
	echo $this->Form->end();
}