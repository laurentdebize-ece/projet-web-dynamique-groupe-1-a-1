<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="creacompteprofesseur.css">
    <title>Omnes MySkills crea compte prof</title>   
</head>

<body>
	<h1>Création d'un nouveau compte professeur</h1>
	<form method="post" action="profcreercompte.php">

        <label for="nom">Nom :</label>
		<input type="text" id="nom" name="nom">
        <br>
        <label for="prenom">Prénom :</label>
		<input type="text" id="prenom" name="prenom">
        <br>

        <label for="login">Login :</label>
		<input type="email" id="login" name="login">
        <br>

		<label for="password">Mot de passe :</label>
		<input type="password" id="password" name="password">

        <label for="idprof">Id Professeur :</label>
		<input type="number" id="idprof" name="idprof">
        
		<br>

		<br>
		<br>

        <!-- <label for="matiere">Matière enseignée :</label>
		<input type="text" id="matiere" name="matiere">
        <br> -->
        <label>Quelle classe lui attribuer ?</label>

        <select name="classe">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
		</select>
        <br>
		<input type="submit" value="Creer le compte">
		
	</form>
           
</body>

<?php 
if(isset($_POST['error'])){

    if($_POST['error']==1){
        echo"login ou password ";   
    }
}
?>


</html>
