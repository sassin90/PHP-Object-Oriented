<?php

namespace app\Controller;


use core\HTML\BootstrapForm;

use core\Auth\DBAuth;

use app;


class UsersController extends AppController{

	public function __construct(){

		parent::__construct();

		$this->loadModel('Users');

		$this->loadModel('Villes');
	}


	public function index(){

		$users = $this->Users->lastUsers();

		$this->render('users.index',compact('users'));
	}

	public function login(){

		$errors = false; 

		if(!empty($_POST)){

			$auth = new DBAuth(App::getInstance()->getDb());

			if($auth->login($_POST['username'], $_POST['password'])){

				header('Location: index.php?page=admin.articles.index');

			} else {var_dump($this->Users);

				$errors = true; var_dump($this->Users);
			}
		}

		$form = new BootstrapForm($_POST);

		$this->render('users.login', compact('form','errors'));				
	}

	public function signup(){ 

		if(!empty($_POST)){

			$res = $this->Users->insert([

				'username'=> $_POST['username'],

				'password'=> $_POST['password'],

				'id_ville'=> $_POST['id_ville']

			]);

				header('Location: index.php?page=users.index');
			}

		$villes = $this->Villes->extract('id', 'name');
		
		$form = new BootstrapForm($_POST);

		$this->render('users.signup',compact('villes','form'));
	}

}