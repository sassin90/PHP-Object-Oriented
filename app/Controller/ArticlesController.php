<?php

namespace app\Controller;

use core\Controller\Controller;



class ArticlesController extends AppController{


	public function __construct(){

		parent::__construct();

		$this->loadModel('Articles');

		$this->loadModel('Categorie');
	}


	public function index(){

		$posts =  $this->Articles->last(); 

		$categories = $this->Categorie->all();

		$this->render('articles.index', compact('posts','categories'));

	}

	public function categorie(){


		$categorie = $this->Categorie->find($_GET['id']);

		if($categorie===false){

			$this->notFound();
		}

		$articles = $this->Articles->lastByCategorie($_GET['id']);

		$categories = $this->Categorie->all();

		$this->render('articles.categorie', compact('articles','categories','categorie'));
		
	}

	public function show(){

		$post = $this->Articles->findWithCategory($_GET['id']);

		$this->render('articles.show', compact('post'));

	}

}