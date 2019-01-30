<?php
	include('./../backend/DataBaseConnection.php');

	$dbConnection = new DataBaseConnection();
	
	//sql for movies
	$sql1 = "SELECT * FROM movies";
	//sql for genres 
	$sql2 = "SELECT * FROM genres";

	//load data
	$movies = $dbConnection->executeQuery($sql1);
	$genres = $dbConnection->executeQuery($sql2);
	

?>