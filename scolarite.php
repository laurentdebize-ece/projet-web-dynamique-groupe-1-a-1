<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "projet";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="scolariteFront4.css">
    <title>OMNES My skills</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('a[href^="#"]').on('click', function(event) {
                var target = $(this.getAttribute('href'));
                if (target.length) {
                    event.preventDefault();
                    $('html, body').stop().animate({
                        scrollTop: target.offset().top
                    }, 800);
                }
            });
        });
    </script>
</head>

<body>
    <header>
        <img src="logoSite.png" alt="imageLogo">
        <h1>Accueil Scolarité</h1>
        <nav>
            <ul>
                <li><a href="#modifetudiants" class="nav-item"> Modif Etudiants</a></li>
                <li><a href="#modifprofesseurs" class="nav-item"> Modif Professeurs</a></li>
                <li><a href="#etudiant" class="nav-item">Etudiant</a></li>
                <li><a href="#professeur" class="nav-item">Professeur</a></li>
                <li><a href="#scolarite" class="nav-item"> Scolarite</a></li>
                <li><a href="#matiere" class="nav-item">Matière</a></li>
                <li><a href="#cours" class="nav-item"> Cours</a></li>

            </ul>
        </nav>
    </header>
    <div class="container">
        <button onclick="window.location.href='comptesco.php'">Compte</button>
        <button id="deco">Déconnexion</button>
    </div>

    <br>
    <div class="form-container">
        <form method="post">
            Vous pouvez ici créer un nouveau compte :
            <label for="statut">Quel statut voulez-vous créer ?</label>
            <br>
            <select name="creercomptes" id="statut">
                <option value="professeur">Professeur</option>
                <option value="scolarite">Administrateur</option>
                <option value="etudiant">Étudiant</option>
            </select>
            <br>
            <br>
            <input type="submit" id="submit" value="Créer le compte">
        </form>
    </div>

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
    <div class="form-container">
        <form method="post" action="scolarite2.php">
            Demander à un étudiant de s'auto-évaluer :
            <br>
            <br>

            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($_POST['nom'] ?? '', ENT_QUOTES); ?>" required>
            <br>
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($_POST['prenom'] ?? '', ENT_QUOTES); ?>" required>
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
    </div>
    <br>
    <br>

    <section id="etudiant">
        <p class="tabetu">
        <table class="tabetu">
            <h2>Les étudiants :</h2>
            <thead>
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Login</th>
                    <th>Password</th>
                    <th>Supprimer</th>
                    <th>Modifier</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $query = "SELECT * FROM Etudiant";
                $result = $conn->query($query);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['Prenom'] . "</td>";
                        echo "<td>" . $row['Nom'] . "</td>";
                        echo "<td>" . $row['Login'] . "</td>";
                        echo "<td>" . $row['Password'] . "</td>";
                        echo "<td><button class=\"retirer\" data-id=\"" . $row["IdEtu"] . "\">Supprimer</button></td>";
                        echo '<td><a href="modifcompteetudiant.php?id=' . $row["IdEtu"] . ' ">Modifier</a></td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan=\"6\">Aucun Etudiant.</td></tr>";
                }

                ?>
            </tbody>
        </table>
        <script>
            $(document).ready(function() {
                $(".retirer").click(function() {
                    var etu = $(this).data("id");
                    $.ajax({
                        type: "POST",
                        url: "etusupp.php",
                        data: {
                            supprimer: etu
                        },
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }

                    });
                    $(this).closest("tr").remove();
                });
            });
        </script>
        </p>
    </section>

    <section id="professeur">
        <p class="tabprof">
        <table class="tabetu">
            <h2>Les Professeurs :</h2>
            <thead>
                <tr>
                    <th>Login</th>
                    <th>Password</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Supprimer</th>
                    <th>Modifier</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $query = "SELECT * FROM Professeur";
                $result = $conn->query($query);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['Login'] . "</td>";
                        echo "<td>" . $row['Password'] . "</td>";
                        echo "<td>" . $row['Nom'] . "</td>";
                        echo "<td>" . $row['Prenom'] . "</td>";
                        echo "<td><button class=\"retirer\" data-id=\"" . $row["IdProf"] . "\">Supprimer</button></td>";
                        echo '<td><a href="modifprof.php?id=' . $row["IdProf"] . ' ">Modifier</a></td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan=\"6\">Aucun Professeur.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <script>
            $(document).ready(function() {
                $(".retirer").click(function() {
                    var prof = $(this).data("id");
                    $.ajax({
                        type: "POST",
                        url: "profsupp.php",
                        data: {
                            supprimer: prof
                        },
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }

                    });
                    $(this).closest("tr").remove();
                });
            });
        </script>
        </p>
    </section>

    <section id="scolarite">
        <p class="tabsco">
        <table class="tabetu">
            <h2> Scolarite </h2>
            <thead>
                <tr>
                    <th>Login</th>
                    <th>Password</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Supprimer</th>



                </tr>
            </thead>
            <tbody>
                <?php

                $query = "SELECT * FROM Scolarite";
                $result = $conn->query($query);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['Login'] . "</td>";
                        echo "<td>" . $row['Password'] . "</td>";
                        echo "<td>" . $row['Nom'] . "</td>";
                        echo "<td>" . $row['Prenom'] . "</td>";
                        echo "<td><button class=\"retirer\" data-id=\"" . $row["IdSco"] . "\">Supprimer</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan=\"6\">Aucun Administrateur.</td></tr>";
                }

                ?>
            </tbody>
        </table>

        <script>
            $(document).ready(function() {
                $(".retirer").click(function() {
                    var sco = $(this).data("id");
                    $.ajax({
                        type: "POST",
                        url: "scosupp.php",
                        data: {
                            supprimer: sco
                        },
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }

                    });
                    $(this).closest("tr").remove();
                });
            });
        </script>

        </p>
    </section>

    <section id="matiere">
        <p class="tabmatiere">
        <table class="tabetu">
            <h2> Matiere </h2>
            <thead>
                <tr>
                    <th>Nom Matiere</th>
                    <th>Volume Horaire</th>
                    <th>Supprimer</th>
                    <th>Modifier</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $query = "SELECT * FROM Matière";
                $result = $conn->query($query);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["NomMatiere"] . "</td>";
                        echo "<td>" . $row['NbHeures'] . " Heures" . "</td>";
                        echo "<td><button class=\"retirer\" data-id=\"" . $row["IdMatiere"] . "\">Supprimer</button></td>";
                        echo '<td><a href="modifmatiere.php?id=' . $row["IdMatiere"] . ' ">Modifier</a></td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan=\"6\">Aucune matière disponible pour l'instant.</td></tr>";
                }

                ?>
            </tbody>
        </table>
        <button onclick="window.location.href='ajoutmatiere.php'">Ajouter une Matière</button>

        <script>
            $(document).ready(function() {
                $(".retirer").click(function() {
                    var matiere = $(this).data("id");
                    $.ajax({
                        type: "POST",
                        url: "supprimermatiere.php",
                        data: {
                            supprimer: matiere
                        },
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }

                    });
                    $(this).closest("tr").remove();
                });
            });
        </script>


        </p>
    </section>


    <section id="cours">
        <p class="tabcours">
        <table class="tabetu">
            <h2> Cours </h2>
            <thead>
                <tr>
                    <th>Cours </th>
                </tr>
            </thead>
            <tbody>
                <?php

                include("ouverturebdd.php");

                $requete = $bdd->query(' SELECT Matière.NomMatiere FROM Matière INNER JOIN Cours ON Matière.IdMatiere=Cours.IDMatiere ');
                $requete2 = $bdd->query(' SELECT Professeur.Nom FROM Professeur INNER JOIN Cours ON Professeur.IdProf=Cours.IdProfesseur ');
                $requete3 = $bdd->query(' SELECT Classe.Classe FROM Classe INNER JOIN Cours ON Classe.IdClasse=Cours.IDClasse');

                echo "<tr>";
                while ($donnees = $requete->fetch()) {
                    echo "<td>" . $donnees['NomMatiere'] . "</td>";
                }
                $requete->closeCursor();
                echo "</tr>";

                echo "<tr>";

                while ($donnees = $requete2->fetch()) {
                    echo "<td>" . $donnees['Nom'] . "</td>";
                }
                $requete2->closeCursor();
                echo "</tr>";

                echo "<tr>";

                while ($donnees = $requete3->fetch()) {
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
    </section>
    <!--pop-up déconnexion-->
    <script>
        document.getElementById("deco").addEventListener("click", decOut);

        function decOut() {
            if (confirm("Êtes-vous sûr de vouloir vous déconnecter ?")) {
                /*retour page MDP*/
                window.location.href = "accueil.php";
            }
        }
    </script>

    <div id="footer">
        <p>© 2023 Projet WEB Dynamique: Eva, Anaé, Valentin, Trystan</p>
    </div>

</body>

</html>