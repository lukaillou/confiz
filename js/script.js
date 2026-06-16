/* =================== */
/* GET DATA */
/* =================== */
/*
Récupère les confiseries depuis la base de données via l'API PHP
*/
async function getConfiseries() {
    const requestURL = '../bdd/api.php';
    const request = new Request(requestURL);
    const response = await fetch(request);
    const confiseries = await response.json();
    return confiseries;
}

/* Les confiseries depuis l'API */
const CONFISERIES = await getConfiseries();
console.log(CONFISERIES);



const modal = document.getElementById("modal");
const ouvrir = document.getElementById("ouvrirModal");
const fermer = document.getElementById("fermerModal");

ouvrir.addEventListener("click", () => {
    modal.style.display = "flex";
});

fermer.addEventListener("click", () => {
    modal.style.display = "none";
});

window.addEventListener("click", (event) => {
    if (event.target === modal) {
        modal.style.display = "none";
    }
});