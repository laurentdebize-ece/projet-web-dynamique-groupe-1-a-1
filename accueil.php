<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="accueil.css">
    <title>Omnes Skills</title>   
</head>

<body>
	<h1>Omnes Skills</h1>
	<form method="post" action="accueil2.php">
		<label for="login">Login:</label>
		<input type="email" name="login" id="login">

		<label for="password">Mot de passe:</label>
		<input type="password" name="password" id="password">

		<select name="statut">
			<option value="prof">Professeur</option>
			<option value="sco">Scolarité</option>
			<option value="etud">Étudiant</option>
		</select>

		<input type="submit" value="Connexion">
		<input type="submit" value="Créer son compte">
	</form>
           
</body>

<?php 

if(isset($_GET['error'])){

    if($_GET['error']==1){
        echo"login ou password ";
        
    }
}
?>


</html>