<?php 
$servername="localhost:3306";
$username="root";
$password="root";
$conn=new mysqli($servername,$username,$password);

$competence = mysqli_real_escape_string($conn , $_POST['nom']);
$dateLimite = mysqli_real_escape_string($conn , $_POST['date']);
$classe = mysqli_real_escape_string($conn , $_POST['classe']);
$sql = "INSERT INTO competence (NomCom, DateLimite, IdClasse) VALUES ('$competence', '$dateLimite', '$classe')";
if ($conn->query($sql) === TRUE) {
    echo "Données insérées avec succès.";
} else {
    echo "Erreur lors de l'insertion des données  ";
}
header("Location: professeurTab.php");
exit();
?>
