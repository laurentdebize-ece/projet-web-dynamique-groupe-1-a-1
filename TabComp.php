<?php
$conn = new mysqli("localhost", "root", "root", "projet");
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}
$id = $_POST['supprimer'];
$sql = "DELETE FROM competence WHERE NomCom = '$id'";
$result = $conn->query($sql);
if ($result === TRUE) {
    echo "Ligne supprimée avec succès.";
} else {
    echo "Erreur lors de la suppression de la ligne : " . $conn->error;
}
$conn->close();
?>

