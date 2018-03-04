<?php 
session_start();
$page = 'ajouter_article';
include "config.php";
include "head.php";
?>

<body>
	<h1>MODIFIER VOTRE ARTICLE</h1>

	<div class="menu">
		<?php include "menu.php" ?>
	</div>

	<section id="section_ajouter">
		<?php 
		$id = $_GET['id'];
		$req = $connection->query("SELECT * FROM blog WHERE id='$id'");

		if($req->num_rows > 0){ 
			while ($row = $req->fetch_assoc()){
				?> 
				<form action="" method="post">
					<input type="text" name="titre" value="<?php echo $row["titre"]; ?>" required="text">
					<input type="text" name="image" value="<?php echo $row["image"]; ?>" required="text">
					<input type="text" name="intro" value="<?php echo $row["intro"]; ?>" required="text">
					<input type="text" name="texte" value="<?php echo $row["texte"]; ?>" required="text"></input>
					<input type="date" name="date" value="<?php echo $row["date"]; ?>" required="text">
					<input type="submit" name="modifier" value="Modifier mon article">
				</form>
				<?php
			}
		}

		if ($_POST) {
			$id = $_GET['id'];
			$titre = addslashes($_POST['titre']);
			$image = addslashes($_POST['image']);
			$intro = addslashes($_POST['intro']);
			$texte = addslashes($_POST['texte']);
			$date = addslashes($_POST['date']);
			$auteur = addslashes($_SESSION['user']);

			$requete = "UPDATE blog SET titre='$titre', image='$image', intro='$intro', texte='$texte', date='$date', auteur='$auteur' WHERE id='$id'";
			$resultat = mysqli_query($connection, $requete) or die('ERREUR SQL : '. $requete . mysqli_error($connection));
			?>

			<div class="alert alert-success" role="alert">
				Article ajouté à la page Blog. 
			</div>

			<?php
			header('Location:blog.php');
		}

		?>

	</section>

	<?php
	include "foot.php";
	?>
</body>
</html>