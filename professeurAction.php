$(document).ready(function() {
    $("#ajout").click(function() {
      var html = "<tr>" +
        "<td contenteditable='true'></td>" +
        "<td contenteditable='true'></td>" +
        "<td contenteditable='true'></td>" +
        "<td><button class='demander'>Envoyer la demande</button></td>"+
        "<td><button class='validation'>Valider</button></td>"+
        "<td><button class='retirer'>Supprimer</button></td>"+
        "</tr>";
      $("#competences tbody").append(html);
    });
    $(document).on("click", ".retirer", function() {
      $(this).closest("tr").remove();
    });
  });
  