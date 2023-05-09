<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>OMNES MySkills</title>
    <link rel="stylesheet" type="text/css" href="compte.css">
  </head>
  <?php 
  $_SESSION['login'] = $login;
  $_SESSION['password'] = $password;
  ?>
  <body>
  <header>
		<img src="logoSite.png" alt="imageLogo"  style="width:100px">
		<h1>Mon Compte</h1>
    <button onclick="window.location.href='etudiant.php'">Retour</button>
	</header>
    <div class="page"> <!--contenant toute la page-->
      <div class="pageGauche"><!--gauche page-->
        <!--A remplir en PHP-->
        <p>Prénom : Eva</p>
        <p>Nom : Courva</p>
        <p>Email : eva.courva@edu.ece.fr</p>
      </div>
      <div class="pageDroite"><!--droite page-->
        <img src="ProfilD.jpg" alt="Photo de profil">
      </div>
    </div>
    <div id="footer"> 
        <p>© 2023 Projet WEB Dynamique: Eva, Anaé, Valentin, Trystan</p>
    </div>
  </body>
</html>
