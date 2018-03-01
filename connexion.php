<?php 
session_start();
$page = 'connexion_inscription';
include "config.php";
include "head.php";
 ?>

<body>
	<h1>CONNEXION</h1>

	<div class="menu">
	<?php include "menu.php" ?>
	</div>
	
	<section id="section_connexion">
		<?php 

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
<?php
include "foot.php";
?>
</body>
</html>