<?php $this->element('seo'); ?>
<div class="tab-content">
    <div class="tab-pane active" id="basic">
        <table class='table-ajax table table-striped table-hover table-bordered'>
            <thead>
                <tr>
                    <th><?php echo __('Nome');?></th>
                    <th><?php echo __('Usuário');?></th>
                    <th><?php echo __('Tipo');?></th>
                    <th><?php echo __('Criado em');?></th>
                    <th><?php echo __('Apagar');?></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($Users as $User):?>
                <tr>
                    <td>
						<strong><?php echo $this->Html->Link($User['User']['nome'],array('controler'=>'Users','action'=>'edit',$User['User']['id']));?></strong>
                        (<?php
						
							if($userMaster['User']['base']==$User['User']['base']){
								$url = $User['User']['base'];
							}else{
								$url = $User['User']['base'].'.'.$userMaster['User']['base'];
							}
							echo $this->Html->Link($url,'http://'.$url,array('target'=>'_blank'));
						
						?>)
                    </td>
                    <td><?php echo $User['User']['username'];?></td>
                    <td><?php echo $User['User']['role'];?></td>
                    <td><?php
						$criado=explode(' ',$User['User']['created']);
						$criado['data'] = explode('-',$criado[0]);
						$criado['data'] = $criado['data'][2].'/'.$criado['data'][1].'/'.$criado['data'][0];
						$criado['hora'] = explode(':',$criado[1]);
						$criado['hora'] = $criado['hora'][0].':'.$criado['hora'][1];
						echo $criado['data'].' '.$criado['hora'];
						
					?></td>
                    <td>
                    	<?php echo $this->Html->Link('Editar',
									array(
										'controler'=>'Users',
										'action'=>'edit',
										$User['User']['id']
									),
									array(
										'class'=>'btn btn-primary'
									)
								);?>
						<?php echo $this->Form->postLink('Apagar',
									array(
										'controler'=>'Users',
										'action'=>'delete',
										$User['User']['id']
									),
									array(
										'confirm' => __('Tem certeza?'),
										'class'=>'btn btn-danger'
									)
									);?>
                    </td>
                </tr>
             <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>