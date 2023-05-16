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

$nom = $_POST['nom'];
$volume = $_POST['volume'];


$requete = $bdd->prepare('INSERT INTO Matière (NomMatiere,NbHeures) VALUES (?,?)');
$requete->execute(array($nom,$volume));

?>