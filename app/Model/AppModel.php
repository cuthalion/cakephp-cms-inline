<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
 
App::import('Utility', 'Folder');
App::import('File', 'Folder');
 
class AppModel extends Model {
	
	public function install(){
		if(!file_exists(TMP.'installed.txt')){
			
			$db = ConnectionManager::getDataSource('default');
			
			if($db->config['datasource']=='Database/Mysql') $nome='mysql';
			if($db->config['datasource']=='Database/Postgres') $nome='postgresql';
			$querys = file_get_contents(APP.'Config'.DS.'Schema'.DS.'install.'.$nome.'.sql');
			$querys = explode(';', $querys);
				
			foreach ($querys as $query) {
				if (trim($query) != '') {
					$db->query($query);
				}
			}
			
			$arquivo = new File(TMP.'installed.txt',false,0644);
			$arquivo->write('Instalado com sucesso!');
			$arquivo->close();
		}
	}
	
	function afterFind($results, $primary = false) {
		foreach ($results as $key => $val) {
			if (isset($val[$this->name]['created'])) {
				$results[$key][$this->name]['created'] = $this->datetimeFormatAfterFind($val[$this->name]['created']);				
			}
			if (isset($val[$this->name]['modified'])) {
				$results[$key][$this->name]['modified'] = $this->datetimeFormatAfterFind($val[$this->name]['modified']);
			}
		}
		return $results;
	}
	
	function datetimeFormatAfterFind($datetimeString) {
		$array=explode(' ',$datetimeString);
		$data=array_shift($array);
		$hora=array_pop($array);
		$data=explode('-',$data);

		switch ($data[1]){
			case '01':$mes = "Janeiro"; break;
			case '02':$mes = "Fevereiro"; break;
			case '03':$mes = "Março"; break;
			case '04':$mes = "Abril"; break;
			case '05':$mes = "Maio"; break;
			case '06':$mes = "Junho"; break;
			case '07':$mes = "Julho"; break;
			case '08':$mes = "Agosto"; break;
			case '09':$mes = "Setembro"; break;
			case '10':$mes = "Outubro"; break;
			case '11':$mes = "Novembro"; break;
			case '12':$mes = "Dezembro"; break;
		};
		
		$dia = date('w', strtotime($datetimeString));
		
		switch ($dia){
			case 0:$semana = 'Domingo'; break;
			case 1:$semana = 'Segunda-feira'; break;
			case 2:$semana = 'Terça-feira'; break;
			case 3:$semana = 'Quarta-feira'; break;
			case 4:$semana = 'Quinta-feira'; break;
			case 5:$semana = 'Sexta-feira'; break;
			case 6:$semana = 'Sábado'; break;
		};
		
		$res = $semana.', '.$data[2].' de '.$mes.' de '.$data[0].',';
		$hora=explode(':',$hora);
		$res .= ' '.$hora[0].':'.$hora[1];
		return $res;
	}
	
}
