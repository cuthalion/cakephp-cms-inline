function EditaPagina(){
	$('.admin-menu-pagina').removeClass('desabilita');
if(!editor){
	$('body').append('<div class="admin-menu-pagina dragg"><div class="navbar"><div class="navbar-inner"><span class="brand">Edição</span><ul class="nav icons"><li><a href="'+base_url+'/Salva/Salvar" data-plugin="Salva/Salvar"><i class="icon-save red"></i></a></li><li><a href="'+base_url+'/Salva/Linha" data-plugin="Salva/Linha"><i class="icon-reorder"></i></a></li><li><a href="'+base_url+'/Salva/Coluna" data-plugin="Salva/Coluna"><i class="icon-th-large"></i></a></li><li><a href="'+base_url+'/Salva/Texto" data-plugin="Salva/Texto"><i class="icon-font"></i> </a></li><li><a href="'+base_url+'/Salva/Imagem" data-plugin="Salva/Imagem"><i class="icon-picture"></i> </a></li></ul></div></div></div>');
	$( ".dragg" ).draggable();
	editor = true;
}

	$('.admin-menu-pagina li a').live('click',function(){
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

}