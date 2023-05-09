<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="scolarite.css">
    <title>Document</title>
</head>
<?php try {

$bdd = new PDO(
    'mysql:host=localhost;dbname=famille;
  charset=utf8',
    'root',
    'root',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
);
} catch (Exception $e) {
die('Erreur : ' . $e->getMessage());
}
echo $_SESSION['login'];
echo $_SESSION['Prenom'];



?>
<body>
    <h1>Accueil administrateur</h1>
	<header>
		<nav>
			<button onclick="window.location.href='comptesco.php'">Mon compte administrateur</button>
			<button>Déconnexion</button>
		</nav>
	</header>
    <br>
    <br>

    <form>
        Ici vous pouvez ajouter/créer un compte :
        <br>
        <br>

		<label for="nom">Nom :</label>
		<input type="nom" id="nom" name="nom">
        <br>

        <label for="prenom">Prénom :</label>
		<input type="prenom" id="prenom" name="prenom">
        <br>
		<label for="password">Mot de passe :</label>
		<input type="password" id="password" name="password">
		<br>
		<br>

		<d>Statut :</d>
		<select>
			<option value="professeur">Professeur</option>
			<option value="scolarite">Administrateur</option>
			<option value="etudiant">Étudiant</option>
		</select>
        <br>
        <br>

		<input type="submit" value="Créer le compte">
	</form>
<br>
<br>
    <form>
        Ici vous pouvez supprimer un compte :
        <br>
        <br>

		<label for="nom">Nom :</label>
		<input type="nom" id="nom" name="nom">
        <br>

        <label for="prenom">Prénom :</label>
		<input type="prenom" id="prenom" name="prenom">
        <br>

		<d>Statut :</d>
		<select>
			<option value="professeur">Professeur</option>
			<option value="scolarite">Administrateur</option>
			<option value="etudiant">Étudiant</option>
		</select>
        <br>
        <br>

		<input type="submit" value="Supprimer le compte">
	</form>
    <br>
    <br>

    <form>
        Demander à un étudiant de s'auto-évaluer :
        <br>
        <br>

		<label for="nom">Nom :</label>
		<input type="nom" id="nom" name="nom">
        <br>

        <label for="prenom">Prénom :</label>
		<input type="prenom" id="prenom" name="prenom">
        <br>

		<d>Matière :</d>
		<select>
			<option value="maths">Maths</option>
			<option value="physique">Physique</option>
			<option value="informatique">Informatique</option>
            <option value="electronique">Electronique</option>
		</select>
        <br>

        <d>Compétence :</d>
		<select>
			<option value="calcul">Calcul</option>
			<option value="physique">Physique</option>
			<option value="informatique">Informatique</option>
            <option value="electronique">Electronique</option>
		</select>
        <br>

        <label for="start">Date limite :</label>

        <input type="date" id="start" name="trip-start"
       value="2023-05-24"
       min="2021-01-01" max="2026-12-31">

        <br>
        <br>

		<input type="submit" value="Envoyer la demande">
	</form>

    <br>
    <br>
    <br>
    <br>
    <div id="footer"> 
        <p>© 2023 Projet WEB Dynamique: Eva, Anaé, Valentin, Trystan</p>
    </div>

</body>
	
</html>


