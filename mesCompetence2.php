<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMNES Mys skills</title>
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
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "projet";
$conn = new mysqli($servername, $username, $password, $dbname);

$order = "";
//echo $_POST["select"];

if (isset($_POST["select"])) {
    switch ($_POST["select"]) {
        case "croissant":
            $order = "NomCom ASC";
            break;
        case "decroissant":
            $order = "NomCom DESC";
            break;
        case "Datecroissante":
            $order = "DateLimite ASC";
            break;
        case "Datedecroissant":
            $order = "DateLimite DESC";
            break;
        default:
            $order = "NomCom ASC";
            break;
    }
} else {
    $order = "NomCom ASC";
}
echo $order;
$sql = "SELECT * FROM Competence ORDER BY  '$order' " ;
$result = $conn->query($sql);



?>