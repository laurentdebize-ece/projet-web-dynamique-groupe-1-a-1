<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "projet";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

$idCompetence = $_POST['id_competence'];
$acquisition = $_POST['acquisition'];
$idEtu = $_POST['id_etu'];
$queryNiveau = "SELECT IDniveau FROM niveau WHERE NomNiveau = '$acquisition'";
$resultNiveau = $conn->query($queryNiveau);
if ($resultNiveau && $resultNiveau->num_rows > 0) {
  $rowNiveau = $resultNiveau->fetch_assoc();
  $idNiveau = $rowNiveau["IDniveau"];
} else {
  echo "Erreur : Niveau non trouvé";
  $conn->close();
  exit;
}
$query = "SELECT IdNiveau FROM autoevaluation WHERE IdCompetence = '$idCompetence' AND IdEtudiant = '$idEtu' ";
$result = $conn->query($query);
$row = $result->fetch_assoc();
if($idNiveau = $row["IdNiveau"] ) {
    $queryUpdate = "UPDATE autoevaluation SET validation = TRUE" ;
    $resultUpdate = $conn->query($queryUpdate);
}else{
    $queryUpdate2 = "UPDATE autoevaluation SET validation = FALSE";
    $resultUpdate2 = $conn->query($queryUpdate2);
}

if ($resultUpdate) {
  echo "Mise à jour réussie";
}
if ($resultUpdate2) {
    echo "Mise à jour réussie";
  }
 else {
  echo "Erreur lors de la mise à jour : " . $conn->error;
}

$conn->close();

?>

