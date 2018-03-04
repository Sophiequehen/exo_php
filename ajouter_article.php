<?php 
session_start();
$page = 'ajouter_article';
include "config.php";
include "head.php";
?>

<body>
	<h1>AJOUTER UN ARTICLE</h1>

	<div class="menu">
		<?php include "menu.php" ?>
	</div>

	<section id="section_ajouter">
		<?php 

		if($_POST){//pour éviter d'envoyer un formulaire dès qu'on arrive sur la page

		//variables propres à la base de données evenements
		$titre = addslashes($_POST['titre']);
		$image = addslashes($_POST['image']);
		$intro = addslashes($_POST['intro']);
		$texte = addslashes($_POST['texte']);
		$date = addslashes($_POST['date']);
		$auteur = addslashes($_SESSION['user']);	

		$requete = "INSERT INTO blog VALUES(NULL, '$titre', '$image', '$intro', '$texte', '$date', '$auteur')";//NULL est pour l'id qui s'incrémente seule
		$resultat = mysqli_query($connection, $requete) or die('ERREUR SQL : '. $requete . mysqli_error($connection));
		header('Location:blog.php');
	}
	?>

	<form action="" method="post">
		<input type="text" name="titre" placeholder="Titre" required="text">
		<input type="text" name="image" placeholder="Lien de l'image" required="text">
		<input type="text" name="intro" placeholder="Introduction" required="text">
		<textarea type="text" name="texte" placeholder="Contenu de l'article" required="text"></textarea>
		<input type="date" name="date" placeholder="Date" required="text">
		<input type="submit" name="creer" value="Créer mon article">
	</form>
</section>

<?php
include "foot.php";
?>
</body>
</html>