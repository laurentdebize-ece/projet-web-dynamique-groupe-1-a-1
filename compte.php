<?php session_start(); 

include("ouverturebdd.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="compteEtu.css">

    <title>OMNES MySkills</title>
</head>

<body>
    <header>
        <img src="logoSite.png" alt="imageLogo">
        <h1>Mon compte Etudiant</h1>
        <nav>
            <button onclick="window.location.href='etudiant.php'">Retour</button>
            <button id="deco">Déconnexion</button>
        </nav>
    </header>
    <?php 

    $requete = $bdd->prepare('SELECT Classe FROM Classe WHERE IdClasse = ?');
    $requete->execute(array($_SESSION['Classe']));

        if ($donnees = $requete->fetch()) {
            $classe = $donnees['Classe'];
            $requete->closeCursor();
        }    
    
    ?>
    <br>
    <br>
    <div class="page"> <!--contenant toute la page-->
        <div class="pageGauche"><!--gauche page-->
            <h2>Bienvenue!</h2>
            <form>
                <p> Nom : <?php echo $_SESSION['Nom'] ?> </p>
                <p>Prénom : <?php echo $_SESSION['Prenom'] ?> </p>
                <p>Adresse mail : <?php echo $_SESSION['login'] ?></p>
                <p>Mot de passe : <?php echo $_SESSION['password'] ?></p>
                <p>Classe : <?php echo $classe ?></p>
            </form>
        </div>
        <div class="pageDroite"><!--droite page-->
            <img class="profilImage" src="ProfilD.jpg" alt="Photo de profil">
        </div>
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