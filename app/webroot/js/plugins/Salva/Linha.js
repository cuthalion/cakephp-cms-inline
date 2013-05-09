// JavaScript Document

function Linha(){

	$('.conteudo div').each(function(i){
		$(this).removeClass('ativo');
	});
	$('.conteudo').append('<div class="row admin-field ativo" data-ativo="true">Nova linha</div>');

}