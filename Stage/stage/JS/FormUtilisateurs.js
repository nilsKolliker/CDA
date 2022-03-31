var role=document.querySelector("#role");
var planning=document.querySelector("#planning");
var zonePlanning=document.querySelector("#zonePlanning");

var boutonAjouterRattachement=document.querySelector("#boutonAjouterRattachement");
var listeBoutonSupprimerRattachement=document.querySelectorAll('.boutonSupprimerRattachement');
var templateRattachement=document.querySelector("#templateRattachement");
var zoneRattachement=document.querySelector("#zoneRattachement");

// var zoneAbsence=document.querySelector("#zoneAbsence");
// var templateAbsence=document.querySelector("#templateAbsence");


var compteAjouterRattachement=0;
chagementDeRole();

boutonAjouterRattachement.addEventListener("click", ajouterRattachement);
listeBoutonSupprimerRattachement.forEach(BoutonSupprimerRattachement => {
    BoutonSupprimerRattachement.addEventListener("click", supprimerRattachement);
});

role.addEventListener("input", chagementDeRole);


function chagementDeRole() {
    if(role.value==2){
        zonePlanning.appendChild(document.importNode(planning.content, true));
    }else{
        while (zonePlanning.firstChild) 
            {zonePlanning.removeChild(zonePlanning.firstChild);
        }
    }
}

function ajouterRattachement() {
    compteAjouterRattachement++;
    let newRattachement=document.importNode(templateRattachement.content, true);
    newRattachement.querySelector('select').name="ajouterRattachement "+compteAjouterRattachement;
    newRattachement.querySelector(".boutonSupprimerRattachement").addEventListener("click", supprimerRattachement);
    zoneRattachement.appendChild(newRattachement);
}
function supprimerRattachement(event) {
    let bouton = event.target.parentNode;
    let select= bouton.previousSibling.previousSibling;
    console.log(select)
    if (select.name.substring(0,8)=="modifier") {
        select.name=select.name.replace("modifier","supprimer")
        select.classList.add("noDisplay");
    }else{
        select.parentNode.removeChild(select);
    }
    bouton.parentNode.removeChild(bouton.previousSibling);
    bouton.parentNode.removeChild(bouton.nextSibling);
    bouton.parentNode.removeChild(bouton);
}