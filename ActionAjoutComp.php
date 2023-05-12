<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "projet";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données: " . $conn->connect_error);
}
$competence = mysqli_real_escape_string($conn, $_POST['nom']);
$dateLimite = mysqli_real_escape_string($conn, $_POST['date']);
$classe = mysqli_real_escape_string($conn, $_POST['classe']);
$sql = "INSERT INTO competence (NomCom, DateLimite, ClasseConcerné) VALUES ('$competence', '$dateLimite', '$classe')";
if ($conn->query($sql) === TRUE) {
    echo "Données insérées avec succès.";
} else {
    echo "Erreur lors de l'insertion des données : " . $conn->error;
}
header("Location: professeurTab.php");
exit();
?>
