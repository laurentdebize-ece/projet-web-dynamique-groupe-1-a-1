<?php 
include("ouverturebdd.php");


$competence = isset($_POST["nom"])? $_POST["nom"] : "";
$classe = isset($_POST["classe"])? $_POST["classe"] : "";
$matiere = isset($_POST["matiere"])? $_POST["matiere"] : "";
$requete = $bdd->prepare(' SELECT IdMatiere FROM Matière WHERE NomMatiere = ? ');
$requete->execute(array($matiere));

if($donnees = $requete->fetch()) {
    $idmatiere = $donnees['IdMatiere'];
}


$requete->closeCursor();
$requetee = $bdd->prepare(' SELECT IdClasse FROM Classe WHERE Classe = ? ');
$requetee->execute(array($classe));
if($donnees = $requetee->fetch()) {
    $idclasse = $donnees['IdClasse'];
}

$requetee->closeCursor();
$requet = $bdd->prepare( 'INSERT INTO Competence (NomCom,IdClasse,IdMatiere) VALUES (?, ?, ?)');
$requet->execute(array($competence,$idclasse,$idmatiere));
header("Location: professeurTab.php");
exit();
?>
