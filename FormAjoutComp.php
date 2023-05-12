<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="FormComp.css">
    <title>Informations sur la compétence :</title>
</head>
<body>
    <form action="ActionAjoutComp.php" method="post">
        <label for="nom">Nom de la compétences</label>
        <input type="text" id="nom" name="nom" required><br><br>
        <label for="date">Date limite si nécessaire :</label>
        <input type="date" id="date" name="date" required><br><br>
        <label>Classe concernée:</label><br>
        <input type="radio" id="ING1" name="classe" value="ING1" required>
        <label for="ING1">ING1</label><br>
        <input type="radio" id="ING2" name="classe" value="ING2" required>
        <label for="ING2">ING2</label><br>
        <input type="radio" id="ING3" name="classe" value="ING3" required>
        <label for="ING3">ING3</label><br>
        <input type="submit" value="Soumettre">
    </form>
</body>
</html>