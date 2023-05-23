<?php session_start();

$IdEtu = isset($_SESSION['Id']) ? $_SESSION['Id'] : "";

$IdClasse = isset($_SESSION['Classe']) ? $_SESSION['Classe'] : "";

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "projet";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="matiere.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="matiere.js"></script>
    <title>OMNES MySkills</title>
</head>



<body>
    <header>
        <img src="logoSite.png" alt="imageLogo" style="width:100px">
        <h1>Mes Matières</h1>
        <button onclick="window.location.href='etudiant.php'">Retour</button>
    </header>
    <!-- Carousel -->
    <div id="carou" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carou" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carou" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carou" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#carou" data-bs-slide-to="3"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">

                <img id="Elec" src="matiere_electronique.jpg" alt="Elec" class="d-block">
            </div>
            <div class="carousel-item">
                <img id="Info" src="Matiere_Info.jpg" alt="Info" class="d-block">
            </div>
            <div class="carousel-item">
                <img id="Math" src="Matiere_Math2.jpg" alt="Math" class="d-block">
            </div>
            <div class="carousel-item">
                <img id="Physique"src="Matiere_Physique.jpg" alt="Physique" class="d-block">
            </div>

        </div>
        <script>
            document.getElementById("Elec").addEventListener("click", popMatiere);
            document.getElementById("Info").addEventListener("click", popMatiere);
            document.getElementById("Math").addEventListener("click", popMatiere);
            document.getElementById("Physique").addEventListener("click", popMatiere);

            function popMatiere() {
                if (confirm("Voulez-vous voir vos compétences dans cette matière ?")) {
                    window.location.href = "mesCompetence.php";
                }
            }
        </script>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carou" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carou" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>


    <div id="matiere">
            <p class="tabmatiere">
            <table class="tabetu">
                <h2> Matiere </h2>
                <thead>
                    <tr>
                        <th>Nom Matiere</th>
                        <th>Volume Horaire</th>
                        <th>Voir les compétences</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $query = "SELECT IDMatiere FROM Cours WHERE IDClasse = '$IdClasse' ";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        // Récupérer les IDMatieres
                        $idMatieres = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        $idMatieres = array_column($idMatieres, 'IDMatiere');

                        // Exécuter la deuxième requête pour obtenir les informations des matières
                        $placeholders = implode(',', array_fill(0, count($idMatieres), '?'));
                        $query2 = "SELECT * FROM Matière WHERE IdMatiere IN ($placeholders)";
                        $stmt = mysqli_prepare($conn, $query2);
                        if (!$stmt) {
                            die('Erreur de préparation de la requête : ' . mysqli_error($conn));
                        } else {
                            $stmt = mysqli_prepare($conn, $query2);
                            mysqli_stmt_bind_param($stmt, str_repeat('i', count($idMatieres)), ...$idMatieres);
                            mysqli_stmt_execute($stmt);
                            $result2 = mysqli_stmt_get_result($stmt);
                            if (mysqli_num_rows($result2) > 0) {

                                while ($row2 = mysqli_fetch_assoc($result2)) {

                                    echo "<tr>";
                                    echo "<td>" . $row2["NomMatiere"] . "</td>";
                                    echo "<td>" . $row2['NbHeures'] . " Heures" . "</td>";
                                    echo '<td><a href="mesCompetence.php?idmat=' . $row2["IdMatiere"] . ' ">Voir les compétences de cette matière</a></td>';
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan=\"6\">Aucune matière disponible pour l'instant.</td></tr>";
                            }
                        }
                    } else {
                        echo "<tr><td colspan=\"6\">Aucune matière disponible pour l'instant.</td></tr>";
                    }

                    ?>
                </tbody>
            </table>
            </p>
    </div>


    <div id="footer">
        <p>© 2023 Projet WEB Dynamique: Eva, Anaé, Valentin, Trystan</p>
    </div>
</body>

</html>