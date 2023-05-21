<?php session_start();
include("ouverturebdd.php");

$dateLimite = mysqli_real_escape_string($bdd, $_POST['date']);
$competence = $_POST["competence"];
$sql = "UPDATE competence SET DateLimite = '$dateLimite' WHERE NomCom = '$competence'";

if ($bdd->query($sql) === TRUE) {
    echo "Données insérées avec succès.";
} else {
    echo "Erreur lors de l'insertion des données  ";
}
header("Location: professeurTab.php");
exit();
?>
