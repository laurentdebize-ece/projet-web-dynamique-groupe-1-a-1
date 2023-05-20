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
$sql = "INSERT INTO competence (NomCom, Datelimite) VALUES ('$competence', '$dateLimite')";
if ($conn->query($sql) === TRUE) {
    echo "Données insérées avec succès.";
} else {
    echo "Erreur lors de l'insertion des données : " . $conn->error;
}
header("Location: professeurTab.php");
exit();
?>
