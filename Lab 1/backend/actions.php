<?php
	include('DataBaseConnection.php');

	$action = $_GET['action'];
	if (!empty($action)){
		switch ($action) {
			case 'create':
				$params = [
					'name' => $_POST['name'],
					'year' => $_POST['year'],
					'genre' => $_POST['genre'],
					'rating' => $_POST['rating']
				];

				storeMovie($params);
				redirect('./../frontend/index.php');
				break;
			default:
				redirect('./../frontend/index.php');
				break;
		}
	}



	function redirect($url, $statusCode = 303)
	{
	   header('Location: ' . $url, true, $statusCode);
	   die();
	}

	function storeMovie($params)
	{
		$sql = "INSERT INTO movies (name, year, genre, rating) VALUES ('".$params['name']."', '".$params['year']."', ".$params['genre'].", ".$params['rating']." );";
		$dbConnection = new DataBaseConnection();
		$dbConnection->executeQuery($sql);
	}
?>