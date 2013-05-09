<table class="table-ajax table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th>Lido</th>
            <th>
                <?php echo __('Assunto'); ?>
            </th>
            <th><?php echo __('Enviado por'); ?></th>
            <th><?php echo __('Data'); ?></th>
            <th><?php echo __('Ação'); ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($mensagem as $msg):?>
        <tr>
            <td>
                <?php
                    if ($msg['Mensagem']['lida']!='sim'){
                        echo $this->Html->image('icons/fugue/mail-close.png',array('alt'=>'Não','title'=>'Não', 'class'=>'tip'));
                    }else{
                        echo $this->Html->image('icons/fugue/mail-open.png',array('alt'=>'Sim','title'=>'Sim', 'class'=>'tip'));
                    }
                ?>
            </td>
            <td>
                <?php
                    if ($msg['Mensagem']['lida']!='sim') echo '<strong>';
                    echo $this->Html->link($mensagem['Mensagem']['titulo'],array('controller'=>'Mensagens','action'=>'view',$msg['Mensagem']['id'],$msg['Mensagem']['titulo']),array('escape' => false));
                    if ($msg['Mensagem']['lida']!='sim') echo '</strong>';
                ?>
            </td>
            <td><?php echo $this->Html->link('<strong>'.$msg['Mensagem']['nome'].'</strong> ('.$msg['Mensagem']['email'].')',array('controller'=>'Mensagens','action'=>'responde',$msg['Mensagem']['id'],$msg['Mensagem']['titulo']),array('escape' => false));?></td>
            <td>
                <?php echo $mensagem['Mensagem']['created'];?>
            </td>
            <td class="actions">
                <div class="btn-group">
                    <?php echo $this->Html->link( $this->Html->image('icons/fugue/mail-open.png'),array('controller'=>'Mensagens','action'=>'view',$msg['Mensagem']['id'],$mensagem['Mensagem']['titulo'], 'full_base' => true),array('escape' => false,'class'=>'btn btn-mini tip','title'=>'Ler'));?>
                     <?php echo $this->Html->link( $this->Html->image('icons/fugue/mail-reply.png'),array('controller'=>'Mensagens','action'=>'responde',$mensagem['Mensagem']['id'], 'full_base' => true),array('escape' => false,'class'=>'btn btn-mini tip','title'=>'Responder'));?>
                      <?php echo $this->Form->postLink($this->Html->image('icons/fugue/mail--minus.png'),array('controler'=>'Mensagens','action'=>'delete',$mensagem['Mensagem']['id'], 'full_base' => true),array('escape' => false,'confirm' => __('Tem certeza?'),'class'=>'btn btn-mini tip','title'=>'Apagar'));?>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Lido</th>
            <th>
                <?php echo __('Assunto'); ?>
            </th>
            <th><?php echo __('Enviado por'); ?></th>
            <th><?php echo __('Data'); ?></th>
            <th><?php echo __('Ação'); ?></th>
        </tr>
    </tfoot>
</table>