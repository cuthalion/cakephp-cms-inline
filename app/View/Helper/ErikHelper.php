<?php
App::uses('HtmlHelper', 'View/Helper');
class ErikHelper extends AppHelper {
    function URLlimpa($url) {
        $string = str_replace(" ","-",$url); // transforma espaços em traços
		$string = preg_replace("/(\-)+/","-",$string); // retira traços dulicados ou mais
		
		//substitui letras acentuadas por "normais"
		$a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøüùúûýýþÿŔŕ';
		$b = 'AAAAAAACEEEEIIIIDNOOOOOOUUUUYbsaaaaaaaceeeeiiiidnoooooouuuuyybyRr';
		$string = utf8_decode($string);
		$string = strtr($string, utf8_decode($a), $b);
		
		$string = strtolower($string); // passa tudo para minusculo
		
		$string = preg_replace( "/[^0-9a-zA-Z\-]/",'',$string); // retira os simbolos
		
		return utf8_encode($string); //retorna a string codificada já em UTF8
    }
	
	function data($data,$formato='data'){
		$array=explode(' ',$data);
		$data=array_shift($array);
		$hora=array_pop($array);
		$data=explode('-',$data);
		$res=$data[2].'/'.$data[1].'/'.$data[0];
		if($formato=='completo'):
			$mes 	= array('01' => "Janeiro",  '02' => "Fevereiro",  '03' => "Março", '04' => "Abril", '05' => "Maio", '06' => "Junho", '07' => "Julho", '08' => "Agosto", '09' => "Setembro", '10' => "Outubro",  '11' => "Novembro", '12' => "Dezembro");
			$res = $data[2].' de '.$mes[$data[1]].' de '.$data[0].',';
		endif;
		$hora=explode(':',$hora);
		$res .= ' '.$hora[0].':'.$hora[1];
		
		return $res;
	}
	
	function menu($array,$pai=null,$options=array()){
		
		$class = '';
		
		if(isset($options['class'])) $class = ' '.$options['class'];
		
		$menu=($pai == null)?'<ul class="nav'.$class.'">':'<ul class="dropdown-menu">';
			foreach($array as $key=>$value):
				$menu.=$this->geraMenuCampo($value,$array,$pai);
			endforeach;
		$menu .= '</ul>';
		return $menu;
	}
	function geraMenuCampo($value,$array,$pai){
		$value = $value['Pagina'];
		$continua=false;

		if(in_array($value['slug'],array('home','Home'))){
<<<<<<< HEAD
			$slug= $this->webroot;
=======
			$slug= HtmlHelper::url('/');
>>>>>>> f4e6305d6ec87630dc98d7873ef0e43ad50f9266
		}else{
			$slug=$value['slug'];
		}
		
		$menu =($pai == null)?'<li>':'<li class="dropdown">';
		$menu .=($pai == null)?'<a href="'.$slug.'">'.$value['titulo'].'</a>':'<a href="'.$slug.'" class="dropdown-toggle" data-toggle="dropdown">'.$value['titulo'].' <b class="caret"></b></a>';
		foreach($array as $test):
			if($test['Pagina']['parent_id']==$value['id']){
				$continua=true;
			}
		endforeach;
		if($continua) $menu .=$this->menu($array,$value['id']);
		$menu .='
		</li>
		';
		return $menu;

	}
}