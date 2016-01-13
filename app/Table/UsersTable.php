<?php

namespace app\Table;

use core\Table\Table;

class UsersTable extends Table{

	public function lastUsers(){

		return $this->query("

			select users.id, users.username, users.password, villes.name as villes 
		
			from users 
		
			left join villes
			
				on id_ville = villes.id

			");
	}

}