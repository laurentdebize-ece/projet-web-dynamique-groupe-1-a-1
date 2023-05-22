<?php session_start();
include("ouverturebdd.php");


$login = isset($_POST["login"])? $_POST["login"] : "";
$password = isset($_POST["password"])? $_POST["password"] : "";
$statut = isset($_POST["statut"])? $_POST["statut"] : "";

$_SESSION['Login'] = $login;
$_SESSION['Password'] = $password;

switch ($statut) {
    case 'prof':
        $requete = $bdd->prepare('SELECT * FROM professeur WHERE Login =  ? AND Password = ? ');
        $requete->execute(array($login, $password));
        if ($donnees = $requete->fetch()) {
            $_SESSION['Prenom'] = $donnees['Prenom'];
            $_SESSION['Nom'] = $donnees['Nom'];
            $_SESSION['Login'] = $login;
            $_SESSION['Password'] = $password;
            $requete->closeCursor();
            header("Location: pageAccueilProf.php");
        } else {
            header("Location: accueil2.php?error=1");
            exit;
        }
        break;
    case 'sco':
        $requete = $bdd->prepare('SELECT * FROM Scolarite WHERE Login =  ? AND Password = ? ');
        $requete->execute(array($login, $password));
        if ($donnees = $requete->fetch()) {
        ?>
            <p>
                Prenom : <?php echo $donnees['Prenom']; ?>
                Nom : <?php echo $donnees['Nom']; ?>

            </p>

        <?php
        $_SESSION['Prenom'] = $donnees['Prenom'];
        $_SESSION['Nom'] = $donnees['Nom'];
        $requete->closeCursor();
        } 

        else {
            header("Location: accueil2.php?error=1");
            exit;
        }
        header("Location: scolarite.php");
        break;
    case 'etud':
        $requete = $bdd->prepare('SELECT * FROM Etudiant WHERE Login =  ? AND Password = ? ');
        $requete->execute(array($login, $password));
        if ($donnees = $requete->fetch()) {
        ?>
            <p>
                Prenom : <?php echo $donnees['Prenom']; ?>
                Nom : <?php echo $donnees['Nom']; ?>

            </p>

        <?php
        $_SESSION['Prenom'] = $donnees['Prenom'];
        $_SESSION['Nom'] = $donnees['Nom'];

        $requete->closeCursor();
        } 
        else {
            header("Location: accueil2.php?error=1");
            exit;
        }
        header("Location: etudiant.php");
        break;
}

?>