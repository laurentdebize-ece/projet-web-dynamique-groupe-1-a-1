<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php try {

    $bdd = new PDO(
        'mysql:host=localhost;dbname=famille;
      charset=utf8',
        'root',
        'root',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$requete = $bdd->prepare('SELECT Prenom FROM membre WHERE email =  ? AND password = ? ' );
while($donnees = $requete->fetch()) { 
   ?>
      <p>
            Prenom : <?php echo $donnees['Prenom']; ?>
      </p>
   <?php
}
$requete->closeCursor();

?>