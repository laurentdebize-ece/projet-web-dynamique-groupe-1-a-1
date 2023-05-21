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
        <h1>Création d'un nouveau compte étudiant</h1>
        <div class="container">
            <button onclick="window.location.href='comptesco.php'">Compte</button>
            <button id="deco">Déconnexion</button>
        </div>
    </header>
    <button onclick="window.location.href='scolarite.php'">Retour</button>
    <br>
    <br>
    <div class="form-container">
        <form method="post" action="etucreercompte.php">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
            <br>
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>
            <br>
            <label for="login">Login :</label>
            <input type="email" id="login" name="login">
            <br>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            <br>
            <br>

            <label>Dans quelle classe l'ajouter ?</label>
            <?php
            include("ouverturebdd.php");

            $requete = $bdd->query('SELECT * FROM Classe ');

            echo '<select name="classe">';
            while ($donnees = $requete->fetch()) {
                echo '<option value="' . $donnees['Classe'] . '">' . $donnees['Classe'] . '</option>';
            }
            $requete->closeCursor();
            echo '</select>';
            ?>
            <br>
            <input type="submit" value="Creer le compte">

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