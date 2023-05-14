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
            $order = "DateLimite ASC";
            break;
        case 'Datedecroissant':
            $order = "DateLimite DESC";
            break;
        default:
            $order = "NomCom ASC";
            break;
    }
} else {
    $order = "NomCom ASC";
}

$sql = "SELECT NomCom, DateLimite, ClasseConcerné FROM competence ORDER BY $order";
echo $sql; // pour afficher la requête SQL

?>