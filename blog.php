<?php 
session_start();
$page = 'blog';
include "config.php";
include "head.php";
?>

<body>
	<h1>BLOG</h1>

	<div class="menu">
		<?php include "menu.php" ?>
	</div>

	<section id="section_blog">
		<?php 

	$request = $connection->query("SELECT * FROM blog ORDER BY date DESC");//décroissant

	if(!empty($_SESSION['user'])){
		echo '<div class="ajouter_article"><a href="ajouter_article.php"><h2 class="ajout">+ Ajouter un article</h2></a></div>';
	}

		while ($row = $request->fetch_assoc())//fetch_assoc met les éléments dans un array
		{	
			if(!empty($_SESSION['user'])){
				echo '<div class="articles"><a href="article_blog.php?id='.$row["id"].'">';
				echo '<h2>'.strtoupper($row["titre"]).'</h2>';
				if ($_SESSION['user'] === $row["auteur"]) {
					echo '<a class="modif" href="modifier_article.php?id='.$row["id"].'">Modifier</a>';
					echo '<img src="'.$row["image"].'">';
					echo '<p>'.$row["intro"].'</p>';
					echo '<p class="auteur bold">Par '.$row["auteur"].'</p>';
					echo '<p class="publication">Publié le '.$row["date"].'</p>';
					echo '</a></div>';
				}else{
					echo '<a style="visibility:hidden;" href="">Modifier</a>';
					echo '<img class="deco" src="'.$row["image"].'">';
					echo '<p>'.$row["intro"].'</p>';
					echo '<p class="auteur bold">Par '.$row["auteur"].'</p>';
					echo '<p class="publication">Publié le '.$row["date"].'</p>';
					echo '</a></div>';
				}
			}else{
				echo '<div class="articles"><a href="article_blog.php?id='.$row["id"].'">';
				echo '<h2>'.strtoupper($row["titre"]).'</h2>';
				echo '<img class="deco" src="'.$row["image"].'">';
				echo '<p>'.$row["intro"].'</p>';
				echo '<p class="auteur bold">Par '.$row["auteur"].'</p>';
				echo '<p class="publication">Publié le '.$row["date"].'</p>';
				echo '</a></div>';
			}
		}


		?>
	</section>
	<?php
	include "foot.php";
	?>
</body>
</html>