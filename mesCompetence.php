<!DOCTYPE html>
<html>

<head>
    <title>OMNES MySkills</title>
    <link rel="stylesheet" type="text/css" href="mesCompetence.css">
</head>

<body>
    <header>
        <img src="logoSite.png" alt="imageLogo">
        <h1>Mes compétences</h1>
        <div class="statut">
            <label>Catégorie</label>
            <select>
                <option value="matiere">Matière</option>
                <option value="decroissant">Professeur</option>
            </select>
        </div>
        <div class="choixOrdre">
            <label>Ordre Tableau</label>
            <select>
                <option value="croissant">Ordre Croissant</option>
                <option value="decroissant">Ordre Decroissant</option>
                <option value="Datecroissante">Date Croissante</option>
                <option value="Datedecroissant">Date Decroissant</option>
            </select>
        </div>
        <div class="statutCompetence">
            <label>Notes</label>
            <select>
                <option value="acquis">Acquis</option>
                <option value="enCours">En cours d'acquistion</option>
                <option value="NonAcquis">Non Acquis</option>
            </select>
        </div>
        <button onclick="window.location.href='etudiant.php'">Retour</button>
    </header>
</body>
</html>