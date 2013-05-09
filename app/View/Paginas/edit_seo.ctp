<?php
	$this->element('seo');
	if(isset($save)):
?>reload<?php
	else:
?>
<h4>Editando</h4>
<?php if(isset($retorno)): ?> <div class="alert alert-block alert-danger">Não pode ser salvo, verifique abaixo.</div><?php endif; ?>
<?php

	echo $this->Form->create('Pagina',array('class'=>'form-horizontal'));
	echo $this->Form->input('titulo');
	echo $this->Form->input('title');
	echo $this->Form->input('descricao');
	echo $this->Form->input('tags');
	echo $this->Form->input('robots');
	echo $this->Form->input('slug');
	echo $this->Form->input('id');
	echo $this->Form->button('Salvar',array('class'=>'btn btn-info plugin'));
	echo $this->Form->end();

endif;