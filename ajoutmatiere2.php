<?php session_start();
include("ouverturebdd.php");

$nom = $_POST['nom'];
$volume = $_POST['volume'];


$requete = $bdd->prepare('INSERT INTO Matière (NomMatiere,NbHeures) VALUES (?,?)');
$requete->execute(array($nom,$volume));

?>