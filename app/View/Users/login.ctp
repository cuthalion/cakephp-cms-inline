<?php
$this->element('seo');
echo $this->Html->css('login',null,array(
	'inline'=>false
));
?>

<div class="container">
<?php echo $this->Form->create('User',array('class'=>'form-signin'));?>
    <h2 class="form-signin-heading">Acessar</h2>
    <?php
	 	echo $this->Form->input('username',array(
			'label'=>'Usuário ou email',
			'placeholder'=>'Email ou Usuário...',
			'class'=>'input-block-level'
		));
		echo $this->Form->input('password',array(
			'label'=>'Senha',
			'placeholder'=>'Senha...',
			'class'=>'input-block-level'
		));
	?>
    <button class="btn btn-large btn-primary" type="submit">Entrar</button>
    <p>
        <small>
        	<?php echo $this->Html->link('Voltar para o site','/');?>
        </small>
    </p>
  </form>

</div>