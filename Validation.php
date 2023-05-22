<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idCompetence = $_POST['id_competence'];
    $acquisition = $_POST['acquisition'];

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "projet";


    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    
    $sqlNiveau = "SELECT IDniveau FROM niveau WHERE Nom = '$acquisition'";
    $resultatNiveau = $conn->query($sqlNiveau);

    if ($resultatNiveau && $resultatNiveau->num_rows > 0) {
        $rowNiveau = $resultatNiveau->fetch_assoc();
        $idNiveau = $rowNiveau["IdNiveau"];
        $sqlAutoEval = "UPDATE autoevaluation SET IdNiveau = '$idNiveau' WHERE IdCompetence = '$idCompetence'";
        $resultatAutoEval = $conn->query($sqlAutoEval);

        if ($resultatAutoEval === TRUE) {
            echo "Autoévaluation mise à jour avec succès.";
        } else {
            echo "Erreur lors de la mise à jour de l'autoévaluation : " . $conn->error;
        }
    } else {
        echo "Erreur lors de la récupération de l'ID du niveau : " . $conn->error;
    }

    $conn->close();
}
?>

