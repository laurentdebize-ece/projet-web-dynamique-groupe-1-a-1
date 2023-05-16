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
$statut = $_POST['supprimercompte'];

switch ($statut) {
    case 'professeur':
        $requete = $bdd->prepare('DELETE FROM Professeur WHERE Nom= ? AND Prenom = ?');
        $requete->execute(array($nom, $prenom));

        break;
    case 'scolarite':

        $requete = $bdd->prepare('DELETE FROM Scolarite WHERE Nom=? ');
        $requete->execute(array($nom));
        break;
    case 'etudiant':

        $requete = $bdd->prepare('DELETE FROM Etudiant WHERE Nom= ? ');
        $requete->execute(array($nom));

        break;
}


?>
