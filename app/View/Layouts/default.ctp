<<<<<<< HEAD
<?php 
	/*
	 * Trocar tmp/jquery-ui.css por http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css'
	 * Trocar tmp/jquery.min.js por //ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js'
	 * Trocar tmp/jquery-ui.js por http://code.jquery.com/ui/1.10.0/jquery-ui.js'
	 */
	 
	 /*** CSS DO TEMA ***/
	 echo $this->Html->css(array('bootstrap.min','bootstrap-responsive.min','jquery.fancybox','theme'),null,array('inline'=>false));
	 
	 /*** JS DO TEMA ***/
	 echo $this->Html->script(array('tmp/jquery.min.js','bootstrap.min'),array('inline'=>false));
	 if(!$authUser) echo $this->Html->script(array('jquery.fancybox.pack','design.js'),array('inline'=>false));
	 
	 /*** ABRE A ADMINISTRAÇÃO ***/
	 echo $this->element('base_admin_body');
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $this->element('seo_title',array('title_page'=>$title_page,'title_site'=>$title_site));?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
		<?php
			echo $this->Html->charset();
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->Html->meta('icon');
        ?>
          
  </head>
  <body>
  
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?php echo $this->Html->url('/') ?>"><?php echo $logo;?></a>
          <div class="nav-collapse collapse">
          	<?php echo $this->Erik->menu($menu);?>
          </div>
        </div>
      </div>
    </div>
    
    <div id="wrap">
  		<div class="top-navi-padding body">
        	<div class="container body">
            	<div class="row">
                    <div class="span12">
                    	<?php echo $this->Session->flash(); ?>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="conteudo">
                <?php echo $this->fetch('content'); ?>
                </div>
            </div>
        </div>
    </div>
    
    <div id="footer">
        <div class="container">
            <p class="muted credit">
            Desenvolvido com Twitter Bootstrap 2.2.2, Jquery 1.8.1 e CakePHP 2.3.4 - por <a href="http://www.erikfigueiredo.com.br" class="ttip" title="Ver o site do Desenvolvedor" target="_blank">Erik Figueiredo</a>. </p>
        </div>
    </div>
    
    <?php echo $this->fetch('script');?>
  </body>
</html>
=======
<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?><?php echo $this->element('dashboard'); ?>
	<title>
		CMS Inline:
		<?php echo $title_for_layout; ?>
	</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('bootstrap','bootstrap-responsive'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
	?>
</head>
<body>
	<div id="container">
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
    <?php echo $this->fetch('script');?>
</body>
</html>
>>>>>>> f4e6305d6ec87630dc98d7873ef0e43ad50f9266
