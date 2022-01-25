var laOuDoitEtreLAjax = document.getElementById("ajaxIci");
var inputDate = document.getElementById("laDate");
var leSelect = document.getElementById("listeStation");
var laCarte= document.getElementById("maps");

inputDate.addEventListener("input",updateLaListe);
leSelect.addEventListener("input",afficheContenu);



function updateLaListe(e) {
    for (let i = leSelect.options.length; i >0; i--) {
        leSelect.remove(i-1);
    }
    let req = new XMLHttpRequest();
    let leJourDApres=new Date(inputDate.value);
    leJourDApres.setDate(leJourDApres.getDate()+1);
    req.open('GET', 'https://hubeau.eaufrance.fr/api/v1/temperature/station?date_debut_mesure='+inputDate.value+'&date_fin_mesure='+leJourDApres.getFullYear()+"-"+(leJourDApres.getMonth()+1)+"-"+leJourDApres.getDate(), true);
    req.send(null);
    req.onreadystatechange = function (event) {
        if (this.readyState === XMLHttpRequest.DONE) {
            if (this.status === 200) {
                reponse = JSON.parse(this.responseText);
                entete = document.createElement("option");
                leSelect.appendChild(entete);
                leSelect.disabled=false;
                entete.text = "Choisir une station";
                entete.value = "Choisir une station";
                for (let i = 0; i < reponse.data.length; i++) {
                    nouvElt = document.createElement("option");
                    leSelect.appendChild(nouvElt);
                    nouvElt.value =reponse.data[i].code_station;
                    nouvElt.text =reponse.data[i].libelle_station;
                }
            } else {
                console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
            }
        }
    };
}

function afficheContenu(e) {
    for (let i = laOuDoitEtreLAjax.children.length; i >2; i--) {
        laOuDoitEtreLAjax.children[i-1].remove();
    }
    let req = new XMLHttpRequest();
    var leJourDApres=new Date(inputDate.value);
    leJourDApres.setDate(leJourDApres.getDate()+1);
    req.open('GET', 'https://hubeau.eaufrance.fr/api/v1/temperature/chronique?code_station='+leSelect.options[leSelect.selectedIndex].value+'&date_debut_mesure='+inputDate.value+'&date_fin_mesure='+leJourDApres.getFullYear()+"-"+(leJourDApres.getMonth()+1)+"-"+leJourDApres.getDate(), true);
    req.send(null);
    req.onreadystatechange = function (event) {
        if (this.readyState === XMLHttpRequest.DONE) {
            if (this.status === 200) {
                reponse = JSON.parse(this.responseText);
                var templLigne = document.getElementById("template");
                if(reponse.data.length){
                    laCarte.src="https://www.openstreetmap.org/export/embed.html?bbox="+(reponse.data[0].longitude-0.005)+"%2C"+(reponse.data[0].latitude-0.005)+"%2C"+(reponse.data[0].longitude+0.005)+"%2C"+(reponse.data[0].latitude+0.005)+"&amp;layer=mapnik";
                }
                for (let i = 0; i < reponse.data.length; i++) {
                    nouvElt = templLigne.content.cloneNode(true);
                    laOuDoitEtreLAjax.appendChild(nouvElt);
                    heure=laOuDoitEtreLAjax.querySelectorAll(".heure")[i];
                    temperature=laOuDoitEtreLAjax.querySelectorAll(".temps")[i];
                    heure.innerHTML=reponse.data[i].heure_mesure_temp;
                    temperature.innerHTML=reponse.data[i].resultat;
                    heure.classList.add("ligne"+(i % 2));
                    temperature.classList.add("ligne"+(i % 2));
                }
            } else {
                console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
            }
        }
    };
}




// var enregs; // contiendra la reponse de l'API
// // on définit une requete
// const req = new XMLHttpRequest();

// //on envoi la requête
// var leJourDApres=new Date(laOuDoitEtreLAjax.dataset.date);
// leJourDApres.setDate(leJourDApres.getDate()+1);
// req.open('GET', 'https://hubeau.eaufrance.fr/api/v1/temperature/chronique?libelle_station='+laOuDoitEtreLAjax.dataset.nom+'&date_debut_mesure='+laOuDoitEtreLAjax.dataset.date+'&date_fin_mesure='+leJourDApres.getFullYear()+"-"+(leJourDApres.getMonth()+1)+"-"+leJourDApres.getDate(), true);
// req.send(null);

// //on vérifie les changements d'états de la requête
// req.onreadystatechange = function (event) {
//     if (this.readyState === XMLHttpRequest.DONE) {
//         if (this.status === 200) {
//             // la requete a abouti et a fournit une reponse
//             //on décode la réponse, pour obtenir un objet
//             reponse = JSON.parse(this.responseText);
//              // je recupere le template
//             var templLigne = document.getElementById("template");
//              // on crée la ligne et les div internes
//             for (let i = 0; i < reponse.data.length; i++) {
//                 // on clone le template pour avoir une nouvelle structure
//                 nouvElt = templLigne.content.cloneNode(true);
//                 //ajoute à la stucture
//                 laOuDoitEtreLAjax.appendChild(nouvElt);
//                 heure=laOuDoitEtreLAjax.querySelectorAll(".heure")[i];
//                 temperature=laOuDoitEtreLAjax.querySelectorAll(".temps")[i];
//                 heure.innerHTML=reponse.data[i].heure_mesure_temp;
//                 temperature.innerHTML=reponse.data[i].resultat;
//                 heure.classList.add("ligne"+(i % 2));
//                 temperature.classList.add("ligne"+(i % 2));
//             }
//         } else {
//             console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
//         }
//     }
// };