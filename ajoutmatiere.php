<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="ajoutMatiere.css">
    <title>OMNES MySkills</title>
</head>

<body>
    <header>
        <img src="logoSite.png" alt="imageLogo">
        <h1>Ajouter Matiere</h1>
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

            <label for="nom">Nom Matiere:</label>
            <input type="text" id="nom" name="nom" required>
            <br>
            <label for="volume">Volume horaire :</label>
            <input type="text" id="volume" name="volume" required>
            <br>
            <br>
            <input type="submit" name="ajoutmatiere" value="Ajouter matiere">

        </form>
    </div>

    <?php
    include("ouverturebdd.php");

    if (isset($_POST['ajoutmatiere'])) {

        $nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
        $volume = isset($_POST["volume"]) ? $_POST["volume"] : "";
        $requete = $bdd->prepare('INSERT INTO Matière (NomMatiere,NbHeures) VALUES (?,?)');
        $requete->execute(array($nom, $volume));
        
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