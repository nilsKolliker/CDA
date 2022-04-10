var role=document.querySelector("#role");
var planning=document.querySelector("#planning");
var zonePlanning=document.querySelector("#zonePlanning");

var boutonAjouterRattachement=document.querySelector("#boutonAjouterRattachement");
var listeBoutonSupprimerRattachement=document.querySelectorAll('.boutonSupprimerRattachement');
var templateRattachement=document.querySelector("#templateRattachement");
var zoneRattachement=document.querySelector("#zoneRattachement");

var zoneAbsence=document.querySelector("#zoneAbsence");
var templateAbsence=document.querySelector("#templateAbsence");
var templateAjouterAbsence=document.querySelector("#templateAjouterAbsence");

var compteAjouterRattachement=0;
var compteAjouterAbsence=0;
chagementDeRole();

boutonAjouterRattachement.addEventListener("click", ajouterRattachement);
listeBoutonSupprimerRattachement.forEach(BoutonSupprimerRattachement => {
    BoutonSupprimerRattachement.addEventListener("click", supprimerRattachement);
});

role.addEventListener("input", chagementDeRole);


function chagementDeRole() {
    if(role.value==2){
        zonePlanning.appendChild(document.importNode(planning.content, true));
        creerAbsence();
    }else{
        voidNode(zonePlanning);
        voidNode(zoneAbsence);
    }
}
function voidNode(node) {
    while (node.firstChild) {
        node.removeChild(node.firstChild);
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

function creerAbsence(){
    zoneAbsence.appendChild(document.importNode(templateAbsence.content, true));
    var boutonAjouterAbsence=document.querySelector("#boutonAjouterAbsence");
    var listeBoutonSupprimerAbsence=document.querySelectorAll('.boutonSupprimerAbsence');
    boutonAjouterAbsence.addEventListener("click", ajouterAbsence);
    listeBoutonSupprimerAbsence.forEach(BoutonSupprimerAbsence => {
        BoutonSupprimerAbsence.addEventListener("click", supprimerAbsence);
    });
}

function ajouterAbsence() {
    compteAjouterAbsence++;
    let newAbsence=document.importNode(templateAjouterAbsence.content, true);
    newAbsence.querySelector('#debutAbsence').name="ajouterAbsenceDebut "+compteAjouterAbsence;
    newAbsence.querySelector('#finAbsence').name="ajouterAbsenceFin "+compteAjouterAbsence;
    newAbsence.querySelector('#divInput').id="ajouterAbsence "+compteAjouterAbsence;
    templateAbsence.content.appendChild(newAbsence);
    voidNode(zoneAbsence);
    creerAbsence();
}

function supprimerAbsence(event) {
    let bouton = event.target.parentNode;
    divInput=templateAbsence.content.getElementById(bouton.previousSibling.previousSibling.id);
    divInput.nextSibling.remove();
    divInput.nextSibling.remove();
    divInput.nextSibling.remove();
    if (divInput.firstChild.name.substring(0,8)=="modifier") {
        divInput.id=divInput.id.replace("modifier","supprimer");
        divInput.childNodes.forEach(input => {
            input.name=input.name.replace("modifier","supprimer")
            divInput.classList.add("noDisplay");
        });
    }else{
        divInput.remove();
    }
    voidNode(zoneAbsence);
    creerAbsence();
}