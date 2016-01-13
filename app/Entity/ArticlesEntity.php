<?php

namespace app\Entity;

use core\Entity\Entity;

class ArticlesEntity extends Entity{


	public function getURL(){

		return 'index.php?page=articles.show&id='.$this->id;
	}


	public function getExtrait(){

		$html = '<p>'. substr($this->contenu,0,100 ) .' ...</p>';
		
		$html .= '<p><a href="'. $this->getUrl() .'"> Voir la suit </a></p>';

		return $html;
	}
	
}