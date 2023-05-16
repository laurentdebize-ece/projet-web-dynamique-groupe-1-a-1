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
$prenom = $_POST['prenom'];
$login = $_POST['login'];
$password = $_POST['password'];


$requete = $bdd->prepare('INSERT INTO Etudiant (Login,Nom,Prenom,Password) VALUES (?,?,?,?)');
$requete->execute(array($login,$nom,$prenom,$password,));

?>

</html>