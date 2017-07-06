<?php namespace App\Models;

use CMS\Model\Model;

class Post extends Model
{
	protected $table = "posts";

	public $fields = "*";

	public function getAll(){

		$queryToGetAllPosts = "SELECT * FROM ".$this->table;
		$result = $this->db->query($queryToGetAllPosts);
		$allPosts = $result->fetch(\PDO::FETCH_OBJ);

		return $allPosts;

	}

	public function getInfos( $params = null ){
		
		$postInfos = null;

		$queryToGetPostInfos  = "SELECT * ";
		$queryToGetPostInfos .= "FROM $this->table ";
		$queryToGetPostInfos .= $this->getWhereParameters($params);
		
		$result = $this->db->query($queryToGetPostInfos);
	
		if($result)
			$postInfos = $result->fetch(\PDO::FETCH_OBJ);

		return $postInfos;	
	}

	private function getWhereParameters( $params = null ){

		if( is_null($params) ){
			return "";
		}else{

			if( is_numeric($params) )
				$whereParameters = "WHERE id = ".$params;
			else
				$whereParameters = "WHERE slug = '".$params."'";

		}

		return $whereParameters;

	}

}