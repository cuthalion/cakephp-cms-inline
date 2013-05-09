<div class="row">
    <?php $this->element('seo'); ?>
    <?php echo $this->Form->create('User', array('class'=>'form-horizontal'));?>

        <fieldset>
            <?php
            echo $this->Form->input('nome',array(
                'class'=>'required input-block-level',
                'placeholder'=>'Seu nome, pode ser só o primeiro...'
            ));
			echo $this->Form->input('username',array(
                'label'=>'Usuário',
                'class'=>'required input-block-level',
                'placeholder'=>'Seu usuário de acesso ao painel...'
            ));
            echo $this->Form->input('email',array(
                'label'=>'Email',
                'class'=>'required input-block-level',
                'placeholder'=>'Seu email, você vai precisar dele...'
            ));
			echo $this->Form->input('titulo',array(
                'label'=>'Título do site',
                'class'=>'required input-block-level',
                'type'=>'text',
                'placeholder'=>'O título do seu site...'
            ));
			echo $this->Form->input('password',array(
                'label'=>'Senha',
                'class'=>'required span6',
                'type'=>'password',
                'placeholder'=>'Sua senha de acesso...'
            ));
			echo $this->Form->input('password_confirm',array(
                'label'=>'Confirmação de senha',
                'class'=>'required span6',
                'type'=>'password',
				'min'=>'6',
                'placeholder'=>'Confirme a senha...'
            ));
        ?>
        
		<?php echo $this->Form->submit('Criar meu site agora',array(
				'class'=>'btn btn-large btn-success'
		));?>
	</fieldset>
	<?php echo $this->Form->end();?>
</div>