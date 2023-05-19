<?php 
$servername="localhost:3306";
$username="root";
$password="root";
$conn=new mysqli($servername,$username,$password);

$id = $_POST['supprimer'];
$sql = "DELETE FROM competence WHERE NomCom = '$id'";
$result = $conn->query($sql);
if ($result === TRUE) {
    echo "Ligne supprimée avec succès.";
} else {
    echo "Erreur lors de la suppression de la ligne : " . $bdd->error;
}
$conn->close();
?>

