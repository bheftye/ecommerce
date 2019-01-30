<?php
	include('./db_connection.php');

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

				break;
			default:
				redirect('./../index.php')
				break;
		}
	}



	function redirect($url, $statusCode = 303)
	{
	   header('Location: ' . $url, true, $statusCode);
	   die();
	}

	function storeMovie($movieInfo)
	{

	}
?>