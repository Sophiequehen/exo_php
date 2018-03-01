<?php 
session_start();
$page = 'evenements';
include "head.php";
include "config.php";
?>

<body>
	<h1>ÉVÈNEMENTS</h1>

	<div class="menu">
		<?php include "menu.php" ?>
	</div>

	<section id="section_evenements">
		<?php 

		$request = $connection->query("SELECT * FROM events");

		while ($row = $request->fetch_assoc())//fetch_assoc met les éléments dans un array
		{	
			echo '<div class="articles">';
			echo '<div id="image"><img class="figure-img img-fluid rounded" src="'.$row["image"].'"></div>';
			echo '<div id="legende"><h2>'.$row["titre"].'</h2>';//je récupère dans l'array ce qui m'intéresse
			echo '<p>'.$row["intro"].'</p>';
			echo '<p>'.$row["debut"].'</p>';
			echo '<p>'.$row["fin"].'</p>';
			echo '<p>'.$row["lieu"].'</p>';
			echo '<p>'.$row["date"].'</p></div>';
			echo '</div>';
		}
		?>
	</section>

	<?php
	include "foot.php";
	?>	
</body>
</html>