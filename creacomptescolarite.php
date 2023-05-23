<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="creaCompteStatut.css">
	<title>OMNES MySkills</title>
</head>

<body>
	<header>
		<img src="logoSite.png" alt="imageLogo">
		<h1>Création d'un nouveau compte administrateur</h1>
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
            <label for="login">Login :</label>
            <input type="email" id="login" name="login" value="<?php echo htmlspecialchars($_POST['login'] ?? '', ENT_QUOTES); ?>" required>
            <br>
			<br>
			<input type="submit" name="creersco" value="Creer le compte">

			<?php

			function generateRandomPassword()
			{
				$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
				$password = '';
				$charactersLength = strlen($characters);
				for ($i = 0; $i < 3; $i++) {
					$password .= $characters[rand(0, $charactersLength - 1)];
				}
				return $password;
			}

			$randomPassword = generateRandomPassword();
			echo "Mot de passe aléatoire : " . $randomPassword;


			?>

		</form>
	</div>
	<!--pop-up déconnexion-->

	<?php
	include("ouverturebdd.php");

	if (isset($_POST['creersco'])) {

		$login = isset($_POST["login"]) ? $_POST["login"] : "";
		$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
		$prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";

		$requete = $bdd->prepare('INSERT INTO Scolarite (Login,Password,Nom,Prenom) VALUES (?,?,?,?)');
		$requete->execute(array($login, $randomPassword, $nom, $prenom));
	}



	?>

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