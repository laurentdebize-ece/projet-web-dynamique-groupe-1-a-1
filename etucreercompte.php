<?php session_start();

include("ouverturebdd.php");

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$login = $_POST['login'];
$password = $_POST['password'];
$classe = $_POST['classe'];

$request = $bdd->prepare('SELECT IdClasse FROM Classe WHERE Classe = ?');
$request->execute(array($classe));
if($donnees = $request->fetch()){
    $idclasse = $donnees['IdClasse'];

}
$request->closeCursor();


$requete = $bdd->prepare('INSERT INTO Etudiant (Login,Nom,Prenom,Password,IdClasse) VALUES (?,?,?,?,?)');
$requete->execute(array($login,$nom,$prenom,$password,$idclasse));
?>

</html>