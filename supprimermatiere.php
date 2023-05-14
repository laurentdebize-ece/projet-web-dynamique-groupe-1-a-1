<?php try {

$bdd = new PDO(
    'mysql:host=localhost;dbname=projet;
  charset=utf8',
    'root',
    'root',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
);
} catch (Exception $e) {
die('Erreur : ' . $e->getMessage());
}

$matiere = $_POST['supprimer'];

$requete = $bdd->query('DELETE FROM Matière WHERE NomMatiere = ? ');
$requete->execute(array($matiere));

if ($requete === TRUE) {
    echo "Ligne supprimée avec succès.";
} else {
    echo "Erreur lors de la suppression de la ligne : " . $conn->error;
}
$conn->close();

?>