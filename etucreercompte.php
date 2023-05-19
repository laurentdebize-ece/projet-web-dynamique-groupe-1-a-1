<?php session_start();
include("ouverturebdd.php");

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$login = $_POST['login'];
$password = $_POST['password'];


$requete = $bdd->prepare('INSERT INTO Etudiant (Login,Nom,Prenom,Password) VALUES (?,?,?,?)');
$requete->execute(array($login,$nom,$prenom,$password,));
?>

</html>