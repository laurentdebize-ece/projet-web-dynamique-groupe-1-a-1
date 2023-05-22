<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $autoevalId = $_POST['demande'];
    $dateLimite = $_POST['date_limite'];

    $servername = "localhost:3306";
    $username = "root";
    $password = "root";
    $dbname = "projet";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }
    $sqlAutoEval = "INSERT INTO autoevaluation (IdCompetence) SELECT IdCompetence FROM competence WHERE IdCompetence = '$autoevalId'";
    $resultatAutoEval = $conn->query($sqlAutoEval);

    if ($resultatAutoEval === TRUE) {
        $sqlUpdate = "UPDATE competence SET Datelimite = '$dateLimite' WHERE IdCompetence = '$autoevalId'";
        $resultatUpdate = $conn->query($sqlUpdate);

        if ($resultatUpdate === TRUE) {
            echo "Autoévaluation ajoutée avec succès. Date limite mise à jour avec succès.";
        } else {
            echo "Erreur lors de la mise à jour de la date limite : " . $conn->error;
        }
    } else {
        echo "Erreur lors de l'ajout de l'autoévaluation : " . $conn->error;
    }

    $conn->close();
}
?>