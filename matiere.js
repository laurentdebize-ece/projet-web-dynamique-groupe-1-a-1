document.getElementById("Elec").addEventListener("click", popMatiere);
document.getElementById("Info").addEventListener("click", popMatiere);
document.getElementById("Math").addEventListener("click", popMatiere);
document.getElementById("Physique").addEventListener("click", popMatiere);

function popMatiere() {
    if (confirm("Voulez-vous voir vos compétences dans cette matière ?")) {
        window.location.href = "mesCompetence.php";
    }
}