<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="accueil2.css">
    <title>Omnes MySkills</title>
</head>

<body>
    <!-- <img src="logoSite.png" alt="imageLogo"> -->
    <div class="form-container">
        <form method="post" action=" ">
            <h1>OMNES MySkills</h1>
            <br>
            <label for="nbmdp">Combien de mot de passe voulez vous générer ? : </label>
            <input type="number" name="nbmdp" id="nbmdp">
            <br>

            <input type="submit" value="Generer">

        </form>
    </div>

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "projet";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    $nombreMotsDePasse = isset($_POST["nbmdp"]) ? $_POST["nbmdp"] : "";


    function generateRandomPassword()
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $password = '';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < 3; $i++) {
            $password .= $characters[rand(0, $charactersLength - 1)];
        }
        return $password;
    }

    $randomPassword = generateRandomPassword();
    //echo $randomPassword;
    $sql = "UPDATE Etudiant SET Password ='$randomPassword' WHERE IdEtu = 8";

    if ($conn->query($sql) === TRUE) {
        echo "Le mot de passe aléatoire a été inséré avec succès dans la base de données.";
    } else {
        echo "Erreur lors de l'insertion du mot de passe aléatoire : " . $conn->error;
    }



    $conn->close();



    ?>
</body>

</html>