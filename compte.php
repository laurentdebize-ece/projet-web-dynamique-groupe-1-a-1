<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>OMNES MySkills</title>
  <link rel="stylesheet" type="text/css" href="compteEtu.css">
</head>

<body>
  <header>
    <img src="logoSite.png" alt="imageLogo">
    <h1>Mon compte</h1>
    <nav>
      <button onclick="window.location.href='etudiant.php'">Retour</button>
      <button id="deco">Déconnexion</button>
    </nav>
  </header>
  <div class="page"> <!--contenant toute la page-->
    <div class="pageGauche"><!--gauche page-->
      <h2>Bienvenue!</h2>
      <!--A remplir en PHP-->
      <p>Prénom : <?php echo $_SESSION['Prenom'] ?></p>
      <p>Nom : <?php echo $_SESSION['Nom'] ?> </p>
      <p>Email : <?php echo $_SESSION['login'] ?></p>
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