<?php
$servername="localhost:3306";
$username="root";
$password="root";
$dbname="projet";
$conn=new mysqli($servername,$username,$password,$dbname);
$matiere = $_POST['supprimer'];
$requete = "DELETE FROM matière WHERE NomMatiere = '$matiere'";
$resultat=$conn->query($sql);
if ($resultat==TRUE) {
    echo "Ligne supprimée avec succès.";
} else {
    echo "Erreur lors de la suppression de la ligne : " . $requete->error;
}

$conn->close();
?>

