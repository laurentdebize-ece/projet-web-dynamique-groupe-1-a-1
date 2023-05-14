<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="creacomptescolarite.css">
    <title>ajout matiere</title>   
</head>

<body>
	<h1>Création d'une nouvelle matiere</h1>
	<form method="post" action="ajoutmatiere2.php">

        <label for="nom">Nom Matiere:</label>
		<input type="text" id="nom" name="nom" required>
        <br>
        <label for="volume">Volume horaire :</label>
		<input type="text" id="volume" name="volume" required>
        <br>

		<input type="submit" value="Ajouter matiere">
		
	</form>
    <button onclick="window.location.href='scolarite.php'">Retour</button>
           
</body>



</html>