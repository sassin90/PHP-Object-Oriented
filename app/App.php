<?php

use core\Config;

use core\Database\MySQLDatabase;

class App{


	public $title = 'Mon super site';

	private static $_instance;

	private $db_instance;

	
	public static function getInstance(){

		if(is_null(self::$_instance)){

			self::$_instance = new App();

		}

		return self::$_instance;
	}


	public static function load(){

		session_start();

		require ROOT . '/app/Autoloader.php';

		app\Autoloader::register();

		require ROOT . '/core/Autoloader.php';
		
		core\Autoloader::register();
	}


	public function getTable($name){

		$class_name = '\\app\\Table\\' . ucfirst($name) . 'Table';

		return new $class_name($this->getDb());
	}


	public function getDb(){

		$config = Config::getInstance(ROOT . '/config/config.php');

		if(is_null($this->db_instance)){

			$this->db_instance = new MySQLDatabase($config->get('db_name'),$config->get('db_user'),$config->get('db_pass'),$config->get('db_host'));
		}

		return $this->db_instance;
	}
}