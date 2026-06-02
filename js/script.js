const modal = document.getElementById("modal");
const ouvrir = document.getElementById("ouvrirModal");
const fermer = document.getElementById("fermerModal");

ouvrir.addEventListener("click", () => {
    modal.style.display = "block";
});

fermer.addEventListener("click", () => {
    modal.style.display = "none";
});

window.addEventListener("click", (event) => {
    if (event.target === modal) {
        modal.style.display = "none";
    }
});