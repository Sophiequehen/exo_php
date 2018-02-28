<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>LOGIN</title>
</head>
<body>
	<h1>INSCRIPTION</h1>

	<?php include "menu.php"; ?>

	<section id="section_login">
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
		$mdp1 = $_POST['mdp1'];
		$mdp2 = $_POST['mdp2'];

		//requète pour voir si le username existe déjà
		$requete = "SELECT user FROM login WHERE user='$user'";
		$resultat = mysqli_query($connection, $requete) or die('ERREUR SQL : '. $requete . mysqli_error($connection));

		//si il n'existe pas dans la base de données (donc qu'il est égal à 0)
		if($resultat->num_rows === 0){
			if ($mdp1 === $mdp2){
				//pour cacher le mot de passe dans la base de données
				$mdp = password_hash($_POST['mdp1'], PASSWORD_DEFAULT);
				//ma requète, elle efface la précédente
				$requete = "INSERT INTO login VALUES(NULL, '$user', '$mdp')";
				$resultat = mysqli_query($connection, $requete) or die('ERREUR SQL : '. $requete . mysqli_error($connection));
			}else{
				echo 'Erreur de mot de passe';//si les mdp ne sont pas égaux
			}
		}else{
			echo 'Cet username existe déjà';//si l'username existe déjà
		}
	}
	?>

	<form action="" method="post">
		<input type="text" name="user" placeholder="Username" required="text">
		<input type="password" name="mdp1" placeholder="Mot de passe" required="text">
		<input type="password" name="mdp2" placeholder="Mot de passe" required="text">
		<input type="submit" name="save" value="Save">
	</form>

</section>

</body>
</html>