<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="creacompteetudiant.css">
    <title>Omnes MySkills crea compte etudiant</title>   
</head>

<body>
	<h1>Création d'un nouveau compte étudiant</h1>
	<form method="post" action="accueil2.php">
        <label for="nom">Nom :</label>
		<input type="text" id="nom" name="nom">
        <br>
        <label for="prenom">Prénom :</label>
		<input type="text" id="prenom" name="prenom">
        <br>
		<label for="password">Mot de passe :</label>
		<input type="password" id="password" name="password">
		<br>
		<br>
        <label for="matiere">Matière suivi :</label>
		<input type="text" id="matiere" name="matiere">
        <br>
        <label>Dans quelle classe l'ajouter ?</label>
        <select name="classes">
			<option value="ing1">ING1</option>
			<option value="ing2">ING2</option>
			<option value="ing3">ING3</option>
		</select>
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