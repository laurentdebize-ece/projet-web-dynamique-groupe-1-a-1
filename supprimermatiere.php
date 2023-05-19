<?php 
session_start();
include("ouverturebdd.php");

$matiere = $_POST['Supprimer'];

$requete = $bdd->query('DELETE FROM Matière WHERE NomMatiere = ? ');
$requete->execute(array($matiere));

if ($requete === TRUE) {
    echo "Ligne supprimée avec succès.";
} else {
    echo "Erreur lors de la suppression de la ligne  " ;
}
$requete->closeCursor();

?>