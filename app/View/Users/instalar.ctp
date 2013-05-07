<?php
$this->element('seo');
echo $this->Html->css('login',null,array(
	'inline'=>false
));
?>
<?php $this->element('seo'); ?>
<div class="container">
<?php echo $this->Form->create('User',array('class'=>'form-signin'));?>
    <h2 class="form-signin-heading">Seus dados de acesso!</h2>
        <?php
		echo $this->Form->input('titulo',array(
			'placeholder'=>__('Titulo do site'),
			'label'=>false,
			'class'=>'input-block-level',
			'required'=>true
		));
		echo $this->Form->input('nome',array(
			'class'=>'input-block-level',
			'label'=>false,
			'placeholder'=>'Nome',
			'required'=>true
		));
        echo $this->Form->input('username',array(
			'placeholder'=>'Usuário',
			'label'=>false,
			'class'=>'input-block-level',
			'required'=>true
		));
		echo $this->Form->input('email',array(
			'placeholder'=>__('Email'),
			'label'=>false,
			'class'=>'input-block-level',
			'required'=>true
		));
        echo $this->Form->input('password',array(
			'placeholder'=>'Senha',
			'label'=>false,
			'class'=>'input-block-level',
			'required'=>true
		));
		echo $this->Form->input('password_confirm',array(
			'placeholder'=>'Confirmação de senha',
			'label'=>false,
			'type'=>'password',
			'class'=>'input-block-level',
			'required'=>true
		));
    ?>
	<?php echo $this->Form->button(__('Criar'),array(
		'class'=>'btn btn-large btn-primary'
	));?>
    <?php echo $this->Form->end();?>
        
</div>