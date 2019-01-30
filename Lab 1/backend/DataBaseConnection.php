<?php 

class DataBaseConnection {	
	private $config = [
		'database' => 'movie_time',
		'user' => 'root',
		'password' => 'root'
	];

	_construct(){
		 
	}

	public function executeQuery($query){

	}

	public function getConnection(){
		$connection = new mysqli(
			'localhost',
			$this->config['database'],
			$this->config['user'],
			$this->config['password']
		);

		if () {

		}

		return $connection;
	}

}

?>