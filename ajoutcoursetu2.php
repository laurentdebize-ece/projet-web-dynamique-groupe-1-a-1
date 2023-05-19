<?php session_start();
include("ouverturebdd.php");

    $matiere = isset($_POST["matiere"]) ? $_POST["matiere"] : "";
    $etu = isset($_POST["etu"]) ? $_POST["etu"] : "";

    
    $requete = $bdd->prepare(' SELECT IdMatiere FROM Matière WHERE NomMatiere = ? ');
    $requete->execute(array($matiere));

    if($donnees = $requete->fetch()) {
        $idmatiere = $donnees['IdMatiere'];
    }
    $requete->closeCursor();

    
    $requete = $bdd->prepare(' SELECT * FROM Etudiant WHERE Nom = ? ');
    $requete->execute(array($etu));

    if($donnees = $requete->fetch()) {
        $idetu = $donnees['IdEtu'];
        $idclasse = $donnees['IdClasse'];
    }
    $requete->closeCursor();


    $requete = $bdd->prepare(' SELECT * FROM Classe WHERE IdClasse = ? ');
    $requete->execute(array($idclasse));

    if($donnees = $requete->fetch()) {
        $classe = $donnees['Classe'] ; 
        $idprof = $donnees['IdProfesseur'];
        
    }
    $requete->closeCursor();

   


    echo "La classe de cet etudiant est : " . $classe ;


    $requete = $bdd->prepare('INSERT INTO Cours (IDClasse,IDMatiere,IdProfesseur) VALUES (?,?,?)');
    $requete->execute(array($idclasse,$idmatiere,$idprof));

?>