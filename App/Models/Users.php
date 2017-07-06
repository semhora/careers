<?php namespace App\Models;

use \App\Model;

class Users extends Model
{
	protected $table = "users";

	public function checkUser($login, $password)
	{

		$query  = "SELECT id FROM {$this->table} WHERE ";
		$query .= "login = ".$this->db->quote($login); 
		$query .= " AND password = ".$this->db->quote(hash('whirlpool', $password));
		$query .= " AND status != 0";

		$result = $this->db->query($query);
		$fetch = $result->fetch(\PDO::FETCH_OBJ);
		
		return $fetch;

	} // public function checkUser() { ... }

	public function allUsers()
	{

		$query = "SELECT * FROM {$this->table}";

		$result = $this->db->query($query);
		$fetch = $result->fetchAll(\PDO::FETCH_OBJ);
		
		return $fetch;

	} // public function allUsers() { ... }

	public function getUser( $id )
	{

		$query  = "SELECT * FROM {$this->table} WHERE id = {$id}";

		$result = $this->db->query($query);
		$fetch = $result->fetch(\PDO::FETCH_OBJ);
		
		return $fetch;

	} // public function getEvent( $id ){ ... }


	public function update( $data )
	{

		$query  = "UPDATE {$this->table} SET ";

		$query .= "name=" . $this->db->quote($data['name']) . ",";
		$query .= "email=" . $this->db->quote($data['email']) . ",";
		$query .= "login=" . $this->db->quote($data['login']) . ",";

		if($data['password'] != ''){
			$query .= "password=" . $this->db->quote(hash('whirlpool', $data['login'])) . ",";
		}

		$query .= "updated_at='" . date('Y-m-d H:i:s') . "',";
		$query .= "status=" . $this->db->quote($data['status']) . "";
		
		$query .= " WHERE id = " . $data['id'];
		
		$result = $this->db->query($query);

		return $result;

	} // public function update( $data ){ ... }

	public function insert( $data )
	{
		$query  = "INSERT INTO {$this->table} VALUES(";

		$query .= "null,";
		$query .= $this->db->quote($data['name']).",";
		$query .= $this->db->quote($data['login']).",";
		$query .= $this->db->quote($data['email']).",";
		$query .= $this->db->quote(hash('whirlpool', $data['email'])).",";
		$query .= "null,";
		$query .= "null,";
		$query .= $this->db->quote($data['status']);

		$query .= ")"; 

		$result = $this->db->query($query);

		return $result;

	} // public function insert( $data ) { ... }


}