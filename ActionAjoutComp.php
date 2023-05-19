<?php session_start();
include("ouverturebdd.php");

$competence = htmlspecialchars($_POST['nom']);
$dateLimite = htmlspecialchars($_POST['date']);
$classe = htmlspecialchars($_POST['classe']);
$sql = "INSERT INTO competence (NomCom, DateLimite, IdClasse) VALUES ('$competence', '$dateLimite', '$classe')";
if ($bdd->query($sql) === TRUE) {
    echo "Données insérées avec succès.";
} else {
    echo "Erreur lors de l'insertion des données  ";
}
header("Location: professeurTab.php");
exit();
?>
