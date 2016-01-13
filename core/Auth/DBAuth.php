<?php

namespace core\Auth;

use core\Database\Database;


class DBAuth {


	private $db;


	public function __construct(Database $db){

		$this->db = $db;
	}


	public function getUserID(){

		if($this->logged()){

			return $_SESSION['auth'];
		}

		return false;
	}


	/**
	 * @param $username
	 * @param $password
	 * @return boolean
	 */

	public function login($username, $password){

		$user = $this->db->prepare('select * from users where username = ?',[$username], null, true);

		if($user){

			if($user->password === $password){// $user->password === sha1($password); Method de cryptage

				$_SESSION['auth'] = $user->id;

				return true;
			} 
		} 

		return false;
	}


	public function logged(){

		return isset($_SESSION['auth']);
	}
}