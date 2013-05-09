<?php
if($retorno=='reload'):
	echo $retorno;
else:
	echo $this->Form->Create('Slider',array('class'=>'form-horizontal form-ajax-ckeditor'));
	echo $this->Form->input('titulo');
	echo $this->Form->input('descricao',array('id'=>'editor','type'=>'textarea'));
	echo $this->Form->input('',array(
		'class'=>'btn icon-picture image-select',
		'type'=>'button',
		'after'=>' Selecione uma imagem',
		'id'=>'SliderArquivoAdd'
	));
	echo $this->Form->hidden('arquivo',array('class'=>'arquivo'));
	echo $this->Form->hidden('pagina_id',array('value'=>$pagina_id));
	echo $this->Form->button('criar',array('class'=>'btn btn-info plugin'));
	echo $this->Form->end();
endif;