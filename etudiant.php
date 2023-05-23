<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="etudiant4.css">
    <title>OMNES My skills</title>
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
        <h1>Accueil étudiant</h1>
        <nav>
            <ul>
                <li><a href="#mesCompetence" class="nav-item">Compétences</a></li>
                <li><a href="#matiere" class="nav-item">Matiere</a></li>
                <li><a href="#compte" class="nav-item">Compte</a></li>
                <li><a href="#deco" class="nav-item">Deconnexion</a></li>
                <li><a href="#CompetenceEcole" class="nav-item"> Autre competences</a></li>
            </ul>
        </nav>
    </header>
    <div class="col-container">
        <div class="col1">
            <section id="matiere" class="section-left">
                <h2>Mes matières</h2>
                <button onclick="window.location.href='matiere.php'">Mes matières</button>
            </section>
        </div>
        <div class="col2">
            <section id="compte" class="section-middle">
                <h2>Mon compte</h2>
                <button onclick="window.location.href='compte.php'">Compte</button>
            </section>
        </div>
        <div class="col3">
            <section id="deco" class="section-right">
                <h2>Déconnexion</h2>
                <button id="deco">Déconnexion</button>
            </section>
        </div>
    </div>
    <section id="mesCompetence" class="section-last">
        <h2>Mes compétences</h2>
        <button onclick="window.location.href='mesCompetence.php'">Mes compétences</button>
    </section>
    <section id="CompetenceEcole">
        <h2>Autres Competences</h2>
        <table>
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Nom de l'école</th>
                    <th> Competences Proposées</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="logoInseec.png" alt="Logo Inseec"></td>
                    <td>INSEEC</td>
                    <td>
                        - Management<br>
                        - Etude de Marché
                    </td>
                </tr>
                <tr>
                    <td><img src="logoHEIP.png" alt="Logo HEIP"></td>
                    <td>HEIP</td>
                    <td>
                        - Marketing <br>
                        - Evenementiel
                    </td>
                </tr>
                <tr>
                    <td><img src="logoSup.png" alt="Logo Sup"></td>
                    <td>Sup de Pub</td>
                    <td>
                        - Communication Digitale <br>
                        - Publicité
                    </td>
                </tr>
            </tbody>
        </table>

	</section>


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