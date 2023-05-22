<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="accueil2.css">
	<title>Omnes MySkills</title>
</head>

<body>
	<img src="logoSite.png" alt="imageLogo">
	<div class="form-container">
		<form method="post" action="accueil2.php ">
			<h1>OMNES MySkills</h1>
			<br>
			<label for="login">Identifiant :</label>
			<input type="email" name="login" id="login">
			<br>
			<label for="password">Mot de passe :</label>
			<input type="password" name="password" id="password">
			<br>
			<br>
            <label for="newpassword">Nouveau mot de passe :</label>
			<input type="password" name="newpassword" id="password">
			<br>
			<br>
			<select name="statut">
				<option value="prof">Professeur</option>
				<option value="sco">Administrateur</option>
				<option value="etud">Étudiant</option>
			</select>
			<br>
			<br>
			
			<input type="submit" name="connexion" value="Connexion">

		</form>
	</div>

	

	<div id="footer">
		<p>© 2023 Projet WEB Dynamique: Eva, Anaé, Valentin, Trystan</p>
	</div>

</body>

</html>