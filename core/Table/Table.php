<?php 

namespace core\Table;

use core\Database\Database;


class Table{


	protected $table;
	
	protected $db;


	public function __construct(Database $db){

		$this->db = $db;

		if(is_null($this->table)){

			$parts = explode('\\', get_class($this));

			$class_name = end($parts);

			$this->table = strtolower(str_replace('Table','', $class_name));
		}
	}


	public function all(){

		return $this->query('select * from ' . $this->table);
	}

	
	public function find($id){ 

		return $this->query(" select *
		
			from {$this->table}

			where id = ?

			",[$id], true);
	}


	public function update($id,$fields){ 

		$sql_parts = [];

		$attributes = [];

		foreach ($fields as $key => $v) {

			$sql_parts[] = "$key = ?";

			$attributes[] = $v;
		}

		$attributes[] = $id;

		$sql_part = implode(',', $sql_parts);
		
		return $this->query("update {$this->table} set $sql_part where id = ?",$attributes, true);
	}


	public function insert($fields){ 

		$sql_parts = [];

		$attributes = [];

		foreach ($fields as $key => $v) {

			$sql_parts[] = "$key = ?";

			$attributes[] = $v;
		}

		$sql_part = implode(',', $sql_parts);
		
		return $this->query("insert into {$this->table} set $sql_part",$attributes, true);
	}


	public function delete($id){ 
		
		return $this->query("delete from {$this->table} where id=?",[$id], true);
	}


	public function extract($key, $value){

		$records = $this->all();

		$return = [];

		foreach ($records as $v) {

			$return[$v->$key] = $v->$value;
		}

		return $return;
	}



	public function query($statement, $attribues = null, $one = false){ 

		if($attribues){
			
			return $this->db->prepare(

				$statement,

				$attribues, 

				str_replace('Table', 'Entity', get_class($this)),

				$one

			); 

		}else {

			return $this->db->query(

				$statement, 

				str_replace('Table', 'Entity', get_class($this)),

				$one

			);
		}
	}
}