<?php
session_start();

include("ouverturebdd.php");

if (isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['password']) && isset($_POST['classe'])) {
    $idEtu = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $password = $_POST['password'];
    $classe = $_POST['classe'];

    echo "Données reçues : id=$idEtu, nom=$nom, prenom=$prenom, password=$password, classe=$classe";

    $requete = $bdd->prepare("UPDATE etudiant SET Nom = :nom, Prenom = :prenom, Password = :password, IdClasse = :classe WHERE IdEtu = :idEtu");
    
    $requete->bindParam(':nom', $nom);
    $requete->bindParam(':prenom', $prenom);
    $requete->bindParam(':password', $password);
    $requete->bindParam(':classe', $classe);
    $requete->bindParam(':idEtu', $idEtu);

    
    $success = $requete->execute();

    
    if ($success) {
        header("Location: scolarite.php");
        exit();
    } 
}
?>

