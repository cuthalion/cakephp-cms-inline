<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
<<<<<<< HEAD
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Errors
=======
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Errors
>>>>>>> f4e6305d6ec87630dc98d7873ef0e43ad50f9266
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<<<<<<< HEAD
<?php $this->element('seo',array('canonical'=>'/'));?>
<h2><?php echo $name; ?></h2>
<p class="alert alert-error">
    Mas tenha calma, isso ainda não é o fim, tenho algumas dicas para te colocar novamente nos trilhos.
</p>
<ul>
	<li>Se você digitou a URL na barra de endereços, <span class="text-success">confira se ele está correto</span>.</li>
    <li>Se você foi enviado PAra cá por um link, tente voltar para a <?php echo $this->Html->link('página anterior','javascript:history.back()',array('class'=>'btn btn-success'));?>.</li>
    <li>Outra solução é se guiar pelo menu de navegação, nele você encontra o caminho para as principais seções do nosso site com apenas 1 clique, logo ao final desta página vou colocar ele mais uma vez para te ajudar!</li>
    <li>Ou então, vá para a <?php echo $this->Html->link('página inicial','/',array('class'=>'btn btn-success'));?>, muito mais fácil de se localizar por lá.</li>
</ul>
<p>Se mesmo assim você não conseguiu resolver sua situação, não se preocupe, um técnico já foi avisado e em breve resolverá a situação.</p>
<p>Agradeçemos a visita, <?php echo $logo;?></p>
<p>Quase esqueci, o menu principal deste site, de repente te ajuda:</p>
<?php echo $this->Erik->menu($menu,null,array('class'=>'nav-tabs nav-stacked'));?>
<?php
if (Configure::read('debug') > 0 ):
=======
<h2><?php echo $name; ?></h2>
<p class="error">
	<strong><?php echo __d('cake', 'Error'); ?>: </strong>
	<?php printf(
		__d('cake', 'The requested address %s was not found on this server.'),
		"<strong>'{$url}'</strong>"
	); ?>
</p>
<?php
if (Configure::read('debug') > 0):
>>>>>>> f4e6305d6ec87630dc98d7873ef0e43ad50f9266
	echo $this->element('exception_stack_trace');
endif;
?>
