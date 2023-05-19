<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="comptesco.css">

    <title>compte scolarité</title>
</head>

<body>
    <h1>Mon compte Administrateur :</h1>
    <form>
        <p> Nom :  <?php echo $_SESSION['Nom'] ?> </p>
        <p>Prénom : <?php echo $_SESSION['Prenom'] ?> </p>
        <p>Adresse mail : <?php echo $_SESSION['login'] ?></p>
        <p>Mot de passe : <?php echo $_SESSION['password'] ?></p>
        <br>

    </form>
    <button onclick="window.location.href='scolarite.php'">Retour</button>

    <div id="footer">
        <p>© 2023 Projet WEB Dynamique: Eva, Anaé, Valentin, Trystan</p>
    </div>
</body>

</html>