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
$idprof = $_POST['idprof'];
$classe=$_POST['classe'];

$requete = $bdd->prepare('INSERT INTO Professeur (IdProf,Login,Password,Nom,Prenom,Classe) VALUES (?,?,?,?,?,?)');
$requete->execute(array($idprof,$login,$password,$nom,$prenom,$classe));

?>
