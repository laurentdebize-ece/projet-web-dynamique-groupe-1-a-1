<?php 

$servername="localhost";
$username="root";
$password="root";
$conn=new mysqli($servername,$username,$password);

// Récupération des données binaires (BLOB) de l'image depuis la base de données
$query = "SELECT Image FROM Matière WHERE IdMatiere = 2"; // Remplacez 1 par l'ID de l'enregistrement contenant l'image
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imageData = $row['Image'];

    // Création d'une ressource d'image à partir des données binaires
    $image = imagecreatefromstring($imageData);


    // Affichage de l'image dans le navigateur
    header('Content-Type: image/jpeg'); // Remplacez "image/jpeg" par le type MIME approprié de votre image
    imagejpeg($image);
    imagedestroy($image);

} else {
    echo 'Aucune image trouvée.';
}
