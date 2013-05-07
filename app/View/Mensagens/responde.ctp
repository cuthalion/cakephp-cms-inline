<div class="row-fluid no-margin">
    <div class="span12">
        <ul class="quicktasks">
        	<li>
                <?php 
					echo $this->Html->link( $this->Html->image('icons/essen/32/inbox.png').'<span>'.__('Caixa de entrada').'</span>', array('controller' => 'Mensagenss', 'action'=>'index', 'full_base' => true),array('escape' => false));
				?>
            </li>
        </ul>
    </div>
</div>
<hr />
<h2><?php echo __('A mensagem que você recebeu:');?></h2>
<p><strong><?php echo __('De:');?></strong> <?php echo $mensagem['Mensagem']['nome'];?></p>
<p><strong><?php echo __('Assunto:');?></strong> <?php echo $mensagem['Mensagem']['titulo'];?></p>
<p><strong><?php echo __('Mensagem :');?></strong> <?php echo $mensagem['Mensagem']['mensagem'];?></p>
<hr/>
<h2><?php echo __('Envie sua resposta:');?></h2>
<?php
echo $this->Form->create('Mensagens',array('class'=>'form-horizontal'));
?>
<p>
<?php
echo $this->Form->input('titulo',array('label'=>__('Assunto'),'class'=>'span6 required','value'=>'RES:'.$mensagem['Mensagem']['titulo']));
?>
</p>
<p>
<?php
echo $this->Form->Label(__('Digite sua resposta'));
echo $this->Form->textarea('mensagem',array('class'=>'span12 cleditor required','rows'=>6));
echo $this->Form->hidden('idResposta',array('value'=>$idResposta));
echo $this->Form->hidden('nome',array('value'=>$mensagem['Mensagem']['nome']));
echo $this->Form->hidden('email',array('value'=>$mensagem['Mensagem']['email']));
echo $this->Form->hidden('lida',array('value'=>'sim'));

?>
</p>
<?php
echo $this->Form->button(__('Enviar'),array('class'=>'btn btn-success'));
?>