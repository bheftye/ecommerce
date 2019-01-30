<?php
	/**
	 * 
	 */
	class Genre
	{
		public $id;
		public $name;

		public function __construct($attributes) {
		    $this->id = $attributes['id'];
		    $this->name = $attributes['name'];
		}

		public static function findGenre($id){
			$dbConnection = new DataBaseConnection();
			$query = "SELECT * FROM genres WHERE id = ".$id;
			$result = $dbConnection->executeQuery($query);
			$row = $result->fetch_assoc();
			return new Genre($row);
		}

	}

?>