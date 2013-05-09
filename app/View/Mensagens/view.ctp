<div class="row-fluid no-margin">
    <div class="span12">
        <ul class="quicktasks">
        	<li>
                <?php 
					echo $this->Html->link( $this->Html->image('icons/essen/32/inbox.png').'<span>'.__('Caixa de entrada').'</span>', array('controller' => 'Mensagens', 'action'=>'index', 'full_base' => true),array('escape' => false));
				?>
            </li>
            <li>
                <?php 
					echo $this->Html->link( $this->Html->image('icons/essen/32/sign-out.png').'<span>'.__('Responder').'</span>', array('controller' => 'Mensagens', 'action'=>'responde',$mensagem['Mensagem']['id'], 'full_base' => true),array('escape' => false));
				?>
            </li>
            <li>
                <?php 
					if($mensagem['Mensagem']['idResposta']==0) echo $this->Html->link( $this->Html->image('icons/essen/32/finished-work.png').'<span>'.
					__('Marcar como'). $marca.'</span>', array('controller' => 'Mensagenss', 'action' => 'view',$mensagem['Mensagem']['id'],$mensagem['Mensagem']['titulo'],'nao', 'full_base' => true),array('escape' => false));
				?>
            </li>
        </ul>
    </div>
</div>
<hr />
<ul class="Mensagenss">
    <li class="user2">
        <a><?php echo $this->Html->image('sample/40.gif'); ?></a>
        <div class="info">
            <span class="arrow"></span>
            <div class="detail">
                <span class="sender">
                    <strong><?php echo $mensagem['Mensagem']['nome'];?></strong> <?php echo __('disse:');?>
                </span>
                <span class="time"><?php echo $mensagem['Mensagem']['created'];?></span>
            </div>
            <div class="Mensagens">
                <p><?php echo $mensagem['Mensagem']['mensagem'];?></p>
                <p>
                   <?php echo __('Email para resposta:');?> <strong><?php echo $mensagem['Mensagem']['email'];?></strong>
                </p>
            </div>
        </div>
    </li>
</ul>