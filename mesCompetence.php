<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="mesCompetence.css">
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

        <button onclick="window.location.href='etudiant.php'">Retour</button>
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

  session_start();
  include("ouverturebdd.php");

  $sql = "SELECT NomCom, Datelimite,ClasseConcerné FROM competence";  
  $result = $bdd->query($sql);
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["NomCom"] . "</td>";
          echo "<td>" . $row["Datelimite"] . "</td>";
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
<script>
//Ordre 
    $('select[name="select"]').change(function() {
        var selectedOption = $(this).val();

        $.ajax({
            type: "POST",
            url: "mesCompetence2.php",
            data: { select: selectedOption },
            success: function(data) {
                $('tbody').html(data);
            }
        });

    });
</script>          
</body>
</html>