<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $this->element('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php echo $this->element('head',array(
		'css'=>array('bootstrap.min.admin','bootstrap-responsive.min.admin','jquery.fancybox','theme'),
		'js'=>array('jquery.admin','bootstrap.min.admin','jquery.fancybox.pack','design.js')
	));?>
          
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
          <?php echo $this->element('logo');?>
          <div class="nav-collapse collapse">
          	<?php echo $this->Link->menu($menu);?>
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