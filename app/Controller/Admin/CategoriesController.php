<?php

namespace app\Controller\Admin;

use core\HTML\BootstrapForm;

use core\Auth\DBAuth;



class CategoriesController extends AppController{



	public function __construct(){

		parent::__construct();

		$this->loadModel('Categorie');
	}


	public function index(){

		$items = $this->Categorie->all();

		$this->render('admin.categories.index', compact('items'));

	}


	public function add(){

		if(!empty($_POST)){

			$res = $this->Categorie->insert([

				'titre'=> $_POST['titre']
			]);

				return $this->index();
		}

		$form = new BootstrapForm($_POST);

		$this->render('admin.categories.edit',compact('form'));
	}


	public function edit(){

		if(!empty($_POST)){

			$res = $this->Categorie->update($_GET['id'],[

				'titre'=> $_POST['titre']
			]);

				return $this->index();
		}

		$categorie = $this->Categorie->find($_GET['id']);

		$form = new BootstrapForm($categorie);

		$this->render('admin.categories.edit',compact('form'));
	}

	public function delete(){

		if(!empty($_POST)){

		$res = $this->Categorie->delete($_POST['id']);

			return $this->index();
		}
	}
}