<!DOCTYPE html>
<html>
<head>
    <title>Exemple Ajax</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#monBouton").click(function() {
                $.ajax({
                    url: "traitement.php",
                    method: "POST",
                    data: {
                        // Données supplémentaires à envoyer avec la requête
                        param1: "valeur1",
                        param2: "valeur2"
                    },
                    success: function(response) {
                        // Action effectuée avec succès
                        console.log(response);
                        // Autres actions à effectuer avec la réponse
                    },
                    error: function(xhr, status, error) {
                        // Erreur lors de la requête
                        console.error(error);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <button id="monBouton">Cliquez ici</button>
</body>
</html>
