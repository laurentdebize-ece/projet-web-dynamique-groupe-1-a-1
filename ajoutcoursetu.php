<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="ajoutCoursEtu.css">
    <title>OMNES MySkills</title>
</head>

<?php session_start();
include("ouverturebdd.php");
?>

<body>
    <header>
        <img src="logoSite.png" alt="imageLogo">
        <h1>Affectation Etudiant à une matière</h1>
        <div class="container">
            <button onclick="window.location.href='comptesco.php'">Compte</button>
            <button id="deco">Déconnexion</button>
        </div>
    </header>
    <button onclick="window.location.href='scolarite.php'">Retour</button>
    <br>
    <br>
    <div class="form-container">
        <form method="post" action="ajoutcoursetu2.php">

            <label>Matiere :</label>
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

            <label>Etudiant :</label>
            <?php
            $requete = $bdd->query('SELECT Nom FROM Etudiant');

            echo '<select name="etu">';
            while ($donnees = $requete->fetch()) {
                echo '<option value="' . $donnees['Nom'] . '">' . $donnees['Nom'] . '</option>';
            }
            $requete->closeCursor();
            echo '</select>';
            ?>

            <br>
            <br>
            <input type="submit" value="Affecter cet etudiant a cette matiere">

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