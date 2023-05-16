<?php
$conn = new mysqli("localhost", "root", "root", "projet");
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}
$id = $_POST['supprimer'];
$id2 = $_POST['autoeval'];
$sql = "DELETE FROM competence WHERE NomCom = '$id'";
$sql2 ="UPDATE competence SET AutoEval = true WHERE NomCom = '$id2'";
$result = $conn->query($sql);
$result2 = $conn->query($sql2);
if ($result === TRUE) {
    echo "Ligne supprimée avec succès.";
} else {
    echo "Erreur lors de la suppression de la ligne : " . $conn->error;
}
if ($result2 === TRUE) {
  echo "Demande d'auto-évaluation effectuée";
} else {
  echo "Erreur de la demande " . $conn->error;
}
$conn->close();
?>


