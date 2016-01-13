<?php

namespace app\Entity;

use core\Entity\Entity;

class CategorieEntity extends Entity{


	public function getURL(){

		return 'index.php?page=articles.categorie&id='.$this->id;
	}
	
}