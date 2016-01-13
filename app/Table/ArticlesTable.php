<?php

namespace app\Table;

use core\Table\Table;


class ArticlesTable extends Table{

	public function last(){

		return $this->query("

			select articles.id, articles.titre, articles.contenu, categorie.titre as categorie 
		
			from articles 
		
			left join categorie
			
				on id_cat = categorie.id

			");
	}


	public function findWithCategory($id){ 

		return $this->query(" 

			select articles.id, articles.titre, articles.contenu, categorie.titre as categorie 
		
			from articles 
		
			left join categorie
			
				on id_cat = categorie.id

			where articles.id = ?

			",[$id], true);
	}

	
	public function lastByCategorie($categorie_id){

		return $this->query("

			select articles.id, articles.titre, articles.contenu, categorie.titre as categorie 
		
			from articles 
		
			left join categorie
			
				on id_cat = categorie.id

			where articles.id_cat = ?	

			",[$categorie_id]);
}

}