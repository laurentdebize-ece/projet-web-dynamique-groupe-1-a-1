<?php

session_start();
include("ouverturebdd.php");

$login = isset($_POST["login"]) ? $_POST["login"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";
$newpassword = isset($_POST["newpassword"]) ? $_POST["newpassword"] : "";

$statut = isset($_POST["statut"]) ? $_POST["statut"] : "";




switch ($statut) {
    case 'prof':
        $requete = $bdd->prepare('SELECT * FROM Professeur WHERE Login =  ? AND Password = ? ');
        $requete->execute(array($login, $password));
        if ($donnees = $requete->fetch()) {
            $_SESSION['Prenom'] = $donnees['Prenom'];
            $_SESSION['Nom'] = $donnees['Nom'];
            $_SESSION['Id'] = $donnees['IdProf'];
            $idprof = $donnees['IdProf'];
            $requete->closeCursor();
        } else {
            header("Location: accueilfirst.php?error=2"); 
            exit;
        }
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $newpassword;
        $requete = $bdd->prepare('UPDATE Professeur SET Password = ? WHERE IdProf = ?  ');
        $requete->execute(array($newpassword, $idprof));
        header("Location: pageAccueilProf.php");
        break;
    case 'sco':
        $requete = $bdd->prepare('SELECT * FROM Scolarite WHERE Login =  ? AND Password = ? ');
        $requete->execute(array($login, $password));
        if ($donnees = $requete->fetch()) {

            $_SESSION['Prenom'] = $donnees['Prenom'];
            $_SESSION['Nom'] = $donnees['Nom'];
            $_SESSION['Id'] = $donnees['IdSco'];
            $idsco = $donnees['IdSco'];
            $requete->closeCursor();
        } else {
            header("Location: accueilfirst.php?error=2");
            exit;
        }
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $newpassword;
        $requete = $bdd->prepare('UPDATE Scolarite SET Password = ? WHERE IdSco = ?  ');
        $requete->execute(array($newpassword, $idsco));
        header("Location: scolarite.php");
        break;
    case 'etud':
        $requete = $bdd->prepare('SELECT * FROM Etudiant WHERE Login =  ? AND Password = ? ');
        $requete->execute(array($login, $password));

        if ($donnees = $requete->fetch()) {
            $_SESSION['Prenom'] = $donnees['Prenom'];
            $_SESSION['Nom'] = $donnees['Nom'];
            $_SESSION['Classe'] = $donnees['IdClasse'];
            $_SESSION['Id'] = $donnees['IdEtu'];
            $idetu = $donnees['Id'];
            
            $requete->closeCursor();
        } else {
            header("Location: accueilfirst.php?error=2");
            exit;
        }
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $newpassword;
        $requete = $bdd->prepare('UPDATE Etudiant SET Password = ? WHERE IdEtu = ?  ');
        $requete->execute(array($newpassword, $idetu));
        header("Location: etudiant.php");
        break;
}

?>