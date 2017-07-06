<?php namespace App\Models;

use \App\Model;

class Events extends Model
{
	protected $table = "events";

	public function allEvents()
	{

		$query  = "SELECT * FROM {$this->table}";

		$result = $this->db->query($query);
		$fetch = $result->fetchAll(\PDO::FETCH_OBJ);
		
		return $fetch;

	} // public function checkUser() { ... }

	public function getEvent( $id )
	{

		$query  = "SELECT * FROM {$this->table} WHERE id = {$id}";

		$result = $this->db->query($query);
		$fetch = $result->fetch(\PDO::FETCH_OBJ);
		
		return $fetch;

	} // public function getEvent( $id ){ ... }

	public function update( $data )
	{

		$image = null;

		if($_FILES['imagem']['size'] != 0){
			$query = "SELECT image FROM {$this->table} WHERE id = ".$id;
			$result = $this->db->query($query);

			$image = $result->fetch(\PDO::FETCH_OBJ);

			$this->deleteImage($image);

			$image = $this->setImage($_FILES);
		}

		$query  = "UPDATE {$this->table} SET ";

		$query .= "title=" . $this->db->quote($data['title']) . ",";
		$query .= "description=" . $this->db->quote($data['description']) . ",";
		$query .= "address=" . $this->db->quote($data['address']) . ",";
		$query .= "starts_at=" . $this->formatDate($data['starts_at']). ",";
		$query .= "ends_at=" . $this->formatDate($data['ends_at']) . ",";
		$query .= "status=" . $this->db->quote($data['status']) . ",";

		if(!is_null($image)){
			$query .= "image=".$image.",";
		}

		$query .= "updated_at=" . $this->db->quote( date('Y-m-d H:i:s') ) . "";

		$query .= " WHERE id = " . $data['id'];
	
		$result = $this->db->query($query);

		return $result;

	} // public function update( $data ){ ... }

	public function insert( $data )
	{

		$image = $this->setImage($_FILES);

		$query  = "INSERT INTO {$this->table} VALUES(";

		$query .= "null,";
		$query .= $this->db->quote($_COOKIE['userid']).",";
		$query .= $this->db->quote($data['title']).",";
		$query .= $this->db->quote($data['descripion']).",";
		$query .= $this->db->quote($data['address']).",";
		$query .= $this->formatDate($data['starts_at']).",";
		$query .= $this->formatDate($data['ends_at']).",";
		$query .= "null,";
		$query .= "null,";
		$query .= $this->db->quote($data['status']).",";
		$query .= $image;

		$query .= ")"; 

		$result = $this->db->query($query);

		return $result;

	} // public function insert( $data ) { ... }

	public function delete( $id )
	{

		$query = "SELECT image FROM {$this->table} WHERE id = ".$id;
		$result = $this->db->query($query);

		$image = $result->fetch(\PDO::FETCH_OBJ);

		$this->deleteImage($image);

		$query = "DELETE FROM {$this->table} WHERE id = ".$id;
		$result = $this->db->query($query);

		return $result;
	}
	
	private function formatDate( $date ){

		if($date == '' || $date == '0000-00-00 00:00:00')
			return 'null';

		$date = date('Y-m-d H:m:i', strtotime($date));
		return $this->db->quote($date);
	} // private function formatDate( $date ){ ... }

	private function setImage( $file ){
		$uploaddir = $_SERVER['DOCUMENT_ROOT'] . "/assets/images/uploads/";
		
		$uniqfilename = time().uniqid(rand());
		$uploadfile = $uploaddir.$uniqfilename."-".basename($file['imagem']['name']);
		
		if (move_uploaded_file($file['imagem']['tmp_name'], $uploadfile)) {
			return $this->db->quote($uniqfilename."-".basename($file['imagem']['name']));
		} else {
			return 'null';
		}

	}

	private function deleteImage( $filename ){
		unlink($_SERVER['DOCUMENT_ROOT'] . "/assets/images/uploads/".$filename->image);
	}

}