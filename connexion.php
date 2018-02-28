<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>CONNEXION</title>
</head>
<body>
	<h1>CONNEXION</h1>

	<?php include "menu.php" ?>
	
	<section id="section_connexion">
		<?php 
			//variables pour la connection à la base de données
		$servername = "localhost";
		$username = "root";
		$password = "simplon";
		$dbname = "exo_php";

 		// Créer la connection
		$connection = new mysqli($servername, $username, $password, $dbname); 

		if($_POST){//pour éviter d'envoyer un formulaire dès qu'on arrive sur la page

		//variables propres à la base de données evenements
		$user = $_POST['user'];
		$mdp = $_POST['mdp'];

		//requète pour voir si le username existe déjà
		$requete = "SELECT * FROM login WHERE user='$user'";
		$resultat = mysqli_query($connection, $requete) or die('ERREUR SQL : '. $requete . mysqli_error($connection));
		//transformer le résultat de la requète en tableau
		$row = mysqli_fetch_array($resultat);

		//si il existe dans la base de données 
		if($resultat->num_rows === 1){
			if (password_verify($mdp, $row['mdp'])) {
			header('Location: evenements.php');
			$_SESSION['user']= $user;	
				
			}else{
				echo 'Mot de passe incorrect';
			}
		}else{
			echo "Cet username n'existe pas";
		}
	}
	?>
	<form action="" method="post">
		<input type="text" name="user" placeholder="Username">
		<input type="password" name="mdp" placeholder="Mot de passe">
		<input type="submit" name="save" value="Save">
		<a href="inscription.php">Pas encore inscrit ?</a>
	</form>
</section>

</body>
</html>