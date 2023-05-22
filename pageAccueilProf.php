<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="pageAccueilProf.css">
	<title>OMNES MySkills</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			$('a[href^="#"]').on('click', function(event) {
				var target = $(this.getAttribute('href'));
				if (target.length) {
					event.preventDefault();
					$('html, body').stop().animate({
						scrollTop: target.offset().top
					}, 800);
				}
			});
		});
	</script>
</head>

<body>
	<header>
		<img src="logoSite.png" alt="imageLogo">
		<h1>Accueil Professeur</h1>
		<nav>
			<ul>
				<li><a href="#mesCompetence" class="nav-item">Liste des Compétences</a></li>
				<li><a href="#compte" class="nav-item">Compte</a></li>
				<li><a href="#deco" class="nav-item">Deconnexion</a></li>
			</ul>
		</nav>
	</header>
	<br>
	<section id="mesCompetence" class="section-last">
		<h2>Mes compétences</h2>
		<button onclick="window.location.href='professeurTab.php'">Mes compétences</button>
	</section>
	<div class="col-container">
		<div class="col1">
			<section id="compte" class="section-left">
				<h2>Mon compte</h2>
				<button onclick="window.location.href='compteProf.php'">Mes matières</button>
			</section>
		</div>
		<div class="col2">
			<section id="deco" class="section-right">
				<h2>Déconnexion</h2>
				<button id="deco">Se deconnecter</button>
			</section>
		</div>

		
	<script>
		document.getElementById("deco").addEventListener("click", decOut);

		function decOut() {
			if (confirm("Êtes-vous sûr de vouloir vous déconnecter ?")) {
				window.location.href = "accueil.php";
			}
		}
	</script>
		


	<br>
    <div id="footer">
        <p>© 2023 Projet WEB Dynamique: Eva, Anaé, Valentin, Trystan</p>
    </div>
</body>

</html>