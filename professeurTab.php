<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="professeur.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Omnes MySkills</title>
</head>
<body>
<img src="logoSite.png" alt="imageLogo">
	<header>
		<h1>Les compétences</h1>
		<nav>
			<button onclick="window.location.href='pageAccueilProf.php'">Retour</button>
		</nav>
	</header>
<table>
  <thead>
    <tr>
      <th>Compétences</th>
      <th>Date limite</th>
      <th>Classe concerné</th>
      <th>Auto-évaluations</th>
      <th> Validation des résultats</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "projet";
  $conn = new mysqli($servername, $username, $password, $dbname);
  $sql = "SELECT NomCom, DateLimite,ClasseConcerné FROM competence";  
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["NomCom"] . "</td>";
          echo "<td>" . $row["DateLimite"] . "</td>";
          echo "<td>" . $row["ClasseConcerné"] . "</td>";
          echo "<td><button class=\"demande\">Demander auto-évaluation</button></td>";
          echo "<td><button class=\"demande\">Valider la compétence</button></td>";
          echo "<td><button class=\"retirer\" data-id=\"" . $row["NomCom"] . "\">Supprimer</button></td>";
          echo "</tr>";
      }
  } else {
      echo "<tr><td colspan=\"6\">Aucune compétence disponible pour l'instant.</td></tr>";
  }
  ?>
</tbody>
</table>
<button onclick="window.location.href='FormAjoutComp.php'">Ajouter une compétence</button>
<script>
$(document).ready(function() {
    $(".retirer").click(function() {
        var competences = $(this).data("id");
        $(this).closest("tr").remove();
        $.ajax({
            url: "TabComp.php",
            type: "POST",
            data: { supprimer: competences },
            success: function(response) {
              console.log(response);
              },
            error: function(xhr, status, error) {
              console.error(xhr.responseText);
                          }
              });
            });
          });
</script>           
</body>
</html>