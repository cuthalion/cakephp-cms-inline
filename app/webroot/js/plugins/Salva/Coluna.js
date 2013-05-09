function Coluna(){

	$('.conteudo div').each(function(i){
		if($(this).hasClass('ativo')){
			if($(this).hasClass('row')){
				addHtml($(this));
			}else{
				addHtml($(this).parent());
			}
		}
	});
	
	function addHtml(elemento){
		
		var n='1';
		
		$('.modal-body').html('<p>Escolha o tamanho da coluna: <div class="btn-group"><a href="1" class="btn">1</a><a href="2" class="btn">2</a><a href="3" class="btn">3</a><a href="4" class="btn">4</a><a href="5" class="btn">5</a><a href="6" class="btn">6</a><a href="7" class="btn">7</a><a href="8" class="btn">8</a><a href="9" class="btn">9</a><a href="10" class="btn">10</a><a href="11" class="btn">11</a><a href="12" class="btn">12</a></div></p>');
		
		$('#minha-janela').modal()
		
		$('.modal-body .btn-group a').live('click',function(e){
			
			e.stopPropagation();
			
			n = $(this).attr('href');
			
			if(elemento.html()=='Nova linha'){
				elemento.html('<div class="span'+n+'">Nova Coluna</div>');
			}else{
				elemento.append('<div class="span'+n+'">Nova Coluna</div>');
			}
			
			$('#minha-janela').modal('hide');
			
			return false;
		});
	}
}