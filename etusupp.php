<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="projet";

$conn=new mysqli($servername,$username,$password,$dbname);

$id = isset($_POST["supprimer"]) ? $_POST["supprimer"] : "";

$sql = "DELETE FROM Etudiant WHERE IdEtu = '$id'";
$result = $conn->query($sql);
if ($result === TRUE) {
    echo "Ligne supprimée avec succès.";
} else {
    echo "Erreur lors de la suppression de la ligne : " . $bdd->error;
}
$conn->close();

?>