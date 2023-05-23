<?php
$servername="localhost";
$username="root";
$password="root";
$dbname="projet";
$conn=new mysqli($servername,$username,$password,$dbname);
$etudiant = $_POST['supprimer'];
$requete = "DELETE FROM etudiant WHERE IdEtu = '$etudiant'";
$resultat=$conn->query($sql);
if ($resultat==TRUE) {
    echo "Ligne supprimée avec succès.";
} else {
    echo "Erreur lors de la suppression de la ligne : " . $requete->error;
}

$conn->close();
?>