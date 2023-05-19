<?php session_start();
include("ouverturebdd.php");

$id = $_POST['supprimer'];
$sql = "DELETE FROM competence WHERE NomCom = '$id'";
$result = $bdd->query($sql);
if ($result === TRUE) {
    echo "Ligne supprimée avec succès.";
} else {
    echo "Erreur lors de la suppression de la ligne : " . $bdd->error;
}
$result->closeCursor();
?>

