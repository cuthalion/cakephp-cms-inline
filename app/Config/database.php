<?php
/**
 * This is core configuration file.
 *
 * Use it to configure core behaviour of Cake.
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
<<<<<<< HEAD
 */
/**
 * In this file you set up your database connection details.
 *
 * @package       cake.config
 */
/**
=======
 *
>>>>>>> f4e6305d6ec87630dc98d7873ef0e43ad50f9266
 * Database configuration class.
 * You can specify multiple configurations for production, development and testing.
 *
 * datasource => The name of a supported datasource; valid options are as follows:
 *		Database/Mysql 		- MySQL 4 & 5,
 *		Database/Sqlite		- SQLite (PHP5 only),
 *		Database/Postgres	- PostgreSQL 7 and higher,
 *		Database/Sqlserver	- Microsoft SQL Server 2005 and higher
 *
 * You can add custom database datasources (or override existing datasources) by adding the
<<<<<<< HEAD
 * appropriate file to app/Model/Datasource/Database.  Datasources should be named 'MyDatasource.php',
=======
 * appropriate file to app/Model/Datasource/Database. Datasources should be named 'MyDatasource.php',
>>>>>>> f4e6305d6ec87630dc98d7873ef0e43ad50f9266
 *
 *
 * persistent => true / false
 * Determines whether or not the database should use a persistent connection
 *
 * host =>
 * the host you connect to the database. To add a socket or port number, use 'port' => #
 *
 * prefix =>
<<<<<<< HEAD
 * Uses the given prefix for all the tables in this database.  This setting can be overridden
 * on a per-table basis with the Model::$tablePrefix property.
 *
 * schema =>
 * For Postgres specifies which schema you would like to use the tables in. Postgres defaults to 'public'.
=======
 * Uses the given prefix for all the tables in this database. This setting can be overridden
 * on a per-table basis with the Model::$tablePrefix property.
 *
 * schema =>
 * For Postgres/Sqlserver specifies which schema you would like to use the tables in. Postgres defaults to 'public'. For Sqlserver, it defaults to empty and use
 * the connected user's default schema (typically 'dbo').
>>>>>>> f4e6305d6ec87630dc98d7873ef0e43ad50f9266
 *
 * encoding =>
 * For MySQL, Postgres specifies the character encoding to use when connecting to the
 * database. Uses database default not specified.
 *
 * unix_socket =>
 * For MySQL to connect via socket specify the `unix_socket` parameter instead of `host` and `port`
 */
class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => '',
<<<<<<< HEAD
		'database' => 'cms_inline',
=======
		'database' => 'cms_inline2',
>>>>>>> f4e6305d6ec87630dc98d7873ef0e43ad50f9266
		'prefix' => '',
		//'encoding' => 'utf8',
	);

<<<<<<< HEAD
	public $postgres = array(
		'datasource' => 'Database/Postgres',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'postgres',
		'password' => '',
		'database' => 'cms_inline',
		'prefix' => '',
		//'encoding' => 'utf8',
	);
	
=======
	public $test = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'user',
		'password' => 'password',
		'database' => 'test_database_name',
		'prefix' => '',
		//'encoding' => 'utf8',
	);
>>>>>>> f4e6305d6ec87630dc98d7873ef0e43ad50f9266
}
