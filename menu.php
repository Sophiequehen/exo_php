<ul class="menu">
	<li>
		<?php 
		if(!empty($_SESSION['user'])){
			echo "Bonjour"." ".$_SESSION['user'];
		}
			?>

			
	</li>
	<li><a href="home.php">HOME</a></li>
	<li><a href="apropos.php">À PROPOS</a></li>
	<li><a href="contact.php">CONTACT</a></li>
	<li><a href="connexion.php">ÉVÈNEMENTS</a></li>
	<li><a href="blog.php">BLOG</a></li>
	<li><a href="inscription.php">LOGIN</a></li>

	
	<?php
	if(!empty($_SESSION['user'])){
			echo '<li><a href="deconnexion.php">Déconnexion</a></li>';
		}
		?>
</ul>

