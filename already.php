<?php 
session_start();
$page = 'connexion_inscription';
include "config.php";
include "head.php";
?>

<body>
	<div class="menu">
		<?php include "menu.php" ?>
	</div>
	
	<h1>CONNEXION</h1>

	<section id="section_already">
	<p>Déjà connecté(e) patate !</p>
	</section>
	<?php
	include "foot.php";
	?>
</body>
</html>