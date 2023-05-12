<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="etudiant.css">
	<title>Accueil Professeur</title>
</head>
<body>
	<header>
		<img src="logoSite.png" alt="imageLogo">
		<h1>Accueil Professeur</h1>
		<nav>
			<button onclick="window.location.href='professeurTab.php'">Liste des compétences</button>
			<button onclick="window.location.href='compte.php'">Compte</button>
			<button onclick="window.location.href='accueil.php'">Déconnexion</button>
		</nav>
	</header>
	<!--pop-up déconnexion-->
	<script>
		document.getElementById("deco").addEventListener("click", decOut);
		function decOut() {
			if (confirm("Êtes-vous sûr de vouloir vous déconnecter ?")) {
				/*retour page MDP*/
				window.location.href = "accueil.html";
			}
		}
	</script>
	<div id="footer"> 
        <p>© 2023 Projet WEB Dynamique: Eva, Anaé, Valentin, Trystan</p>
    </div>
</body>
</html>