<?php

namespace app\Controller\Admin;


use app;

use core\Auth\DBAuth;




class AppController extends \app\Controller\AppController{


	public function __construct(){

		parent::__construct();

		$app = App::getInstance();

		$auth = new DBAuth($app->getDb());

		if(!$auth->logged()){

			$this->forbidden();
		}
	}



}