<?php	

//variables pour la connection à la base de données
$servername = "localhost";
$username = "root";
$password = "simplon";
$dbname = "exo_php";

// Créer la connection
$connection = new mysqli($servername, $username, $password, $dbname); 

//Checker la connection
if ($connection->connect_error) 
				{ die("Connection failed: " . $connection->connect_error); }
?>