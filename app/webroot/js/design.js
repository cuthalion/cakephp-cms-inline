/*********** LAYOUT *************/
$(function(){
	if($('.ttip').length>0){
		$('.ttip').tooltip();
	}
	if($('.carousel').length>0){
		$('.carousel').carousel();
	}
	if($('.galeria').length>0){
		$(".galeria").fancybox();
	}
})