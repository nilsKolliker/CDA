var laOuDoitEtreLAjax = document.getElementById("ajaxIci");
var enregs; // contiendra la reponse de l'API
// on définit une requete
const req = new XMLHttpRequest();

//on envoi la requête
var leJourDApres=new Date(laOuDoitEtreLAjax.dataset.date);
leJourDApres.setDate(leJourDApres.getDate()+1);
console.log('https://hubeau.eaufrance.fr/api/v1/temperature/chronique?libelle_station='+laOuDoitEtreLAjax.dataset.nom+'&date_debut_mesure='+laOuDoitEtreLAjax.dataset.date+'&date_fin_mesure='+leJourDApres.getFullYear()+"-"+(leJourDApres.getMonth()+1)+"-"+leJourDApres.getDate());
req.open('GET', 'https://hubeau.eaufrance.fr/api/v1/temperature/chronique?libelle_station='+laOuDoitEtreLAjax.dataset.nom+'&date_debut_mesure='+laOuDoitEtreLAjax.dataset.date+'&date_fin_mesure='+leJourDApres.getFullYear()+"-"+(leJourDApres.getMonth()+1)+"-"+leJourDApres.getDate(), true);
req.send(null);

//on vérifie les changements d'états de la requête
req.onreadystatechange = function (event) {
    if (this.readyState === XMLHttpRequest.DONE) {
        if (this.status === 200) {
            // la requete a abouti et a fournit une reponse
            //on décode la réponse, pour obtenir un objet
            reponse = JSON.parse(this.responseText);
             // je recupere le template
            var templLigne = document.getElementById("template");
             // on crée la ligne et les div internes
            for (let i = 0; i < reponse.data.length; i++) {
                // on clone le template pour avoir une nouvelle structure
                nouvElt = templLigne.content.cloneNode(true);
                //ajoute à la stucture
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