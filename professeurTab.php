<!DOCTYPE html>
<html lang="en">

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
      <button onclick="window.location.href='etudiant.php'">Retour</button>
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
          echo '<td><button class="demande" data-id="' . $row["NomCom"] . '" data-id-classe="' . $row["IdClasse"] . '">Demande auto-évaluation</button></td>';
          echo '<td><button class="validation" data-id="' . $row["NomCom"] . '">Valider la compétence</button></td>';
          echo "<td><button class=\"retirer\" data-id=\"" . $row["NomCom"] . "\">Supprimer</button></td>";
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
    var autoeval = $(this).data("id");
    var idClasse = $(this).data("id-classe");
    $("#autoEvalForm").show();
    $("#idClasse").val(idClasse);
    $("#autoEvalForm").submit(function(e) {
      e.preventDefault();
      var dateLimite = $("#dateLimite").val();
      var idClasse= $("#idClasse").val();

      $.ajax({
        type: "POST",
        url: "AutoEval.php",
        data: {
          demande: autoeval,
          date_limite: dateLimite,
          id_classe : idClasse,
        },
        success: function(response) {
          console.log(response);
          $("#autoEvalForm").hide();
          $(".demande[data-id='" + autoeval + "']").closest("tr").find(".dateLimite").text(dateLimite);
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