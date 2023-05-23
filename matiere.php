<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="matiere2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="matiere.js"></script>
    <title>OMNES MySkills</title>
</head>
<body>
    <header>
        <img src="logoSite.png" alt="imageLogo" style="width:100px">
        <h1>Mes Matières</h1>
        <button onclick="window.location.href='etudiant.php'">Retour</button>
    </header>
    <!-- Carousel -->
    <div id="carou" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carou" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carou" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carou" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#carou" data-bs-slide-to="3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="Matiere_Electronique.jpg" alt="Elec" class="d-block">
                <img id="Elec" src="Matiere_Electronique.jpg" alt="Elec" class="d-block">
            </div>
            <div class="carousel-item">
                <img id="Info" src="Matiere_Info.jpg" alt="Info" class="d-block">
            </div>
            <div class="carousel-item">
                <img id="Math" src="Matiere_Math2.jpg" alt="Math" class="d-block">
            </div>
            <div class="carousel-item">
                <img id="Physique"src="Matiere_Physique.jpg" alt="Physique" class="d-block">
            </div>
        </div>
        <script>
            document.getElementById("Elec").addEventListener("click", popMatiere);
            document.getElementById("Info").addEventListener("click", popMatiere);
            document.getElementById("Math").addEventListener("click", popMatiere);
            document.getElementById("Physique").addEventListener("click", popMatiere);
            function popMatiere() {
                if (confirm("Voulez-vous voir vos compétences dans cette matière ?")) {
                    window.location.href = "mesCompetence.php";
                }
            }
        </script>
        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carou" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carou" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    <div id="footer">
        <p>© 2023 Projet WEB Dynamique: Eva, Anaé, Valentin, Trystan</p>
    </div>
</body>
</html