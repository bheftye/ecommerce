<?php 

class DataBaseConnection
{	
	private $config = [
		'host' => 'localhost',
		'database' => 'movie_time',
		'user' => 'root',
		'password' => 'root'
	];

	public function executeQuery($query){
		$connection = $this->getConnection();
		if (!empty($connection)){
			return $connection->query($query);
		}

		return null;
	}

	public function getConnection(){
		$connection = new mysqli(
			$this->config['host'],
			$this->config['user'],
			$this->config['password'],
			$this->config['database'],
			3306
		);

		if ($connection->connect_error) {
		    echo "Connection failed: " . $connection->connect_error;
		    return null;
		} 

		return $connection;
	}

}

?>