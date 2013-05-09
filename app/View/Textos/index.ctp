<?php echo $this->Form->create('Texto', array('class'=>'form-horizontal')); ?>
    <?php echo $this->Form->input('cadastra',array('label'=>'Texto da tela de cadastro','class'=>'ckeditor'));?>
    <?php echo $this->Form->input('ativa',array('label'=>'Texto da tela de ativação de cadastro','class'=>'ckeditor'));?>
    <?php echo $this->Form->submit('Salvar',array(
		'class'=>'btn btn-success'
	));?>
<?php echo $this->Form->end();?>