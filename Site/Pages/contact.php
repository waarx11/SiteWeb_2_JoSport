<?php

if (isset($_POST['isSubmit']) && $_POST['isSubmit']==1) {

	if (empty($_POST['Nom'])) {
		$errNom='Il faut renseigné le ';
	} else {
		$nom=$_POST['Nom'];
	}

	if (empty($_POST['prenom'])) {
		$errPrenom='Il faut renseigné le ';
	} else {
		$prenom=$_POST['prenom'];
	}

	if (empty($_POST['email']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
		$errEmail='Il faut renseigné l\'';
	} else {
		$email=$_POST['email'];
	}

	if (empty($_POST['desc'])) {
		$errDesc='Il faut renseigné la ';
	} else {
		$desc=$_POST['desc'];
	}
}
?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<title>JoSport</title>
		<link rel="icon" type="image/png" href="../Images/logo.jpg"/>
		<link rel="stylesheet" href="../Styles/Style.css"/>
		<link rel="stylesheet" href="../Styles/contact.css"/>
		<link rel="stylesheet" media="screen and (max-width:800px)" href="../Styles/mediaQue.css" type="text/css"/>
		<script type="text/javascript" src="../Styles/contact.js"></script>
	</head>
<body>
	<header>
			<nav>
				<ul>
					<li><a href="index.html" class="menua borduredroit">Accueil</a></li>
					<li class="deroulant"><a href="#" class="menua borduredroit">Information</a>
					<ul class="sous">
					<li><a href="planning.html" class="menua">Planning</a></li>
					<li><a href="tarif.html" class="menua">Tarif</a></li>
					</ul>
					</li>
					<li class="deroulant"><a href="#" class="menua borduredroit">Media</a>
					<ul class="sous">
					<li><a href="photos.html" class="menua">Photos</a></li>
					<li><a href="videos.html" class="menua">Videos</a></li>
					</ul>
					</li>
				<li><a href="contact.php" class="menua">contact</a></li>
				</ul>
			</nav>
		<h2>Contact</h2>
		<img class="imgJO" src="../Images/Sports-aux-jeux-olympiques.jpg">
	</header>
	<section>
		<h2>Pré-inscription</h2>
		<article>
			<div>
				<form action="contact.php" method="POST">
					<p>
						<?php if (isset($errNom)) { echo $errNom; } ?>
						<label for="Nom">Nom</label><br>
						<input type="text" name="Nom" id="Nom" placeholder="Nom"<?php if (isset($nom)) { echo 'value="'.$nom.'"';}  ?>>
					</p>
					<p><?php if (isset($errPrenom)) { echo $errPrenom; } ?>
						<label for="prenom">Prenom</label><br>
						<input type="text" name="prenom" id="prenom" placeholder="Prénom"<?php if (isset($prenom)) { echo 'value="'.$prenom.'"';}  ?>>
					</p>
					<p>
						<?php if (isset($errEmail)) { echo $errEmail; } ?>
						<label for="email">Email</label><br>
						<input type="email" name="email" id="email" placeholder="Email" <?php if (isset($email)) { echo 'value="'.$email.'"';}  ?>>
					</p>
					<p>
						<label for="tel">Téléphone</label><br>
						<input type="tel" name="tel" id="tel" placeholder="Téléphone" <?php if (isset($tel)) { echo 'value="'.$tel.'"';}  ?>>
					</p>
					<script type="text/javascript">
						function verifnum(tel) {
							var telpattern = new Regxp("(06|07|04)[0-9]{8}");

							if (tel.match(telpattern)) {
								document.write("Numero de tel valide");
							}else{
								document.write("Numero de tel invalide ou vide");
							}
						}

						function getValue(){
							var inputTel = document.getElementById('tel').value;
							console.log(inputTel);
							verifnum(inputTel);
						}
					</script>
					<p>
						<label for="activite">Activité</label><br>
						<select name="activite" id="activite">
							<option value="Halterophilie">Halterophilie</option>
							<option value="Cyclisme">Cyclisme</option>
							<option value="Tir a l'arc">Tir a l'arc</option>
							<option value="Saut à la perche">Saut à la perche</option>
							<option value="Water polo">Water polo</option>
							<option value="Tennis" selected>Tennis</option>
						</select>
					</p>
					<p>
						<label for="horaire day">Créneau horaire</label><br>
						<select name="day" id="day">
							<option value="Lundi">Lundi</option>
							<option value="Mardi">Mardi</option>
							<option value="Mercredi" selected>Mercredi</option>
							<option value="Jeudi">Jeudi</option>
							<option value="Vendredi">Vendredi</option>
							<option value="Samedi">Samedi</option>
						</select>
						<select name="horaire" id="horaire">
							<option value="8h-9h">8h-9h</option>
							<option value="9h-10h">9h-10h</option>
							<option value="10h-11h">10h-11h</option>
							<option value="11h-12h">11h-12h</option>
							<option value="13h-14h">13h-14h</option>
							<option value="14h-15h" selected>14h-15h</option>
							<option value="15h-16h">15h-16h</option>
							<option value="16h-17h">16h-17h</option>
						</select>
					</p>
					<p>
						<label for="btn_radio">Première demande?</label>
					</p>
					<p>
						<label for="btn_radio1">Oui</label>
						<input type="radio" name="btn_radio" id="btn_radio1" value="Oui" checked>
						<label for="btn_radio2">Non</label>
						<input type="radio" name="btn_radio" id="btn_radio2" value="Non">
					</p>
					<p>
						<?php if (isset($errDesc)) { echo $errDesc; } ?>
						<label for="desc" class="desc">Description</label><br>
						<textarea name="desc" id="desc" rows="10" cols="25"><?php if (isset($desc)) { echo "$desc";}  ?></textarea>
					</p>
					<p>
						<input type="hidden" name="isSubmit" value="1"/>
						<input type="submit" value="Envoie" id="Envoie" class="ButtonPagePrincipal" onclick="getValue();"/>
					</p>
						<h3 class="titresouligner">Les informations saisies sont :</h3> <br>
					<p>	<?php if (isset($nom) && isset($email) && isset($desc) && isset($prenom)){
							if (!empty($_POST['tel'])) {
								echo '<strong>Numéro de téléphone :</strong>'.'<br>'.$_POST['tel'].'<br>';
							}
							if (!empty($_POST['activite'])) {
								echo '<strong>Activite selectionner :</strong>'.'<br>'.$_POST['activite'].'<br>';
							}
							if (!empty($_POST['horaire']) && !empty($_POST['day'])) {
								echo '<strong>Créneau horaire :</strong>'.'<br>'.$_POST['day'].' : '.$_POST['horaire'].'<br>';
							}
							if (!empty($_POST['btn_radio'])) {
								echo '<strong>Première visite?</strong>'.'<br>'.$_POST['btn_radio'].'<br>';
							}
							echo "<strong>Nom :</strong> $nom <br> <strong>Prenom :</strong> $prenom <br> <strong>Email :</strong> $email <br> <strong>Description :</strong> $desc <br> <strong>Votre message a bien été envoyer<br>Nous vous recontacterons pour confirmation<strong>";

						} ?>
					</p>
				</form>		
			</div>
		</article>
	</section>
	<footer>
			<div id="footerBut">
			<a class="ButtonPagePrincipal" href="index.html">Page D'accueil</a>
			</div>
			<div id="signature">
				<p>Verdier Nathan G3</p>
			</div>
		</footer>
</body>
</html>