<?php session_start();
include("ouverturebdd.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="scolariteFront3.css">
    <title>OMNES My skills</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
    <div class="form-container">
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
    </div>
    <br>
    <br>

    <div class="form-container">
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
    </div>
    <br>
    <br>


    <div class="col-container">
        <div class="col1">
            <section id="modifetudiants">
                <form method="get" action='modifcompteetudiant.php'>
                    <h2> Modification Etudiants :</h2>
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
            </section>
        </div>
        <div class="col2">
            <section id="modifprofesseurs">
                <form method="get" action='modifcompteprof.php'>
                    <h2>Modification professeurs :</h2>
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
            </section>
        </div>
    </div>

    <section id="etudiant">
        <p class="tabetu">
        <table class="tabetu">
            <h2>Les étudiants :</h2>
            <thead>
                <tr>
                    <th>Id Etudiant</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Login</th>
                    <th>Password</th>
                    <th>Supprimer</th>
                    <th>Modifier</th>
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
                    echo '<td><a href="modifcompteetudiant.php?id=' . $donnees['IdEtu'] . '">Modifier</a></td>';

                    echo "</tr>";
                }
                $requete->closeCursor();
                ?>
            </tbody>
            </table>
        </p>
    </section>


    <section id="professeur">
        <p class="tabprof">
        <table class="tabetu">
            <h2>Les Professeurs :</h2>
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
                    echo '<td><a href="modifcompteprof.php?id=' . $donnees['IdEtu'] . '">Modifier</a></td>';

                    echo "</tr>";
                }
                $requete->closeCursor();
                ?>
            </tbody>
        </table>
        </p>
    </section>

    <section id="scolarite">
        <p class="tabsco">
        <table class="tabetu">
            <h2> Scolarite </h2>
            <thead>
                <tr>
                    <th>Id Scolarite</th>
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

                $requete = $bdd->query(' SELECT * FROM Matière ');

                while ($donnees = $requete->fetch()) {
                    echo "<tr>";

                    echo "<td>" . $donnees['NomMatiere'] . "</td>";
                    echo "<td>" . $donnees['NbHeures'] . " Heures" . "</td>";
                    echo "<td><button class=\"retirermatiere\" data-id=\"" . $donnees["NomMatiere"] . "\">Supprimer</button></td>";
                    echo "<td><button> Modifier </button></td>";
                    echo "</tr>";
                }
                $requete->closeCursor();



                ?>
            </tbody>
        </table>
        <button onclick="window.location.href='ajoutmatiere.php'">Ajouter une Matière</button>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script>
            $(document).ready(function() {
                $(".retirermatiere").click(function() {
                    var matiere = $(this).data("id");
                    var trElement = $(this).closest("tr");

                    $.ajax({
                        url: "supprimermatiere.php",
                        type: "POST",
                        data: {
                            supprimer: matiere
                        },
                        success: function(response) {
                            console.log(response);

                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            trElement.remove();
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

    <br>
    <div id="footer">
        <p>© 2023 Projet WEB Dynamique: Eva, Anaé, Valentin, Trystan</p>
    </div>

</body>

</html>