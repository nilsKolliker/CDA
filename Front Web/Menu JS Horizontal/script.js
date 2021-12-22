var sousMenuOuvert; // stocke l'ement de sousMenuOuvert
var sousMenuItemActive // stocke le sous menu actif
var nav=document.querySelector("nav");//stocke la nav
var iconeBurger=nav.querySelector("i");//stoke l'icone du menu
var burgerOuvert=false;//stoke si le menu burger est ouver ou non

var premiereSection=getElementsById("section1")

// se déclanche au scroll
window.onscroll = function (e) {
    if(premiereSection.scrollHeight - premiereSection.scrollTop === premiereSection.clientHeight)
    
} 

// on gère le survol et le clic des menus
var listeMenus = document.getElementsByClassName("menu");
for (let i = 0; i < listeMenus.length; i++) {
    listeMenus[i].addEventListener("click", clickMenu);
    listeMenus[i].addEventListener("mouseover", clickMenu);
    /* on ferme les menus quand on quitte un menu */
    listeMenus[i].addEventListener("mouseleave", fermeMenu);
}

// on gère le survol et le clic des sous menus
var listeSousMenus = document.querySelectorAll("nav .sousMenuItem");
listeSousMenus.forEach(element => {
    element.addEventListener("click", clickSousMenu);
    element.addEventListener("mouseover", clickSousMenu);
});

// on recupère le clique sur l'icone du menu
var titreMenu = document.querySelector(".titreNav");
titreMenu.addEventListener("click", clickTitreMenu);

//on recupère le clique sur la page pour couper le menu si clique à coté
document.addEventListener("click",cliqueSurLaPage);


function fermeMenu(event) {
    if (sousMenuItemActive != undefined) {
        sousMenuItemActive.classList.remove("sousMenuItemActive");
        sousMenuItemActive = undefined;
    }
    if (sousMenuOuvert != undefined && sousMenuOuvert != event.target.parentNode.parentNode) {
        sousMenuOuvert.previousElementSibling.classList.remove("menuItemActive");
        sousMenuOuvert.style.display = "none";
        sousMenuOuvert = undefined;
    }
}

/**
 * méthode qui gère le changement d'affichage des menus lors du survol ou du clic
 * @param {*} event  evenement qui a déclenché l'action
 */
function clickMenu(event) {
    // si on vient d'un menuItem
    if (event.target.classList.contains("menuItem")) {
        var menuClique = event.target.parentNode;
        var sousMenu = menuClique.querySelector(".sousMenu");
        /* Changer la couleur du menu sélectionné */
        event.target.classList.add("menuItemActive")
    } else { // on a cliqué sur un sousMenuItem
        sousMenu = event.target.parentNode.parentNode;
    }

    /* Fermer le sousMenu ouvert s'il est différent du menu à ouvrir*/
    if (sousMenuOuvert != undefined && sousMenuOuvert != sousMenu) {
        sousMenuOuvert.style.display = "none";
        // on enleve la couleur du menuItem
        sousMenuOuvert.previousElementSibling.classList.remove("menuItemActive");

    }
    /* Ouvrir le sous menu*/
    sousMenu.style.display = "flex";
    sousMenuOuvert = sousMenu;
}

/**
 * Gestion des sousMenus lors du clic ou du survol
 * @param {*} event 
 */
function clickSousMenu(event) {
    if (sousMenuItemActive != undefined) {
        // on enleve la couleur du menuItem
        sousMenuItemActive.classList.remove("sousMenuItemActive");
    }
    /* Changer la couleur du sous menu sélectionné*/
    event.target.classList.add("sousMenuItemActive")
    sousMenuItemActive = event.target;
}

/**
 * Gestion du menu burger quand clic sur l'entete
 */
function clickTitreMenu(){
    if (burgerOuvert){
        fermerMenuBurger();
    }else{
        listeMenus[0].parentNode.classList.remove("telNone");
        burgerOuvert=true;
        iconeBurger.classList.add("iconeretourne");
    }
    
}

/**
 * Gestion du menu burger quand clic à coté
 * @param {*} event 
 */
function cliqueSurLaPage(event){
    if(!nav.contains(event.target))//si la nav ne contient pas la source du clique, on ferme !
    {
        fermerMenuBurger();
    }
}

/**
 * permet de refermer le menu burger sur petit ecrants
 */
function fermerMenuBurger(){
    listeMenus[0].parentNode.classList.add("telNone");
    burgerOuvert=false;
    iconeBurger.classList.remove("iconeretourne");
}

