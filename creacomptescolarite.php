<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="creacomptescolarite.css">
    <title>Omnes MySkills crea compte administrateur</title>   
</head>

<body>
	<h1>Création d'un nouveau compte administrateur</h1>
	<form method="post" action="scocreercompte.php">

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

        <br>

        <label for="idsco">Identifiant Scolarite :</label>
		<input type="number" id="idsco" name="idsco">



		<br>
		<input type="submit" value="Creer le compte">
		
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