<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>BLOG</title>
</head>
<body>
	<h1>BLOG</h1>

	<?php include "menu.php" ?>

<section id="section_blog">
	<?php 
			//variables pour la connection à la base de données
	$servername = "localhost";
	$username = "root";
	$password = "simplon";
	$dbname = "exo_php";

 			// Créer la connection
	$connection = new mysqli($servername, $username, $password, $dbname);
  			
	$request = $connection->query("SELECT * FROM blog");

		while ($row = $request->fetch_assoc())//fetch_assoc met les éléments dans un array
		{	
			echo '<div class="order"></div>';
			echo '<div class="articles">';
			echo '<h2>'.$row["titre"].'</h2>';//je récupère dans l'array ce qui m'intéresse
			echo '<img src="'.$row["image"].'">';
			echo '<p>'.$row["intro"].'</p>';
			echo '<p>'.$row["texte"].'</p>';
			echo '<p>'.$row["date"].'</p>';
			echo '</div>';
		}
		?>
</section>
	</body>
	</html>