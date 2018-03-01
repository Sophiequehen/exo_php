<?php 
session_start();
$page = 'contact';
include "config.php";
include "head.php";
?>

<body>
	<h1>CONTACT</h1>

	<div class="menu">
		<?php include "menu.php" ?>
	</div>

	<section id="section_contact">
		<div id="message_soumis">
			<?php 
			
			if($_POST){//éviter les erreurs parce que les champs sont vides

			//variables pour récupérer les données
				$objet = $_POST['objet'];
				$message = $_POST['message'];
				$thematique = $_POST['thematique'];
				$compte = $_POST['compte'];
				$age = $_POST['age'];
				
			//on fait notre requète
				$requete = "INSERT INTO contact VALUES(NULL, '$objet', '$message', '$thematique', '$compte', '$age')";
				$resultat = mysqli_query($connection, $requete) or die('ERREUR SQL : '. $requete . mysqli_error($connection));

			//on ne veut pas du mot simplon
				$pos = stripos($objet, "simplon");
				if ($pos !== false){
					echo "Soyons courtois !";
				}else if ($_POST['objet'] AND $_POST['message']){ //quand les deux champs obligatoires sont remplis?> 
				Objet : <?php echo $_POST['objet']; ?>
				&nbsp;&nbsp;&nbsp;Votre message : <?php echo $_POST['message']; //on affiche l'objet et le message?>
				<?php }else{
				echo " ";  //on ne met rien la première fois que l'on affiche
			}
		}
		?>
	</div>
	<form id="formulaire" action="contact.php" method="post">	
		<input type="text" name="objet" placeholder="Objet" required="text">

		<textarea placeholder="Message" name="message" required="text"></textarea>

		<select name="thematique">
			<option value="html">HTML</option> 
			<option value="php" selected>PHP</option>
			<option value="javascript">JAVASCRIPT</option>
		</select>

		<p>Avez-vous un compte utilisateur ?</p>
		<label><input type="radio" id="radiooui"
			name="compte" value="oui">Oui</label>

			<label><input type="radio" id="radionon"
				name="compte" value="non">Non</label>

				<input type="number" name="age" placeholder="Votre âge">

				<div id="buttons">
					<input type="reset" value="Effacer">
					<input type="submit" value="Ok">
				</div>

			</form>
		</section>

		<?php
		include "foot.php";
		?>
	</body>
	</html>