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
<<<<<<< HEAD
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
=======
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
>>>>>>> f4e6305d6ec87630dc98d7873ef0e43ad50f9266
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
<<<<<<< HEAD
 
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
=======
class AppModel extends Model {
>>>>>>> f4e6305d6ec87630dc98d7873ef0e43ad50f9266
}
