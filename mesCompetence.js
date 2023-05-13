$(document).ready(function() {
    $("#select").change(function() {
        var value = $(this).val();

        if (value == "Datecroissante") {
            $.ajax({
                url: "TabComp.php",
                type: "POST",
                data: { tri: "DateLimite ASC" },
                success: function(response) {
                    $("tbody").html(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        } else {
            location.reload();
        }
    });
});
