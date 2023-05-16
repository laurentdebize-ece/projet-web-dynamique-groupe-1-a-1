<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="creacomptescolarite.css">
    <title>Ajout Cours</title>
</head>

<?php try {

    $bdd = new PDO(
        'mysql:host=localhost;dbname=projet;
  charset=utf8',
        'root',
        'root',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>

<body>
    <h1>Création d'un nouveau Cours</h1>
    <form method="post" action="ajoutcours2.php">

        <label>Matiere :</label>
        <?php
        $requete = $bdd->query('SELECT * FROM Matière ');

        echo '<select name="matiere">';
            while ($donnees = $requete->fetch()) {
                echo '<option value="'.$donnees['NomMatiere'].'">'.$donnees['NomMatiere'].'</option>';
            
            }
        $requete->closeCursor();
        echo '</select>';
        ?>
        <br>

        <label>Professeur :</label>
        <?php
        $requete = $bdd->query('SELECT Nom FROM Professeur');

        echo '<select name="nomprofesseur">';
            while ($donnees = $requete->fetch()) {
                echo '<option value="'.$donnees['Nom'].'">'.$donnees['Nom'].'</option>';
            
            }
        $requete->closeCursor();
        echo '</select>';
        ?>

        <label>Professeur :</label>
        <?php
        $requete = $bdd->query('SELECT Prenom FROM Professeur');

        echo '<select name="prenomprofesseur">';
            while ($donnees = $requete->fetch()) {
                echo '<option value="'.$donnees['Prenom'].'">'.$donnees['Prenom'].'</option>';
            
            }
        $requete->closeCursor();
        echo '</select>';
        ?>

        <br>
        

        <input type="submit" value="Affecter ce prof a cette matiere">

    </form>
    <button onclick="window.location.href='scolarite.php'">Retour</button>

</body>



</html>