<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="professeur.php" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Omnes MySkills</title>
</head>
<body>
<table id="competences">
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
    <tr>
      <td contenteditable="true"></td> 
      <td contenteditable="true"></td>
      <td contenteditable="true"></td>
      <td><button class="demander"> Envoyer la demande</button></td>
      <td><button class="validation"> Valider</button></td>
      <td><button class="retirer">Supprimer</button></td>
    </tr>
  </tbody>
</table>
<button id="ajout">Ajouter une compétence</button>
<script src="professeurAction.php"></script>
</body>
</html>