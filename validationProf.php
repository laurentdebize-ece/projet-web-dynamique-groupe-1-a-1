<!DOCTYPE html>
<html lang="en">
<?php session_start();
$IdProf = isset($_SESSION['Id']) ? $_SESSION['Id'] : "";
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="professeur2.css" rel="stylesheet" type="text/css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <title>Omnes MySkills</title>
</head>
<?php
$competenceID = $_GET['competenceID'];
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "projet";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Erreur de connexion à la base de données : " . $conn->connect_error);
}
$query = "SELECT autoevaluation.IdEtudiant, etudiant.Nom, niveau.NomNiveau AS NomNiveau FROM autoevaluation INNER JOIN etudiant ON autoevaluation.IdEtudiant = etudiant.IdEtu INNER JOIN niveau ON autoevaluation.IdNiveau = niveau.IdNiveau WHERE autoevaluation.IdCompetence = '$competenceID'";
$query2 = "SELECT * FROM competence";
$result = $conn->query($query);
$result2 = $conn->query($query2);
?>
<img src="logoSite.png" alt="imageLogo">
<table>
  <thead>
    <tr>
      <th>Nom de l'élève</th>
      <th>Niveau d'auto-évaluation</th>
      <th>Avis professeur</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $row2 = $result2->fetch_assoc();
        echo "<tr>";
        echo "<td>" . $row["Nom"] . "</td>";
        echo "<td>" . $row["NomNiveau"] . "</td>";
        echo '<td>';
        echo '<select class="acquisitionProf" data-id="' . $row2["IdCompetence"] . '" data-id-etu="' . $row["IdEtudiant"] . '">';
        echo '<option value="acquis">acquis</option>';
        echo '<option value="non acquis">non acquis</option>';
        echo '<option value="en cours">en cours</option>';
        echo '</select>';
        echo '</td>';
        echo "</tr>";
      }

    } else {
      echo "<tr><td colspan=\"2\">Aucun résultat d'auto-évaluation disponible pour cette competence.</td></tr>";
    }
    ?>
    <script>
    $(".acquisitionProf").change(function() {
      var idCompetence = $(this).data("id");
      var acquisition = $(this).val();
      var idEtu = $(this).data("id-etu");
      $.ajax({
        type: "POST",
        url: "Validation2.php",
        data: {
          id_competence: idCompetence,
          acquisition: acquisition,
          id_etu: idEtu,
        },
        success: function(response) {
          console.log(response);
          $(".acquisitionProf[data-id='" + idCompetence + "']").closest("td").text(acquisition);
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    });
  </script>
  </tbody>
</table>

<br>
<br>
<div id="footer">
  <p>© 2023 Projet WEB Dynamique: Eva, Anaé, Valentin, Trystan</p>
</div>

</body>

</html>