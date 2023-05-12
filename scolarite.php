<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="scolarite.css">
    <!--<script src="scolarite.js"></script>-->
    <title>Accueil Administrateur</title>
</head>
<body>
    <h1>Accueil administrateur</h1>
	<header>
		<nav>
			<button onclick="window.location.href='comptesco.php'">Mon compte administrateur</button>
			<button>Déconnexion</button>
		</nav>
	</header>
    <br>
    <br>

    <form method="get" action="scolarite.php">
        Vous pouvez ici créer un nouveau compte :
        Quel statut voulez vous créer ?
        <br>
        <label>Statut :</label>
        <select name="creercomptes">
			<option value="professeur">Professeur</option>
			<option value="scolarite">Administrateur</option>
			<option value="etudiant">Étudiant</option>
		</select>
        <br>
        <br>
		<input type="submit" id="submit" value="Créer le compte">
       <!-- <script>
            document.querySelector(".professeur").addEventListener("click", creacompteprofesseur);
            document.querySelector(".scolarite").addEventListener("click", creacomptescolarite);
            document.querySelector(".etudiant").addEventListener("click", creacompteetudiant);

            function creacompteprofesseur() {
                if (confirm("Voulez-vous créer un nouveau compte professeur ?")) {
                    window.location.href = "creacompteprofesseur.php";
                }
            }
            function creacomptescolarite() {
                if (confirm("Voulez-vous créer un nouveau compte administrateur?")) {
                    window.location.href = "creacomptescolarite.php";
                }
            }
            function creacompteetudiant() {
                if (confirm("Voulez-vous créer un nouveau compte étudiant ?")) {
                    window.location.href = "creacompteetudiant.php";
                }
            }
        </script> -->
        <?php
             $choice = isset($_GET["creercomptes"]) ? $_GET["creercomptes"] : "";
             switch ($choice) {
                case "professeur" :
                    header("Location:creacompteprofesseur.php");
                    break;
                case "scolarite" :
                    header("Location:creacomptescolarite.php");
                    break;
                case "etudiant" :
                    header("Location:creacompteetudiant.php");
                    break;    
             }
        ?>
	</form>
<br>
<br>
    <form method="get" action="scolarite2.php">
        Ici vous pouvez supprimer un compte :
        <br>
        <br>

		<label for="nom">Nom :</label>
		<input type="text" id="nom" name="nom" >
        <br>

        <label for="prenom">Prénom :</label>
		<input type="text" id="prenom" name="prenom">
        <br>

		<label>Statut :</label>
		<select name="supprimercompte">
			<option value="professeur">Professeur</option>
			<option value="scolarite">Administrateur</option>
			<option value="etudiant">Étudiant</option>
		</select>
        <br>
        <br>

		<input type="submit" value="Supprimer le compte">
	</form>
    <br>
    <br>

    <form method="get" action="scolarite2.php">
        Demander à un étudiant de s'auto-évaluer :
        <br>
        <br>

		<label for="nom">Nom :</label>
		<input type="nom" id="nom" name="nom">
        <br>

        <label for="prenom">Prénom :</label>
		<input type="text" id="prenom" name="prenom">
        <br>

		<label>Matière :</label>
		<select name="choixmatiere">
			<option value="maths">Maths</option>
			<option value="physique">Physique</option>
			<option value="informatique">Informatique</option>
            <option value="electronique">Electronique</option>
		</select>
        <br>

        <label>Compétence :</label>
		<select name="choixcompetences">
			<option value="calcul">Calcul</option>
			<option value="physique">Physique</option>
			<option value="informatique">Informatique</option>
            <option value="electronique">Electronique</option>
		</select>
        <br>

        <label for="start">Date limite :</label>

        <input type="date" id="start" name="trip-start"
       value="2023-05-24"
       min="2021-01-01" max="2026-12-31">

        <br>
        <br>

		<input type="submit" value="Envoyer la demande">
	</form>
    <br>
    <br>

    <form method="get" action='modifcompteetudiant.php'>
        Les étudiants :
        <br>
        <table id="competences">
            <thead>
                <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Classe</th>
                <th>Modifier le profil</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td contenteditable="true">Nom 1</td> 
                <td contenteditable="true">Prénom 1</td>
                <td contenteditable="true">Classe 1</td>
                <td><button onclick="window.location.href='modifcompteetudiant.php'", class="modifier">Modifier</button></td>
                </tr>
            </tbody>
        </table>        
	</form>

    <br>
    <br>
    <br>
    <br>
    <div id="footer"> 
        <p>© 2023 Projet WEB Dynamique: Eva, Anaé, Valentin, Trystan</p>
    </div>

</body>
	
</html>

