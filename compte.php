<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>OMNES MySkills</title>
  <link rel="stylesheet" type="text/css" href="compte.css">
</head>

<body>
  <h1>Mon compte</h1>
  <div class="page"> <!--contenant toute la page-->
    <div class="pageGauche"><!--gauche page-->
      <!--A remplir en PHP-->
      <p>Prénom : <?php echo $_SESSION['Prenom'] ?></p>
      <p>Nom : <?php echo $_SESSION['Nom'] ?> </p>
      <p>Email : <?php echo $_SESSION['login'] ?></p>
    </div>
    <div class="pageDroite"><!--droite page-->
      <img src="ProfilD.jpg" alt="Photo de profil">
    </div>
  </div>
  <button onclick="window.location.href='etudiant.php'">Retour</button>
</body>

</html>