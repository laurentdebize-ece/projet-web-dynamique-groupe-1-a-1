<?php include("ouverturebdd.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="FormAjoutComp.css">
    <title>OMNES MySkills</title>
</head>

<body>
<header>
        <img src="logoSite.png" alt="imageLogo">
        <h1>Informations sur la compétence :</h1>
        <div class="container">
            <button onclick="window.location.href='comptesco.php'">Compte</button>
            <button id="deco">Déconnexion</button>
        </div>
    </header>
    <button onclick="window.location.href='professeurTab.php'">Retour</button>
    <br>
    <br>
    <div class="form-container">
    <form action="ActionAjoutComp.php" method="post">

        <label for="nom">Nom de la compétence</label>
        <input type="text" id="nom" name="nom" required><br><br>
        <label>Classe concernée :</label><br>
        <?php
        $requete = $bdd->query('SELECT Classe FROM Classe ');

        echo '<select name="classe">';
        
        while ($donnees = $requete->fetch()) {
            echo '<option value="' . $donnees['Classe'] . '">' . $donnees['Classe'] . '</option>';
        }
        $requete->closeCursor();
        echo '</select>';
        ?>

        <br>

        <label>Matière :</label>
        <?php
        $requete = $bdd->query('SELECT * FROM Matière ');

        echo '<select name="matiere">';
        while ($donnees = $requete->fetch()) {
            echo '<option value="' . $donnees['NomMatiere'] . '">' . $donnees['NomMatiere'] . '</option>';
        }
        $requete->closeCursor();
        echo '</select>';
        ?>

        <br>

        <input type="submit" value="Soumettre">
    </form>
    </div>
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