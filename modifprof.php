<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="modifEtudiantCompte.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<title>Omnes MySkills</title>
</head>

<body>
	<header>
		<img src="logoSite.png" alt="imageLogo">
		<h1>Modification Professeur</h1>
		<div class="container">
			<button onclick="window.location.href='comptesco.php'">Compte</button>
			<button id="deco">Déconnexion</button>
		</div>
	</header>
	<button onclick="window.location.href='scolarite.php'">Retour</button>
	<br>
	<br>

	<div class="form-container">
		<form method="post" action=" ">

		<label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($_POST['nom'] ?? '', ENT_QUOTES); ?>" required>
            <br>
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($_POST['prenom'] ?? '', ENT_QUOTES); ?>" required>
            <br>
			<label for="password">Mot de passe :</label>
			<input type="password" id="password" name="password" value="<?php echo htmlspecialchars($_POST['password'] ?? '', ENT_QUOTES); ?>" required>
			<br>

			<br>
			<input type="submit" name="modifprof" value="Valider les modifications">

		</form>
	</div>

	<?php

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}

	if (isset($_POST['modifprof'])) {
		include("ouverturebdd.php");

		$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
		$password = isset($_POST["password"]) ? $_POST["password"] : "";
		$prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";
		
		$requete = $bdd->prepare("UPDATE Professeur SET Nom = ? , Prenom = ? , Password = ?  WHERE IdProf = ? ");
		$requete->execute(array($nom, $prenom, $password, $id));

	}

	?>
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

</html>