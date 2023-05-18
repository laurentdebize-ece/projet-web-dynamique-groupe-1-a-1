<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "projet";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données: " . $conn->connect_error);
}
$dateLimite = mysqli_real_escape_string($conn, $_POST['date']);
$competence = $_POST["competence"];
$sql = "UPDATE competence SET DateLimite = '$dateLimite' WHERE NomCom = '$competence'";
if ($conn->query($sql) === TRUE) {
    echo "Données insérées avec succès.";
} else {
    echo "Erreur lors de l'insertion des données : " . $conn->error;
}
header("Location: professeurTab.php");
exit();
?>
