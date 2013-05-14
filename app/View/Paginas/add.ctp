<?php
	$this->element('seo');
	if($save=='off'):
	
		echo $this->Form->create('Pagina',array('class'=>'form-horizontal'));
		echo $this->Form->input('titulo',array(
				'label'			=>'Título do Menu',
				'placeholder'	=>'O texto que será mostrado no menu'
		));
		echo $this->Form->input('title',array(
				'label'			=>'Título da página',
				'placeholder'	=>'O título para motores de busca e identificação no site'
		));
		echo $this->Form->input('descricao',array(
				'label'			=>'Descrição da página',
				'placeholder'	=>'Descrição para motores de busca'
		));
		echo $this->Form->input('tags',array(
				'label'			=>'Palavras-chave',
				'placeholder'	=>'As palavras-chave para motores de busca'
		));
		echo $this->Form->input('robots',array(
				'label'			=>'Robots',
				'placeholder'	=>'Como sua página será indexada nas buscas (deixa em branco para indexar)'
		));
		echo $this->Form->input('slug',array(
				'label'			=>'URL da página',
				'placeholder'	  =>'A URL de identificação da página',
				'required'		 =>false
		));
		echo $this->Form->button('Criar',array('class'=>'btn btn-info plugin'));
		echo $this->Form->end();
	
	endif;

	if($save=='sim'):
?>reload<?php
	endif;

	if($save=='nao'):
?>
<h4>Criando</h4>
<div class="alert alert-block alert-danger">Não pode ser salvo, verifique abaixo.</div>
<?php
		echo $this->Form->create('Pagina',array('class'=>'form-horizontal'));
		echo $this->Form->input('titulo');
		echo $this->Form->input('title');
		echo $this->Form->input('descricao');
		echo $this->Form->input('tags');
		echo $this->Form->input('slug');
		echo $this->Form->button('Criar',array('class'=>'btn btn-info plugin'));
		echo $this->Form->end();

	endif;