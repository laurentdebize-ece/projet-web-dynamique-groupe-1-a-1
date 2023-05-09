<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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

$login = $_POST['login'];
$password = $_POST['password'];
$_SESSION['login'] = $login;
$_SESSION['password'] = $password;

switch ($_POST['statut']) {
    case 'prof':
        $requete = $bdd->prepare('SELECT * FROM Professeur WHERE Login =  ? AND Password = ? ');
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
        header("Location: professeur.php");
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
        $requete = $bdd->prepare('SELECT * FROM Etudiant WHERE LoginEtu =  ? AND Password = ? ');
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