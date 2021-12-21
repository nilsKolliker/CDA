var listMenu=document.querySelectorAll(".menu");
listMenu.forEach(element => {
    element.addEventListener("click",touchAuMenu);
});
var listSousMenu = document.querySelectorAll(".sousMenu");

function touchAuMenu(e){
    fermerLesSousMenus();
    afficheMenu(e);
}

//affiche les sous menus si ils sont caché, les cache si afficher, dépend de la structure de la page
function afficheMenu(e) {
    e.target.parentNode.parentNode.querySelectorAll(".sousMenu").forEach(element => {
        element.style.display="flex" 
    });
    e.target.parentNode.parentNode.querySelector("i").style.color="white";
}

function fermerLesSousMenus(){
    listSousMenu.forEach(element => {
        element.style.display="none"; 
    });
    listMenu.forEach(element => {
        element.querySelector("i").style.color="black";
    });
}
