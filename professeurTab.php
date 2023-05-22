
<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="professeur2.css" rel="stylesheet" type="text/css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <title>Omnes MySkills</title>
</head>

<body>
  <header>
    <img src="logoSite.png" alt="imageLogo">
    <h1>Les compétences</h1>
    <nav>
      <button onclick="window.location.href='pageAccueilProf.php'">Retour</button>
      <button id="deco">Déconnexion</button>
    </nav>
  </header>
  <table>
    <thead>
      <tr>
        <th>Compétences</th>
        <th>Date limite</th>
       <th>Classe concerné</th>
        <th>Matiere</th> 
        <th>Auto-évaluations</th>
        <th>Validation des résultats</th>
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
      if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
      }

      $query = "SELECT * FROM Competence";
      $result = $conn->query($query);

      if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["NomCom"] . "</td>";
          echo "<td class=\"dateLimite\">" . $row["Datelimite"] . "</td>";
          echo "<td>" . $row["IdClasse"] . "</td>";
          echo "<td>" . $row["IdMatiere"] . "</td>";
          $competenceId = $row["IdCompetence"]; 
          echo '<td><button class="demande" data-id="' . $competenceId . '">Demande auto-évaluation</button></td>';
          echo '<td><button class="validation" data-id="' . $competenceId . '">Valider la compétence</button></td>';
          echo "<td><button class=\"retirer\" data-id=\"" . $competenceId . "\">Supprimer</button></td>";
          echo "</tr>";
          

        }
      } else {
        echo "<tr><td colspan=\"6\">Aucune compétence disponible pour l'instant.</td></tr>";
      }
      ?>
    </tbody>
  </table>
  <br>
  <button onclick="window.location.href='FormAjoutComp.php'">Ajouter une compétence</button>
  <form id="autoEvalForm" style="display: none;">
    <label for="dateLimite">Date limite :</label>
    <input type="date" id="dateLimite" name="date_limite">
    <input type="hidden" id="idClasse" name="id_classe">
    <input type="submit" value="Envoyer">
  </form>
  <p> Id dur professeur : <?php echo $_SESSION['IdProf'] ?> </p>
  <script>
    $(document).ready(function() {
      $(".retirer").click(function() {
        var competences = $(this).data("id");
        $.ajax({
          type: "POST",
          url: "TabComp.php",
          data: {
            supprimer: competences
          },
          success: function(response) {
            console.log(response);
          },
          error: function(xhr, status, error) {
            console.error(xhr.responseText);
          }

        });
        $(this).closest("tr").remove();
      });
    });
  </script>
   <script>
    $(document).ready(function() {
  $(".demande").click(function() {
    var competenceID = $(this).data("id");
    $("#autoEvalForm").show();
    $("#autoEvalForm").submit(function(e) {
      e.preventDefault();
      var dateLimite = $("#dateLimite").val();
      $.ajax({
        type: "POST",
        url: "AutoEval.php",
        data: {
          demande: competenceID,
          date_limite: dateLimite,
        },
        success: function(response) {
          console.log(response);
          $("#autoEvalForm").hide();
          $(".demande[data-id='" + competenceID + "']").closest("tr").find(".dateLimite").text(dateLimite);
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    });
  });
});
  </script>
</body>


</html>