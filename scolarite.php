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

?>
<!--- modif test push-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="scolarite.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--<script src="scolarite.js"></script>-->
    <title>Accueil Administrateur</title>
</head>

<body>
    <h1>Accueil administrateur</h1>
    <header>
        <nav>
            <button onclick="window.location.href='comptesco.php'">Mon compte administrateur</button>
            <button>Déconnexion</button>
        </nav>
    </header>
    <br>
    <br>

    <form method="post">
        Vous pouvez ici créer un nouveau compte :
        Quel statut voulez vous créer ?
        <br>
        <label>Statut :</label>
        <select name="creercomptes">
            <option value="professeur">Professeur</option>
            <option value="scolarite">Administrateur</option>
            <option value="etudiant">Étudiant</option>
        </select>
        <br>
        <br>
        <input type="submit" id="submit" value="Créer le compte">
        <!-- <script>
            document.querySelector(".professeur").addEventListener("click", creacompteprofesseur);
            document.querySelector(".scolarite").addEventListener("click", creacomptescolarite);
            document.querySelector(".etudiant").addEventListener("click", creacompteetudiant);

            function creacompteprofesseur() {
                if (confirm("Voulez-vous créer un nouveau compte professeur ?")) {
                    window.location.href = "creacompteprofesseur.php";
                }
            }
            function creacomptescolarite() {
                if (confirm("Voulez-vous créer un nouveau compte administrateur?")) {
                    window.location.href = "creacomptescolarite.php";
                }
            }
            function creacompteetudiant() {
                if (confirm("Voulez-vous créer un nouveau compte étudiant ?")) {
                    window.location.href = "creacompteetudiant.php";
                }
            }
        </script> -->
        <?php
        $choice = isset($_POST["creercomptes"]) ? $_POST["creercomptes"] : "";
        switch ($choice) {
            case "professeur":
                header("Location:creacompteprofesseur.php");
                break;
            case "scolarite":
                header("Location:creacomptescolarite.php");
                break;
            case "etudiant":
                header("Location:creacompteetudiant.php");
                break;
        }
        ?>
    </form>
    <br>
    <br>
    <form method="post" action="scosupp.php">
        Ici vous pouvez supprimer un compte :
        <br>
        <br>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom">
        <br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom">
        <br>

        <label>Statut :</label>
        <select name="supprimercompte">
            <option value="professeur">Professeur</option>
            <option value="scolarite">Administrateur</option>
            <option value="etudiant">Étudiant</option>
        </select>
        <br>
        <br>

        <input type="submit" value="Supprimer le compte">
    </form>

    <br>
    <br>

    <form method="post" action="scolarite2.php">
        Demander à un étudiant de s'auto-évaluer :
        <br>
        <br>

        <label for="nom">Nom :</label>
        <input type="nom" id="nom" name="nom">
        <br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom">
        <br>

        <label>Matière :</label>
        <select name="choixmatiere">
            <option value="maths">Maths</option>
            <option value="physique">Physique</option>
            <option value="informatique">Informatique</option>
            <option value="electronique">Electronique</option>
        </select>
        <br>

        <label>Compétences :</label>
        <select name="choixcompetences">
            <option value="calcul">Calcul</option>
            <option value="physique">Physique</option>
            <option value="informatique">Informatique</option>
            <option value="electronique">Electronique</option>
        </select>
        <br>

        <label for="start">Date limite :</label>

        <input type="date" id="start" name="trip-start" value="2023-05-24" min="2021-01-01" max="2026-12-31">

        <br>
        <br>

        <input type="submit" value="Envoyer la demande">
    </form>
    <br>
    <br>

    <form method="get" action='modifcompteprof.php'>
        Les étudiants :
        <br>
        <table id="competences">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Classe</th>
                    <th>Modifier le profil</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td contenteditable="true">Nom 1</td>
                    <td contenteditable="true">Prénom 1</td>
                    <td contenteditable="true">Classe 1</td>
                    <td><button onclick="window.location.href='modifcompteetudiant.php'" , class="modifier">Modifier</button></td>
                </tr>
            </tbody>
        </table>
    </form>
    <br>
    <br>
    <form method="get" action='modifcompteprof.php'>
        Les professeurs :
        <br>
        <table id="competences">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Classe associée</th>
                    <th>Matière associée</th>
                    <th>Modifier le profil</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td contenteditable="true">Nom 1</td>
                    <td contenteditable="true">Prénom 1</td>
                    <td contenteditable="true">Classe 1</td>
                    <td contenteditable="true">Matière 1</td>
                    <td><button onclick="window.location.href='modifcompteprof.php'" , class="modifier">Modifier</button></td>
                </tr>
            </tbody>
        </table>
    </form>

    <br>

    <p class="tabetu">
    <table class="tabetu">
        <caption> Etudiants </caption>
        <thead>
            <tr>
                <th>Id Etudiant</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Login</th>
                <th>Password</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php

            $requete = $bdd->query(' SELECT * FROM Etudiant ');


            while ($donnees = $requete->fetch()) {
                echo "<tr>";

                echo "<td>" . $donnees['Prenom'] . "</td>";
                echo "<td>" . $donnees['Nom'] . "</td>";
                echo "<td>" . $donnees['IdEtu'] . "</td>";
                echo "<td>" . $donnees['Login'] . "</td>";
                echo "<td>" . $donnees['Password'] . "</td>";
                echo "<td><button> Supprimer </button></td>";
                echo "</tr>";
            }
            $requete->closeCursor();

            ?>
        </tbody>
    </table>
    </p>

    <br>

    <p class="tabprof">
    <table class="tabetu">
        <caption> Professeurs </caption>
        <thead>
            <tr>
                <th>Id Professeur</th>
                <th>Login</th>
                <th>Password</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
           

            $requete = $bdd->query(' SELECT * FROM Professeur ');


            while ($donnees = $requete->fetch()) {
                echo "<tr>";

                echo "<td>" . $donnees['IdProf'] . "</td>";
                echo "<td>" . $donnees['Login'] . "</td>";
                echo "<td>" . $donnees['Password'] . "</td>";
                echo "<td>" . $donnees['Nom'] . "</td>";
                echo "<td>" . $donnees['Prenom'] . "</td>";
                echo "<td><button> Supprimer </button></td>";

                echo "</tr>";
            }
            $requete->closeCursor();







            ?>
        </tbody>
    </table>
    </p>

    <br>

    <p class="tabsco">
    <table class="tabetu">
        <caption> Scolarite </caption>
        <thead>
            <tr>
                <th>Id Scolarite</th>
                <th>Login</th>
                <th>Password</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th></th>
                <th></th>


            </tr>
        </thead>
        <tbody>
            <?php

            $requete = $bdd->query(' SELECT * FROM Scolarite ');


            while ($donnees = $requete->fetch()) {
                echo "<tr>";

                echo "<td>" . $donnees['IdSco'] . "</td>";
                echo "<td>" . $donnees['Login'] . "</td>";
                echo "<td>" . $donnees['Password'] . "</td>";
                echo "<td>" . $donnees['Nom'] . "</td>";
                echo "<td>" . $donnees['Prenom'] . "</td>";
                echo "<td><button> Supprimer </button></td>";
                echo "</tr>";
            }
            $requete->closeCursor();



            ?>
        </tbody>
    </table>
    </p>
    <br>
    <p class="tabmatiere">
    <table class="tabetu">
        <caption> Matiere </caption>
        <thead>
            <tr>
                <th>Nom Matiere</th>
                <th>Volume Horaire</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php

            $requete = $bdd->query(' SELECT * FROM Matière ');

            while ($donnees = $requete->fetch()) {
                echo "<tr>";

                echo "<td>" . $donnees['NomMatiere'] . "</td>";
                echo "<td>" . $donnees['NbHeures'] . " Heures" . "</td>";
                echo "<td><button class=\"retirermatiere\" data-id=\"" . $donnees["NomMatiere"] . "\">Supprimer</button></td>";
                echo "</tr>";
            }
            $requete->closeCursor();



            ?>
        </tbody>
    </table>
    <button onclick="window.location.href='ajoutmatiere.php'">Ajouter une Matière</button>
    <script>
        $(document).ready(function() {
            $(".retirermatiere").click(function() {
                var competences = $(this).data("id");
                $(this).closest("tr").remove();
                $.ajax({
                    url: "supprimermatiere.php",
                    type: "POST",
                    data: {
                        Supprimer: Matière
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
    </p>
    <br>

    <p class="tabcours">
    <table class="tabetu">
        <thead>
            <tr>
                <th>Cours </th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
           


            $requete = $bdd->query(' SELECT Matière.NomMatiere FROM Matière INNER JOIN Cours ON Matière.IdMatiere=Cours.IDMatiere ');
            $requete2 = $bdd->query(' SELECT Professeur.Nom FROM Professeur INNER JOIN Cours ON Professeur.IdProf=Cours.IdProfesseur ');
            $requete3 = $bdd->query(' SELECT Classe.Classe FROM Classe INNER JOIN Cours ON Classe.IdClasse=Cours.IDClasse');

            echo "<tr>";
            while($donnees = $requete->fetch()) {
                echo "<td>" . $donnees['NomMatiere'] . "</td>";
            }
            $requete->closeCursor();
            echo "</tr>";

            echo "<tr>";

            while($donnees = $requete2->fetch()) {
                echo "<td>" . $donnees['Nom'] . "</td>";
            }
            $requete2->closeCursor();
            echo "</tr>";

            echo "<tr>";

            while($donnees = $requete3->fetch()) {
                echo "<td>" . $donnees['Classe'] . "</td>";
            }
            $requete3->closeCursor();
            
                
            
            echo "</tr>";


            ?>
        </tbody>
    </table>
    <button onclick="window.location.href='ajoutcours.php'">Affecter un Professeur à une Matiere</button>
    <button onclick="window.location.href='ajoutcoursetu.php'">Affecter un Etudiant à une Matiere</button>

    </p>


    <br>
    <br>
    <br>
    <br>
    <div id="footer">
        <p>© 2023 Projet WEB Dynamique: Eva, Anaé, Valentin, Trystan</p>
    </div>

</body>

</html>