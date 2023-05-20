<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $autoeval = $_POST['demande'];
    $dateLimite = $_POST['date_limite'];
    $idClasse = $_POST['id_classe'];

    // Assurez-vous que les informations de connexion à la base de données sont correctes
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "projet";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }
    $sql = "UPDATE competence SET Datelimite = '$dateLimite' WHERE NomCom = '$autoeval'";
    $resultat = $conn->query($query);

    if ($resultat === TRUE) {
        echo "Date limite mise à jour avec succès.";
        $sqlId = "SELECT IdCompetence FROM competence WHERE NomCom = '$autoeval'";
        $resultId = $conn->query($sqlId);
        if ($resultId && $resultId->num_rows > 0) {
            $row = $resultId->fetch_assoc();
            $idCompetence = $row["IdCompetence"];
            $sqlAutoEval = "INSERT INTO autoevaluation (IdCompetence, IdClasse) VALUES ('$idCompetence', '$idClasse')";
            $resultatAutoEval = $conn->query($sqlAutoEval);

            if ($resultatAutoEval === TRUE) {
                echo "Autoévaluation ajoutée avec succès.";
            } else {
                echo "Erreur lors de l'ajout de l'autoévaluation : " . $conn->error;
            }
        } else {
            echo "Erreur lors de la récupération de l'ID de compétence : " . $conn->error;
        }
    } else {
        echo "Erreur lors de la mise à jour de la date limite : " . $conn->error;
    }

    $conn->close();
}
?>
