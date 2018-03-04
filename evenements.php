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
		$req = $connection->query("SELECT DISTINCT lieu FROM events ORDER BY lieu");
		$option = "";
		while ($row = $req->fetch_assoc()){
			$option .= "<option value='".$row['lieu']."'>".$row['lieu']."</option>";
		}
		?>
		<form action="evenements.php" method="post">
			<select name="lieu_choisi" class="btn btn-outline-dark" id="lieu_choisi">
				<option value="choix">Sélectionez votre ville</option>
				<?php
				echo $option;
				?>
			</select>
			<input type="submit" name="trier" class="btn btn-outline-dark" value="Trier">
		</form>
		<?php 
		if($_POST && ($_POST['lieu_choisi']) !== "choix"){
			$lieu=$_POST['lieu_choisi'];
			//j'affiche tous les évènements présents dans ma bdd
			$request = $connection->query("SELECT * FROM events WHERE lieu='".$lieu."' ORDER BY debut");
		}else{
			$request = $connection->query("SELECT * FROM events ORDER BY debut");
		}
		while ($row = $request->fetch_assoc())//fetch_assoc met les éléments dans un array
		{	
			//seulement ceux qui ne sont pas encore passés
			if(date("Y-m-d") < $row["fin"]){
				echo '<div class="articles">';
				echo '<div id="image"><img class="figure-img img-fluid rounded" src="'.$row["image"].'"></div>';
				echo '<div id="legende"><h2>'.$row["titre"].'</h2>';
				echo '<p>'.$row["intro"].'</p>';
				echo '<p class="bold debut">Du '.$row["debut"].' ';
				echo 'au '.$row["fin"].'</p>';
				echo '<p class="bold">À '.$row["lieu"].'</p>';
				echo '<p class="publication">Publié le '.$row["date"].'</p></div>';
				echo '</div>';
			}
		}
		?>
	</section>

	<?php
	include "foot.php";
	?>	
</body>
</html>