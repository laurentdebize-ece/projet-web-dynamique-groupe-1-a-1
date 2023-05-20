<?php include("ouverturebdd.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="FormComp.css">
    <title>Informations sur la compétence :</title>
</head>

<body>
    <form action="ActionAjoutComp.php" method="post">

        <label for="nom">Nom de la compétences</label>
        <input type="text" id="nom" name="nom" required><br><br>
        <label>Classe concernée:</label><br>
        <?php
        $requete = $bdd->query('SELECT Classe FROM Classe ');

        echo '<select name="classe">';
        while ($donnees = $requete->fetch()) {
            echo '<option value="' . $donnees['Classe'] . '">' . $donnees['Classe'] . '</option>';
        }
        $requete->closeCursor();
        echo '</select>';
        ?>

        <br>

        <label>Matiere :</label>
        <?php
        $requete = $bdd->query('SELECT * FROM Matière ');

        echo '<select name="matiere">';
        while ($donnees = $requete->fetch()) {
            echo '<option value="' . $donnees['NomMatiere'] . '">' . $donnees['NomMatiere'] . '</option>';
        }
        $requete->closeCursor();
        echo '</select>';
        ?>

        <br>

        <input type="submit" value="Soumettre">
    </form>
</body>

</html>