<?php session_start();

include("ouverturebdd.php");

$login = isset($_POST["login"]) ? $_POST["login"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";
$statut = isset($_POST["statut"]) ? $_POST["statut"] : "";



switch ($statut) {
    case 'prof':
        $requete = $bdd->prepare('SELECT * FROM professeur WHERE Login =  ? AND Password = ? ');
        $requete->execute(array($login, $password));
        if ($donnees = $requete->fetch()) {

            $_SESSION['Prenom'] = $donnees['Prenom'];
            $_SESSION['Nom'] = $donnees['Nom'];
            $_SESSION['Id'] = $donnees['IdProf'];

            $requete->closeCursor();
        } else {
            header("Location: accueil.php?error=1");
            exit;
        }
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        header("Location: pageAccueilProf.php");
        break;
    case 'sco':
        $requete = $bdd->prepare('SELECT * FROM Scolarite WHERE Login =  ? AND Password = ? ');
        $requete->execute(array($login, $password));
        if ($donnees = $requete->fetch()) {
            $_SESSION['Prenom'] = $donnees['Prenom'];
            $_SESSION['Nom'] = $donnees['Nom'];
            $_SESSION['Id'] = $donnees['IdSco'];
            $requete->closeCursor();
        } else {
            header("Location: accueil.php?error=1");
            exit;
        }
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        header("Location: scolarite.php");
        break;
    case 'etud':
        $requete = $bdd->prepare('SELECT * FROM Etudiant WHERE Login =  ? AND Password = ? ');
        $requete->execute(array($login, $password));
        if ($donnees = $requete->fetch()) {
       
            $_SESSION['Prenom'] = $donnees['Prenom'];
            $_SESSION['Nom'] = $donnees['Nom'];
            $_SESSION['Id'] = $donnees['IdEtu'];

            $requete->closeCursor();
        } else {
            header("Location: accueil.php?error=1");
            exit;
        }
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        header("Location: etudiant.php");
        break;
}

?>