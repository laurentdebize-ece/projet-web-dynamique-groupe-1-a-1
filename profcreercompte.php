<?php session_start();
include("ouverturebdd.php");

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$login = $_POST['login'];
$password = $_POST['password'];
//$idprof = $_POST['idprof'];

$requete = $bdd->prepare('INSERT INTO Professeur (Login,Password,Nom,Prenom) VALUES (?,?,?,?)');
$requete->execute(array($login,$password,$nom,$prenom));

?>
