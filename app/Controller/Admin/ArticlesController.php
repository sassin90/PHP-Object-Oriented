<?php

namespace app\Controller\Admin;

use core\HTML\BootstrapForm;

use core\Auth\DBAuth;



class ArticlesController extends AppController{



	public function __construct(){

		parent::__construct();

		$this->loadModel('Articles');

		$this->loadModel('Categorie');
	}


	public function index(){

		$posts = $this->Articles->all();

		$this->render('admin.articles.index', compact('posts'));

	}


	public function add(){

		if(!empty($_POST)){

			$res = $this->Articles->insert([

				'titre'=> $_POST['titre'],

				'contenu'=> $_POST['contenu'],

				'id_cat'=> $_POST['id_cat']

			]);

				return $this->index();
		}

		$categories = $this->Categorie->extract('id', 'titre');

		$form = new BootstrapForm($_POST);

		$this->render('admin.articles.edit',compact('categories', 'form'));
	}

	public function edit(){

		if(!empty($_POST)){

			$res = $this->Articles->update($_GET['id'],[

				'titre'=> $_POST['titre'],

				'contenu'=> $_POST['contenu'],

				'id_cat'=> $_POST['id_cat']

			]);

				return $this->index();
		}

		$post = $this->Articles->find($_GET['id']);

		$categories = $this->Categorie->extract('id', 'titre');

		$form = new BootstrapForm($post);

		$this->render('admin.articles.edit',compact('post','categories','form','success'));
	}

	public function delete(){

		if(!empty($_POST)){

		$res = $this->Articles->delete($_POST['id']);

			return $this->index();
		}
	}
}