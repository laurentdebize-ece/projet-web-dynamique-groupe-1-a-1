<?php

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

    $matiere = isset($_POST["matiere"]) ? $_POST["matiere"] : "";
    $prof = isset($_POST["prof"]) ? $_POST["prof"] : "";

    
    $requete = $bdd->prepare(' SELECT IdMatiere FROM Matière WHERE NomMatiere = ? ');
    $requete->execute(array($matiere));

    if($donnees = $requete->fetch()) {
        $idmatiere = $donnees['IdMatiere'];
    }
    $requete->closeCursor();

    
    $requete = $bdd->prepare(' SELECT * FROM Professeur WHERE Nom = ? ');
    $requete->execute(array($prof));

    if($donnees = $requete->fetch()) {
        $idprof = $donnees['IdProf'];
    }
    $requete->closeCursor();


    $requete = $bdd->prepare(' SELECT * FROM Classe WHERE IdProfesseur = ? ');
    $requete->execute(array($idprof));

    if($donnees = $requete->fetch()) {
        $classe = $donnees['Classe'] ; 
        $idclasse = $donnees['IdClasse'];    
    }
    $requete->closeCursor();

   


    echo "La classe de ce professeur est : " . $classe ;


    $requete = $bdd->prepare('INSERT INTO Cours (IDClasse,IDMatiere,IdProfesseur) VALUES (?,?,?)');
    $requete->execute(array($idclasse,$idmatiere,$idprof));

    



?>