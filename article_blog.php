<?php 
session_start();
$page = 'article_blog';
include "config.php";
include "head.php";
?>

<h1>BLOG</h1>

<div class="menu">
	<?php include "menu.php" ?>
</div>

<section id="article_blog">
<?php
		
	$id = $_GET['id'];
	$request = $connection->query("SELECT * FROM blog WHERE id='$id'");//décroissant

	while ($row = $request->fetch_assoc())//fetch_assoc met les éléments dans un array
		{	
			echo '<div class="articles"><a href="article_blog.php?id='.$row["id"].'">';
			echo '<h2>'.$row["titre"].'</h2>';//je récupère dans l'array ce qui m'intéresse
			echo '<img src="'.$row["image"].'">';
			echo '<p>'.$row["intro"].'</p>';
			echo '<p>'.$row["texte"].'</p>';
			echo '<p>'.$row["date"].'</p>';
			echo '</a></div>';
		}

?>
</section>
<body>
</body>