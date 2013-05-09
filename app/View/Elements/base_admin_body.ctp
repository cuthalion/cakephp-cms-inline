<?php /*admin*/
if($authUser):

//verifica se está administrando páginas:
if($request['controller']=='Paginas'):

	$this->start('script');
	echo $this->Html->css(array(
			'jquery-ui',
			'font-awesome.min',
			'dataTables',
			'admin'
		),
		null,
		array(
			'inline'=>false
		));
	echo $this->Html->css('font-awesome.min',null,array('inline'=>false));
	?>
	
	<?php //**** MENUS DA ADMINSITRAÇÃO ****// ?>
	
	<div class="admin-menu dragg">
		<div class="navbar">
			<div class="navbar-inner">
				<span class="brand">
					Gerenciamento do Site
				</span>
				<ul class="nav">
					<li>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							Menu
							<i class="caret">
							</i>
						</a>
						<ul id="admin-menu" class="dropdown-menu">
							<li>
								<a href="#">
									Carregando...
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="<?php echo $cms['base_url']?>/Perfil" data-plugin="Perfil">
							<i class="icon-user"></i>
							Perfil
						</a>
					</li>
					<li>
						<a href="<?php echo $cms['base_url']?>/Seo" data-plugin="Seo">
							<i class="icon-globe"></i>
							SEO
						</a>
					</li>
					<li>
						<a href="<?php echo $cms['base_url']?>/Mensagens" data-plugin="Mensagens" class="marcador">
							<i class="icon-envelope"></i>
							<b>Mensagens</b>
							<span class="btn btn-super-mini btn-danger marcador"><?php echo $mensagens; ?></span>
						</a>
					</li>
                    <li>
						<a href="<?php echo $cms['base_url']?>/Ajuda" data-plugin="Ajuda" class="marcador">
							<i class="icon-question-sign"></i>
							Ajuda
						</a>
					</li>
					<li>
						<a href="<?php echo $cms['base_url']?>/logout" data-plugin="Sair">
							<i class="icon-off"></i>
							Sair
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="admin-menu-pagina dragg">
		<div class="navbar">
			<div class="navbar-inner">
				<span class="brand">
				 Edição
				</span>
				<ul class="nav icons">
					<li>
						<a href="<?php echo $cms['base_url']?>/Salva/Salvar" data-plugin="Salvar" class="ttip" data-placement="bottom" title="Salvar">
							<i class="icon-save red"></i>
						</a>
					</li>
					<li>
						<a href="<?php echo $cms['base_url']?>/Salva/Organizar" data-plugin="Organizar" class="ttip" data-placement="bottom" title="Habilitar/Desabilitar Mover">
							<i class="icon-move"></i>
						</a>
					</li>
                </ul>
                <ul class="nav icons">
					<li>
						<a href="<?php echo $cms['base_url']?>/Salva/Linha" data-plugin="Linha" class="ttip" data-placement="bottom" title="Inserir Linha">
							<i class="icon-reorder"></i>
						</a>
					</li>
					<li>
						<a href="<?php echo $cms['base_url']?>/Salva/Coluna" data-plugin="Coluna" class="ttip" data-placement="bottom" title="Inserir Coluna">
							<i class="icon-th-large"></i>
						</a>
					</li>
                    <li>
						<a href="<?php echo $cms['base_url']?>/Salva/Remove" data-plugin="Remove" class="ttip" data-placement="bottom" title="Apaga linha/coluna atual">
							<i class="icon-remove"></i>
						</a>
					</li>
                </ul>
                <ul class="nav icons">
					<li>
						<a href="<?php echo $cms['base_url']?>/Salva/Texto" data-plugin="Texto" class="ttip" data-placement="bottom" title="Inserir Texto/Html">
							<i class="icon-font"></i>
						</a>
					</li>
					<li>
						<a href="<?php echo $cms['base_url']?>/Salva/Slider" data-plugin="Slider" class="ttip" data-placement="bottom" title="Inserir Slider">
							<i class="icon-picture"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
    
	
	<?php //**** JANELA MODAL COM CONFIGURAÇÕES E OPÇOES ****// ?>
	<div class="modal hide fade" id="minha-janela">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>Modal header</h3>
	  </div>
	  <div class="modal-body">
		<p>Vazio…</p>
	  </div>
	</div>
	
	<?php //**** JANELA MODAL MOSTRANDO QUA ALGO ESTÁ SENDO CARREGADO ****// ?>
	<div class="modal hide fade" id="preloader">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>Carregando aguarde!</h3>
	  </div>
	  <div class="modal-body">
		<div class="alert alert-block"><a class="close" data-dismiss="alert" href="#">&times;</a>Aguarde... carregando!</div>
		<div class="progress progress-striped active"><div class="bar" style="width: 100%;">Aguarde!</div>
	  </div>
	</div>
	<div id="corpoClear" style="visibility:hidden"></div>
	
	<?php //**** CONFIGURAÇA A URL BASE PARA S SCRIPTS ****// ?>
	
	<script type="text/javascript">
	$(function(){
		base_url='<?php echo $cms['base_url']?>';
		<?php if(isset($conteudo['Pagina']['id'])): ?>
	pagina_id=<?php echo $conteudo['Pagina']['id']?>;
	user_id=<?php echo $authUser['id']?>;
		<?php endif; ?>
	});
	</script>
	
	<?php //**** CARREGA TODOS OS JAVASCRIPTS RESPONSÁVEIS PELA ADMINISTRAÇÃO ****// ?>
	
	<?php
		echo $this->Html->script(array('jquery-ui.js','dataTables','ckeditor/ckeditor','admin'));
	$this->end();
else:
	$this->start('script');
	echo $this->Html->css(array(
			'dataTables'
		),
		null,
		array(
			'inline'=>false
		));
	echo $this->Html->script(array('jquery-ui.js','dataTables'));
	$this->end();
endif;
endif;
?>