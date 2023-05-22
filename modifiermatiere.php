!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="modifProfCompte.css">
	<title>Omnes MySkills</title>
</head>

<body>
	<header>
		<img src="logoSite.png" alt="imageLogo">
		<h1>Modification Etudiant</h1>
		<div class="container">
			<button onclick="window.location.href='comptesco.php'">Compte</button>
			<button id="deco">Déconnexion</button>
		</div>
	</header>
	<button onclick="window.location.href='scolarite.php'">Retour</button>
	<br>
	<br>
	<div class="form-container">
		<form method="post">
			<label for="nom">Nom :</label>
			<input type="text" id="nom" name="nom">
			<br>
			<label for="prenom">Prénom :</label>
			<input type="text" id="prenom" name="prenom">
			<br>
			<label for="password">Mot de passe :</label>
			<input type="password" id="password" name="password">
			<br>
			<br>
			<label for="matiere">Matière :</label>
			<input type="text" id="matiere" name="matiere">
			<br>
			<label>Ce professeur est associé à la classe :</label>
			<select name="classes">
				<option value="ing1">ING1</option>
				<option value="ing2">ING2</option>
				<option value="ing3">ING3</option>
			</select>
			<br>
			<input type="submit" value="Valider les modifications">

		</form>
		<!--pop-up déconnexion-->
	<script>
		document.getElementById("deco").addEventListener("click", decOut);

		function decOut() {
			if (confirm("Êtes-vous sûr de vouloir vous déconnecter ?")) {
				/*retour page MDP*/
				window.location.href = "accueil.php";
			}
		}
	</script>
	<div id="footer">
		<p>© 2023 Projet WEB Dynamique: Eva, Anaé, Valentin, Trystan</p>
	</div>
</body>
</div>

</html>