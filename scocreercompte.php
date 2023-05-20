<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php session_start();
include("ouverturebdd.php");

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$login = $_POST['login'];
$password = $_POST['password'];

$requete = $bdd->prepare('INSERT INTO Scolarite (Login,Password,Nom,Prenom) VALUES (?,?,?,?)');
$requete->execute(array($login,$password,$nom,$prenom));

?>

</html>