<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="mesCompetences3.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>OMNES MySkills</title>

</head>

<body>
  <header>
    <img src="logoSite.png" alt="imageLogo">
    <h1>Mes compétences</h1>
    <form method="post" action="mesCompetence2.php">
      <div class="statut">
        <label>Catégorie</label>
        <select name="select">
          <option value="matiere">Matière</option>
          <option value="prof">Professeur</option>
          <option value="croissant">Ordre Croissant Alphabétique</option>
          <option value="decroissant">Ordre Decroissant Alphabétique</option>
          <option value="Datecroissante">Date Croissante</option>
          <option value="Datedecroissant">Date Decroissant</option>
          <option value="acquis">Acquis</option>
          <option value="enCours">En cours d'acquistion</option>
          <option value="NonAcquis">Non Acquis</option>
        </select>
        <!--<input type="submit" value="Trier">-->

      </div>
    </form>
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
        <th>Matiere</th>
        <th>Auto-évaluation</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $servername = "localhost";
      $username = "root";
      $password = "root";
      $dbname = "projet";

      // Connexion à la base de données
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
          echo "<td>" . $row["Datelimite"] . "</td>";
          echo "<td>" . $row["IdMatiere"] . "</td>";
          if (!empty($row["Datelimite"])) {
            echo '<td>';
            echo '<select class="acquisition" data-id="' . $row["IdCompetence"] . '">';
            echo '<option value="acquis">acquis</option>';
            echo '<option value="non acquis">non acquis</option>';
            echo '<option value="en cours">en cours</option>';
            echo '</select>';
            echo '</td>';
          } else {
            echo "<td>Aucune auto-évaluation programmé par votre professeur</td>";
          }
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
    //Ordre 
    $('select[name="select"]').change(function() {
      var selectedOption = $(this).val();

      $.ajax({
        type: "POST",
        url: "mesCompetence2.php",
        data: {
          select: selectedOption
        },
        success: function(data) {
          $('tbody').html(data);
        }
      });
    });
  </script>
  <!--pop-up déconnexion-->
  <script>
    document.getElementById("deco").addEventListener("click", decOut);

        function decOut() {
            if (confirm("Êtes-vous sûr de vouloir vous déconnecter ?")) {
                /*retour page MDP*/
                window.location.href = "accueil.php";
            }
        }
    </script>
    <script>
     $(".acquisition").change(function() {
        var idCompetence = $(this).data("id");
        var acquisition = $(this).val();
        $.ajax({
          type: "POST",
          url: "Validation.php",
          data: {
            id_competence: idCompetence,
            acquisition: acquisition
          },
          success: function(response) {
            console.log(response);
            $(".acquisition[data-id='" + idCompetence + "']").closest("td").text(acquisition);
          },
          error: function(xhr, status, error) {
            console.error(xhr.responseText);
          }
        });
      });
  </script>


  <div id="footer">
    <p>© 2023 Projet WEB Dynamique: Eva, Anaé, Valentin, Trystan</p>
  </div>
</body>

</html>