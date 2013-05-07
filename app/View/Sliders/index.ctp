<?php $this->element('seo');?>
<?php if(isset($atualiza)): ?>
<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button> <p>Algumas imagens estão no tamanho errado, para corrigir este problema clique no botão Corrigir, abaixo!</p><p><a href="" class=""></a><?php echo $this->Html->link('Corrigir',array('controller'=>'Sliders','action'=>'atualizaImgs'),array('class'=>'btn btn-danger plugin'));?></p></div>
<?php endif; ?>
<div class="Slider-controller">
    <table class="table-ajax table table-striped table-hover table-bordered">
        <thead>
            <tr>
            	<th>&nbsp;</th>
                <th>Imagem</th>
                <th>Titulo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($retorno as $value):?>
            <tr>
            	<td>&nbsp;</td>
                <td><?php if($value['Slider']['arquivo']!=null) echo $this->Html->image($authUser['id'].'/pequeno/'.$value['Slider']['arquivo']);?></td>
                <td><?php echo $value['Slider']['titulo'];?></td>
                <td class="table-acoes">
                	<?php
					echo $this->Html->link(
						'<i class="icon-edit"></i>',
						array('controller'=>'Sliders','action'=>'editaFull',$value['Slider']['id']),
						array('escape'=>false,'class'=>'btn plugin')
					);?>
                    <?php
					echo $this->Html->link(
						'<i class="icon-sort-up"></i>',
						array('controller'=>'Sliders','action'=>'edita',$value['Slider']['id'],'Sobe'),
						array('escape'=>false,'class'=>'btn plugin')
					);?>
                    <?php
					echo $this->Html->link(
						'<i class="icon-sort-down"></i>',
						array('controller'=>'Sliders','action'=>'edita',$value['Slider']['id'],'Desce'),
						array('escape'=>false,'class'=>'btn plugin')
					);?>
                    <?php
					echo $this->Html->link(
						'<i class="icon-remove"></i>',
						array('controller'=>'Sliders','action'=>'remove',$value['Slider']['id']),
						array('escape'=>false,'class'=>'btn plugin confirm')
					);?>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
        <tfoot>
            <tr>
            	<td>&nbsp;</td>
                <th>Titulo do menu</th>
                <th>Titulo da página</th>
                <th>Ações</th>
            </tr>
        </tfoot>
    </table>
</div>
<hr />
<?php echo $this->Html->link('Novo banner',array('controller'=>'Sliders','action'=>'add',$pagina_id),array('class'=>'btn btn-info plugin')) ;?>