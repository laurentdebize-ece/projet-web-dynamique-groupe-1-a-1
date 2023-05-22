<?php
session_start();

include("ouverturebdd.php");

if (isset($_POST['id'])) {
    //Recup ID fichier 
    $idEtu = $_POST['id']; 
    
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $login = $_POST['login'];
    $classe = $_POST['classe'];

    $sql = "UPDATE etudiant SET Nom='$nom', Prenom='$prenom', Login='$login', idClasse='$classe' WHERE idEtu='$idEtu'";
    $bdd->query($sql); 

    header("Location: scolarite.php");
    exit();
}
?>
