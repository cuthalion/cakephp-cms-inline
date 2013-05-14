// JavaScript Document

$(function(){
	
	if($('.ttip').length>0){
		$('.ttip').tooltip();
	}
	if($('.carousel').length>0){
		$('.carousel').carousel();
	}
	
	//avisa que não tem nenhum editor aberto:
	
	editor = false;
	arrasta = false;
	
	$(document).live('click',function(e){
		if ($(e.target).is('.body')){
			$('div').each(function(){
				$(this).removeClass('coluna-ativo');
				$(this).removeClass('row-ativo');
			})
		}
	});
	
	//CRIANDO OS MENUS
	//menu principal
		
		
	//OCULTA PRELOADER
	
	/*TRANSFORMA TOS OS ITENS ADMINISTRÁVEIS EM ... ITENS ADMINISTRÁVEIS....KKKK*/
	
	loadPlugin('EditaPagina');
	
	//ATIVA ARRASTAR O MENU
	move();
	
	//carrega o ckeditor
	ckReload();
	
	//Pega os links para módulos da administração
	$.ajax({
	  url: base_url+'/Ajax/Menu',
	  dataType: "json",
	  error: function(){
		  menu=[{"legenda":"Erro","url":"erro"}];
		  constroiMenu(menu);
	  },
	  success: function(data){
		  menu=data;
		  constroiMenu(menu);
	  }
	});
	
	//função de click do menu
	
	$('.admin-menu li a,.admin-menu-admin li a').die('click');
	$('.admin-menu li a,.admin-menu-admin li a').live('click',function(e){
		var url = $(this).attr('href');
		var plugin = $(this).data('plugin');
		if(url=='#'){
			return false;
		}
		if(url=='erro'){
			alert('Alguma coisa deu errado ao carregar o menu, verifique se está logado no site!');
		}else{
			loadPlugin(plugin);
		}
		return false;
	});
	
	//FUNÇÃO QUE CONSTROI ITENS DO MENU
	function constroiMenu(menu){
		var retorno = '';
		$.each(menu, function() {
			$.each(this,function(key,value){
				if(key=='legenda'){
					legenda=value;
				}else if(key=='url'){
					url=value;
				}
			});
			retorno+='<li><a href="'+base_url+'/'+url+'" data-plugin="'+url+'">'+legenda+'</a></li>';
		});
		$('#admin-menu').html(retorno);
	}
	
	
	/* --------------=====================FUNÇÕES DO SISTEMA=====================-------------- */
	
	/*Banner*/
	function Banners(){
		showPreloader();
		$.ajax({
			//url:base_url+'/Sliders/edita/'+pagina_id,
			url:base_url+'/Sliders/index/'+pagina_id,
			dataType: "html",
			type:'get',
			success:function(data){
				var html=data;
				
				closePreloader();
				
				$('#minha-janela .modal-header h3').text('Gerenciador banners');
				$('#minha-janela .modal-body').html(html);
				$('#minha-janela').modal();
				$('.table-ajax').dataTable();
				
				ajaxLink('Banners','AtualizaSlider')
				
			}
		});
		
	}
	/*Mensagens*/
	function Mensagens(){
		showPreloader();
		$.ajax({
			url:'Mensagens/index',
			dataType: "html",
			type:'get',
			success:function(data){
				var html=data;
				
				closePreloader();
				
				$('#minha-janela .modal-header h3').text('Emails / Mensagens');
				$('#minha-janela .modal-body').html(html);
				$('#minha-janela').modal();
				$('.table-ajax').dataTable();
				
				ajaxLink('Mensagens')
				
			}
		})
	}
	
	/*Ajuda*/
	function Ajuda(){
		showPreloader();
		$.ajax({
			url:'Ajuda/index',
			dataType: "html",
			type:'get',
			success:function(data){
				var html=data;
				
				closePreloader();
				
				$('#minha-janela .modal-header h3').text('Ajuda');
				$('#minha-janela .modal-body').html(html);
				$('#minha-janela').modal();
				$('.table-ajax').dataTable();
				
				ajaxLink('Ajuda')
				
			}
		})
	}
	
	/*Paginas*/
	function Paginas(){
		showPreloader();
		$.ajax({
			url:'Paginas/index',
			dataType: "html",
			type:'get',
			success:function(data){
				var html=data;
				
				closePreloader();
				
				$('#minha-janela .modal-header h3').text('Páginas');
				$('#minha-janela .modal-body').html(html);
				$('#minha-janela').modal();
				$('.table-ajax').dataTable();
				
				ajaxLink('Paginas')
				
			}
		})
	}
	
	/*Paginas*/
	function Galerias(){
		showPreloader();
		$.ajax({
			url:'galeria/categorias/index',
			dataType: "html",
			type:'get',
			success:function(data){
				var html=data;
				
				closePreloader();
				
				$('#minha-janela .modal-header h3').text('Portfólio');
				$('#minha-janela .modal-body').html(html);
				$('#minha-janela').modal();
				$('.table-ajax').dataTable();
				
				ajaxLink('Galerias')
				
			}
		})
	}
	
	
	/*Imagens*/
	function Imagens(){
		$('#minha-janela .modal-header h3').text('Minhas imagens');
		$('#minha-janela .modal-body').html('<iframe src="'+base_url+'/Imagens/add" name="image" scrolling="Auto" frameborder="0" style="width:100%; min-height:450px"></iframe>');
		$('#minha-janela').modal();
		$('.table-ajax').dataTable();
		}
	
	/*Usuarios*/
	function Usuarios(){
		showPreloader();
		$.ajax({
			url:'Users/index/ajax',
			dataType: "html",
			type:'get',
			success:function(data){
				var html=data;
				
				closePreloader();
				
				$('#minha-janela .modal-header h3').text('Usuários cadastrados');
				$('#minha-janela .modal-body').html(html);
				$('#minha-janela').modal();
				$('.table-ajax').dataTable();
				
				ajaxLink('Usuarios')
				
			}
		})
	}
	
	/*Temas*/
	function Temas(){
		showPreloader();
		$.ajax({
			url:'Temas/index/ajax',
			dataType: "html",
			type:'get',
			success:function(data){
				var html=data;
				
				closePreloader();
				
				$('#minha-janela .modal-header h3').text('Configurações de aparência');
				$('#minha-janela .modal-body').html(html);
				$('#minha-janela').modal();
				
				ajaxLink('Temas')
			}
		});
		return false;
	}
	
	/*Temas administracao*/
	function TemasAdmin(){
		showPreloader();
		$.ajax({
			url:'Temas/admin',
			dataType: "html",
			type:'get',
			success:function(data){
				var html=data;
				
				closePreloader();
				
				$('#minha-janela .modal-header h3').text('Configurações de aparência');
				$('#minha-janela .modal-body').html(html);
				$('#minha-janela').modal();
				
				ajaxLink('TemasAdmin')
			}
		});
		return false;
	}
	
	/*Cobranca*/
	function Cobranca(){
		showPreloader();
		$.ajax({
			url:'Cobrancas/index',
			dataType: "html",
			type:'get',
			success:function(data){
				var html=data;
				
				closePreloader();
				
				$('#minha-janela .modal-header h3').text('Configurações de cobrança');
				$('#minha-janela .modal-body').html(html);
				$('#minha-janela').modal();
				
				ajaxLink('Cobranca')
			}
		});
		return false;
	}
	
	/*Textos*/
	function Textos(){
		showPreloader();
		$.ajax({
			url:'Textos/index',
			dataType: "html",
			type:'get',
			success:function(data){
				var html=data;
				
				closePreloader();
				
				$('#minha-janela .modal-header h3').text('Textos do site');
				$('#minha-janela .modal-body').html(html);
				$('#minha-janela').modal();
				
				var config = {};

                $('.ckeditor').ckeditor(config);
				
				ajaxForm('Textos')
			}
		});
		return false;
	}
	
	/*Perfil*/
	function Perfil(){
		showPreloader();
		$.ajax({
			url:'Users/perfil/'+user_id,
			dataType: "html",
			type:'get',
			success:function(data){
				var html=data;
				
				closePreloader();
				
				$('#minha-janela .modal-header h3').text('Perfil');
				$('#minha-janela .modal-body').html(html);
				$('#minha-janela').modal();
				$('.table-ajax').dataTable();
				
				ajaxForm('Perfil');
				
			}
		})
	}
	/*Sair*/
	function Sair(){
		if(confirm('Deseja realmente sair da administração do seu site!')){
			$(window.document.location).attr("href",base_url+'/Users/Logout');
		};
	}
	/*SEO*/
	function Seo(){
		showPreloader();
		$.ajax({
			url:'Seo/index',
			dataType: "html",
			type:'get',
			success:function(data){
				var html=data;
				
				closePreloader();
				
				$('#minha-janela .modal-header h3').text('Opções para motores de busca!');
				$('#minha-janela .modal-body').html(html);
				$('#minha-janela').modal();
				$('.table-ajax').dataTable();
				
				ajaxForm('Seo');
				
			}
		})
	}
	
	/* ---===Menu de edição da página===--- */
	function EditaPagina(){
		$('.admin-menu-pagina').removeClass('desabilita');
	
		$('.admin-menu-pagina li a').die('click');
		$('.admin-menu-pagina li a').live('click',function(e){
			var url = $(this).attr('href');
			var plugin = $(this).data('plugin');
			if(url=='#'){
				return false;
			}
			if(url=='erro'){
				alert('Alguma coisa deu errado ao carregar o menu, verifique se está logado no site!');
			}else{
				loadPlugin(plugin);
			}
			return false;
		});
		
		$('.conteudo .row').live('click',function(){
			$('.conteudo div').each(function(i){
				$(this).removeClass('row-ativo');
			});
			$(this).addClass('row-ativo');
		});
		
		$('.conteudo .row').live('click',function(){
			$('.conteudo div').each(function(i){
				$(this).removeClass('row-ativo');
			});
			$(this).addClass('row-ativo');
		});
		
		$('.conteudo [class*="span"]').live('click',function(){
			$('.conteudo div').each(function(i){
				$(this).removeClass('coluna-ativo');
			});
			$(this).addClass('coluna-ativo');
		});
	
	}
	
	//atualiza o menu de navegação
	//Orientação... quando for criar um menu ele deve estar sozinho dentro do elemento pai!
	function AtualizaMenu(){
		$('ul.nav').each(function(){
			$(this).html('<li>Atualizando...</li>');
		});
		$.ajax({
			url:base_url+'/Paginas/menu',
			dataType:'html',
			success:function(data){
				$('ul.nav').each(function(){
					$(this).parent().html(data);
				});
			}
		});
		return false;
	}
	
	/*add Linha*/
	function Linha(){

		$('.conteudo div').each(function(i){
			$(this).removeClass('row-ativo');
		});
		$('.conteudo').append('<div class="row admin-field row-ativo sort">Nova linha</div>');
		move()
	
	}
	
	/*add Coluna*/
	function Coluna(){
		var i = 0;
		$('.row-ativo').each(function(){
			i++;
		});
		if(i==0){
			$('#minha-janela .modal-header h3').html('Nenhuma linha selecionada');
			$('#minha-janela .modal-body').html('Atenção: você precisa escolher uma linha para poder adicionar uma coluna!');
			$('#minha-janela').modal();
		}else if(i==1){
			addHtml($('.row-ativo'));
			
			function addHtml(elemento){
				
				var n='1';
				$('#minha-janela .modal-header h3').html('Escolha o tamanho da coluna');
				$('#minha-janela .modal-body').html('<p>Escolha o tamanho da coluna: <div class="btn-group"><a href="1" class="btn">1</a><a href="2" class="btn">2</a><a href="3" class="btn">3</a><a href="4" class="btn">4</a><a href="5" class="btn">5</a><a href="6" class="btn">6</a><a href="7" class="btn">7</a><a href="8" class="btn">8</a><a href="9" class="btn">9</a><a href="10" class="btn">10</a><a href="11" class="btn">11</a><a href="12" class="btn">12</a></div></p>');
				
				$('#minha-janela').modal();
				
				$('.conteudo div').each(function(i){
					$(this).removeClass('coluna-ativo');
				});
				
				$('#minha-janela .modal-body .btn-group a').die('click');
				$('#minha-janela .modal-body .btn-group a').live('click',function(e){
					
					n = $(this).attr('href');
					html = '<div class="span'+n+' coluna-ativo">Nova Coluna</div>';
					if(elemento.html()=='Nova linha'){
						elemento.html(html);
					}else{
						e.stopPropagation();
						elemento.append(html);
					}
					move();
					$('#minha-janela').modal('hide');
					return false;
				});
			}
		}else{
			$('#minha-janela .modal-header h3').html('Escolha apenas uma linha');
			$('#minha-janela .modal-body').html('Atenção: Existe mais de uma linha ativa no momento, clique apenas em uma!');
			$('#minha-janela').modal();
		}
		return false;
	}
	
	/*Add Texto*/
	function Texto(){
		var i = 0;
		$('.coluna-ativo').each(function(){
			i++;
		});
		if(i==0){
			$('#minha-janela .modal-header h3').html('Nenhuma coluna selecionada');
			$('#minha-janela .modal-body').html('Atenção: você precisa selecionar uma coluna para poder adicionar um campo de Texto/Html!');
			$('#minha-janela').modal();
		}else if(i==1){
			if(confirm('Você irá sobrescrever o conteúdo atual!')){
				$('.coluna-ativo').html('<div class="campo-edita"><p>Clique aqui para alterar este texto!</p></div>');
				ckReload();
			}
		}
		return false;
	}
	
	/*Add Slider*/
	function Slider(){
		var i = 0;
		$('.coluna-ativo').each(function(){
			i++;
		});
		if(i==0){
			$('#minha-janela .modal-header h3').html('Nenhuma coluna selecionada');
			$('#minha-janela .modal-body').html('Atenção: você precisa selecionar uma coluna para poder adicionar um campo de Texto/Html!');
			$('#minha-janela').modal();
		}else if(i==1){
			if(confirm('Você irá sobrescrever o conteúdo atual!')){
				showPreloader();
				$.ajax({
					url:base_url+'/Paginas/slider/'+pagina_id,
					dataType:'html',
					success:function(data){
						$('.coluna-ativo').html(data);
						closePreloader();
					}
				});
			}
		}
		return false;
	}
	
	/*Atualiza Slider*/
	//Orientação... quando for criar o slider ele deve estar sozinho dentro do elemento pai!
	function AtualizaSlider(){
		
		$('.slide').each(function(){
			$(this).html('Atualizando...');
		});
		$.ajax({
			url:base_url+'/Paginas/slider/'+pagina_id,
			dataType:'html',
			success:function(data){
				$('.slide').each(function(){
					$(this).parent().html(data);
				});
			}
		});
		return false;
	}
	
	//remove linha/coluna atual
	function Remove(){
		var i = 0;
		var j = 0;
		$('.coluna-ativo').each(function(){
			i++;
		});
		if(i==0){
			$('.row-ativo').each(function(){
				j++;
			});
			if(j==0){
				$('#minha-janela .modal-header h3').html('Nenhuma linha ou coluna selecionada');
				$('#minha-janela .modal-body').html('Atenção: você precisa selecionar uma linha ou coluna selecionada para poder remover!');
				$('#minha-janela').modal();
			}else if(j==1){
				if(confirm('Tem certeza que quer remover essa linha?')){
					$('.row-ativo').hide('slow',function(){
						$('.row-ativo').remove();
					});
				}
			}
		}else if(i==1){
			if(confirm('Tem certeza que quer remover essa coluna?')){
				$('.coluna-ativo').hide('slow',function(){
					$('.coluna-ativo').remove();
					i=0;
					$('.row-ativo div').each(function(){
						i++;
					});
					if(i==0){
						$('.row-ativo').text('Nova linha');
					}
				});
			}
		}
		return false;
	}
	
	/*Salvar*/
	function Salvar(before){
		$('#minha-janela .modal-header').remove();
		$('#minha-janela .modal-body').html('<div class="progress progress-striped"><div class="bar" style="width: 100%;">Salvando</div></div>');
		$('#minha-janela').modal();
		
		$('#corpoClear').html($('.conteudo').html());
		
		var i = 0;
		$('#corpoClear .carousel-inner .item').each(function(){
			if(i!=0){
				$(this).removeClass('active');
			}else{
				$(this).addClass('active');
			}
			if(i==$('.carousel-inner .item').length){
				i=0;
			}else{
				i++;
			}
		});
		
		$('#corpoClear div').each(function(){
			$(this).removeClass('coluna-ativo');
			$(this).removeClass('row-ativo');
			$(this).removeClass('admin-field sort');
			$(this).removeClass('sort');
			$(this).removeClass('ui-sortable');
			$(this).removeAttr('contenteditable');
			$(this).children('.campo-edita').each(function() {
				// first copy the attributes to remove
				// if we don't do this it causes problems
				// iterating over the array we're removing
				// elements from
				var attributes = $.map(this.attributes, function(item) {
				return item.name;
				});
				
				// now use jQuery to remove the attributes
				var img = $(this);
				$.each(attributes, function(i, item) {
				img.removeAttr(item);
				});
			}).addClass('campo-edita');
		});
		
		$('#corpoClear form.remove').remove();
		
		var corpo = $('#corpoClear').html();
		$('form#paginaConteudo .corpo').val(corpo);
		data = $('form#paginaConteudo').serialize();
		id = $('form#paginaConteudo .id').val()
		url = base_url+'/Paginas/edit/'+id;
		
		$.ajax({
			url:url,
			type:'post',
			dataType:'html',
			data:data,
			success:function(html){
				$('#minha-janela .modal-body .bar').html('Salvo!');
				if(html=='reload'){
					location.reload();
				}else if(html=='erro'){
					$('#minha-janela .modal-body .bar').html('Erro ao salvar');
				}else{
					$('#minha-janela .modal-body').html(html);
				}
			}
		});
	}
	
	/* --------------=====================FUNÇÕES DO CORE=====================-------------- */
	//carrega o plugin
	function loadPlugin(plugin){
		eval(plugin+'()');
	}
		
	//Fecha a modal
	function modalClose(){
		$('#minha-janela .modal-header.close').click(function(){
			$('#minha-janela .modal-header h3').html('Vazio');
			$('#minha-janela .modal-body').html('<p>Vazio…</p>');
		});
	}
	
	//envio de formulário ajax no form
	function ajaxForm(plugin,atualiza){
		
		atualiza = typeof atualiza !== 'undefined' ? atualiza : false;
		
		$('#minha-janela form').submit(function(){
			$('#minha-janela .modal-header h3').text('Salvando seus dados!');
			$('#minha-janela .modal-body').html('<div class="progress progress-striped"><div class="bar" style="width: 100%;">Salvando</div></div>');
			var action = $(this).attr('action');
			var data = $(this).serialize();
			$.ajax({
				url:action,
				type:'post',
				data:data,
				dataType:'html',
				success:function(html){
					if(html=='reload'){
						loadPlugin(plugin);
						if(atualiza) loadPlugin(atualiza);
						ajaxLink(plugin);						
					}else{
						$('#minha-janela .modal-body').html(html);
						ajaxForm(plugin,atualiza)
					}
				}
			});
			return false;
		});
	}
	
	//salvamento de páginas Ajax
	function ajaxLink(plugin,atualiza){
		
		atualiza = typeof atualiza !== 'undefined' ? atualiza : false;
		
		$('.plugin').click(function(){
			if($(this).hasClass('confirm')){
				if(confirm('Tem certeza?')){
					exec(plugin,$(this),atualiza);
				}
			}else{
				exec(plugin,$(this),atualiza);
			}
			return false;
		});
		
		function exec(plugin,este,atualiza){
			$('#minha-janela .modal-body ').prepend(
				'<div class="alert alert-block"><a class="close" data-dismiss="alert" href="#">&times;</a>Aguarde... carregando!</div>'
			)
			
			if(este.hasClass('voltar')){
				loadPlugin(plugin);
			}else{
				$.ajax({
					url:este.attr('href'),
					dataType: "html",
					type:'get',
					success:function(data){
						if(data=='ok'){
							$('#minha-janela .modal-body').prepend(
								'<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">&times;</a>Ok, salvo com sucesso!</div>'
							)
						}else if(data=='reload'){
							loadPlugin(plugin);
							if(atualiza) loadPlugin(atualiza);
						}else if(data=='erro'){
							$('#minha-janela .modal-body ').prepend(
								'<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">&times;</a>Erro, não pode ser salvo!</div>'
							)
						}else{
							$('#minha-janela .modal-body').html(data);
							if(este.hasClass('link')){
								$('#minha-janela .modal-header h3').text('Imagens');
								$('.table-ajax').dataTable();
								ajaxLink(plugin);
							}else{
								ajaxForm(plugin,atualiza);
							}
						}
						
						imageSelect();
					},
					error:function(){
						$('#minha-janela .modal-body ').prepend(
							'<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">&times;</a>Alguma coisa deu errado, contate o suporte!</div>'
						)
					}
				});
			}
		}
	}
	
	// MOSTRA ANIMAÇÃO MOSTRANDO QUE ESTÁ CARREGANDO ALGO
	function showPreloader(){
		$('#preloader').modal();
	}
	
	// FECHA ANIMAÇÃO MOSTRANDO QUE ESTÁ CARREGANDO ALGO
	function closePreloader(){
		$('#preloader').modal('hide');
	}
	
	//ativa funções de movimentação
	function move(){
		$( ".dragg" ).draggable();
	}
	
	function Organizar(){
		if(arrasta==true){
			sortOff();
			arrasta=false;
			ckCria();
		}else{
			sortOn();
			arrasta=true;
			ckRemove();
		}
	}
	
	function sortOn(){
		$( ".conteudo" ).sortable();
		$( ".row" ).sortable();
	}
	
	function sortOff(){
		$( ".conteudo" ).sortable('destroy');
		$( ".row" ).sortable('destroy');
	}
	
	//remove O CKEDITOR
	function ckRemove(){
		for(name in CKEDITOR.instances)
		{
			CKEDITOR.instances[name].destroy()
		}
	}
	
	//cria O CKEDITOR
	function ckCria(){
		
		$.each($('.campo-edita'),function(i,val){
			$(this).attr('contenteditable','true')
		});
		
		//$('.conteudo img').resizable();
		
		CKEDITOR.inlineAll();
	}
	
	//RECARREGA O CKEDITOR
	function ckReload(){
		for(name in CKEDITOR.instances)
		{
			CKEDITOR.instances[name].destroy()
		}
		
		$.each($('.campo-edita'),function(i,val){
			$(this).attr('contenteditable','true')
		});
		
		//$('.conteudo img').resizable();
		
		CKEDITOR.inlineAll();
		
	}
	
	//Escolhe a foto
	
	function imageSelect(){
		$('.image-select').click(function(){
			window.open(base_url+'/Imagens/add?elementid='+$(this).attr('id'),'_blank','height=400,width=800');
			return false;
		});
	}
	
	/*********** LAYOUT *************/

	if($('.ttip').length>0){
		$('.ttip').tooltip();
	}
	
})