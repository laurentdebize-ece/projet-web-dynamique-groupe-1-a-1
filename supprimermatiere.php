<?php 
session_start();
include("ouverturebdd.php");

$matiere = $_POST['Supprimer'];
$requete = $bdd->query("DELETE FROM matière WHERE NomMatière =  '$matiere'");
$resultat->execute(array($matiere));

if ($resultat === TRUE) {
    echo "Ligne supprimée avec succès.";
} else {
    echo "Erreur lors de la suppression de la ligne  " ;
}
$requete->closeCursor();

?>