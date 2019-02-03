<?php
	include('./../backend/DataBaseConnection.php');
	include('./../backend/Movie.php');
	include('./../backend/Genre.php');

	$dbConnection = new DataBaseConnection();
	
	//sql for movies
	$sql1 = "SELECT * FROM `movies`";
	//sql for genres 
	$sql2 = "SELECT * FROM `genres`";
	//load data
	$movieResult = $dbConnection->executeQuery($sql1);
	$genreResult = $dbConnection->executeQuery($sql2);

	$movies = [];
	$genres = [];

	if ($movieResult->num_rows > 0) {
		while ($row = $movieResult->fetch_assoc()) {
			$movies[] = new Movie($row);
		}
	}
	
	if ($genreResult->num_rows > 0){
		while ($row = $genreResult->fetch_assoc()) {
			$genres[] = new Genre($row);	
		}
	}

?>