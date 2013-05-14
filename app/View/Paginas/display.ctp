<?php

	//SEO META TAGS
	$this->element('seo',array('keywords'=>$conteudo['Pagina']['tags'],'description'=>$conteudo['Pagina']['descricao'],'robots'=>'index,follow'));
	
	//conteúdo do site
	echo $conteudo['Pagina']['corpo'];

	/*admin*/
	if($authUser):
	echo $this->Form->create('Pagina',array('class'=>'remove','style'=>'visibility:hidden','id'=>'paginaConteudo'));
	echo $this->Form->input('corpo',array(
		'class'=>'corpo',
		'value'=>$conteudo['Pagina']['corpo']
	));
	echo $this->Form->input('id',array(
		'class'=>'id',
		'value'=>$conteudo['Pagina']['id']
	));
	echo $this->Form->end();
endif;
?>