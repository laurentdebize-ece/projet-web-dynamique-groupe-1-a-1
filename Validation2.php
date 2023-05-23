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
$idProf = $_POST['id_prof'];
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
$queryEtudiant = "SELECT IdEtudiant FROM autoevaluation WHERE IdCompetence = '$idCompetence' LIMIT 1";
$resultEtudiant = $conn->query($queryEtudiant);

if ($resultEtudiant && $resultEtudiant->num_rows > 0) {
  $rowEtudiant = $resultEtudiant->fetch_assoc();
  $idEtudiant = $rowEtudiant["IdEtudiant"];
} else {
  echo "Erreur : Étudiant non trouvé";
  $conn->close();
  exit;
}
$queryUpdate = "UPDATE autoevaluation SET validation = (IdNiveau = '$idNiveau') WHERE IdCompetence = '$idCompetence' AND IdEtudiant = '$idEtudiant'";
$resultUpdate = $conn->query($queryUpdate);

if ($resultUpdate) {
  echo "Mise à jour réussie";
} else {
  echo "Erreur lors de la mise à jour : " . $conn->error;
}

$conn->close();

?>

