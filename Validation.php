<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idCompetence = $_POST['id_competence'];
    $acquisition = $_POST['acquisition'];
    $idEtudiant = $_POST['id_etudiant'];

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "projet";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    $sqlExisting = "SELECT * FROM autoevaluation WHERE IdEtudiant = '$idEtudiant' AND IdCompetence = '$idCompetence'";
    $resultExisting = $conn->query($sqlExisting);
    $sqlNiveau = "SELECT IDniveau FROM niveau WHERE NomNiveau = '$acquisition'";
    $resultatNiveau = $conn->query($sqlNiveau);

    if ($resultatNiveau && $resultatNiveau->num_rows > 0) {
        $rowNiveau = $resultatNiveau->fetch_assoc();
        $idNiveau = $rowNiveau["IDniveau"];

        if ($resultExisting && $resultExisting->num_rows > 0) {
            $sqlUpdate = "UPDATE autoevaluation SET IdNiveau = '$idNiveau' WHERE IdEtudiant = '$idEtudiant' AND IdCompetence = '$idCompetence'";
            $resultUpdate = $conn->query($sqlUpdate);

            if ($resultUpdate === TRUE) {
                echo "Autoévaluation mise à jour avec succès.";
            } else {
                echo "Erreur lors de la mise à jour de l'autoévaluation : " . $conn->error;
            }
        } else {
            $sqlInsert = "INSERT INTO autoevaluation (IdEtudiant, IdCompetence, IdNiveau) VALUES ('$idEtudiant', '$idCompetence', '$idNiveau')";
            $resultInsert = $conn->query($sqlInsert);

            if ($resultInsert === TRUE) {
                echo "Autoévaluation ajoutée avec succès.";
            } else {
                echo "Erreur lors de l'ajout de l'autoévaluation : " . $conn->error;
            }
        }
    } else {
        echo "Erreur lors de la récupération de l'ID du niveau : " . $conn->error;
    }

    $conn->close();
}
?>


