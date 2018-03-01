<ul class="nav flex-column menu">
	<li>
		<?php 
		if(!empty($_SESSION['user'])){
			echo "Bonjour"." ".$_SESSION['user']." "."!";
		}
		?>			
	</li>
	<li><a href="index.php">HOME</a></li>
	<li><a href="apropos.php">À PROPOS</a></li>
	<li><a href="contact.php">CONTACT</a></li>
	<li>
		<?php 
		if(!empty($_SESSION['user'])){
			echo '<a href="evenements.php">ÉVÈNEMENTS</a>';
		}else{
			echo '<a href="connexion.php">ÉVÈNEMENTS</a>';
		}
		?>	
	</li>
	<li><a href="blog.php">BLOG</a></li>
	<li>
		<?php 
		if(!empty($_SESSION['user'])){
			echo '<a class="a_session" href="already.php">CONNEXION</a>';
		}else{
			echo '<a class="a_session" href="connexion.php">CONNEXION</a>';
		}
		?>	
		
	</li>	
	<?php
	if(!empty($_SESSION['user'])){
		echo '<li><a href="deconnexion.php">Déconnexion</a></li>';
	}
	?>
</ul>

