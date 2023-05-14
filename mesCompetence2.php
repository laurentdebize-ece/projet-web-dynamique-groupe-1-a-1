
<?php
session_start();

try {

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



$order = "";
//echo $_POST["select"];

if (isset($_POST["select"])) {
    switch ($_POST["select"]) {
        /*case 'matiere':
            $order = ""*/
        case 'croissant':
            $order = "NomCom ASC";
            break;
        case 'decroissant':
            $order = "NomCom DESC";
            break;
        case 'Datecroissante':
            $order = "Datelimite ASC";
            break;
        case 'Datedecroissant':
            $order = "Datelimite DESC";
            break;
        default:
            $order = "NomCom ASC";
            break;
    }
} else {
    $order = "NomCom ASC";
}
echo $order;
$sql = "SELECT * FROM Competence ORDER BY $order"; ;
$result = $bdd->query($sql);


if ($result->rowCount() > 0) {
    while ($row = $result->fetch()) {
        echo "<tr>";
        echo "<td>" . $row["NomCom"] . "</td>";
        echo "<td>" . $row["Datemlimite"] . "</td>";
        echo "<td>" . $row["ClasseConcerné"] . "</td>";
        echo "<td><button class=\"demande\">Demander auto-évaluation</button></td>";
        echo "<td><button class=\"demande\">Valider la compétence</button></td>";
        echo "<td><button class=\"retirer\" data-id=\"" . $row["NomCom"] . "\">Supprimer</button></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan=\"6\">Aucune compétence disponible pour l'instant.</td></tr>";
}
?>