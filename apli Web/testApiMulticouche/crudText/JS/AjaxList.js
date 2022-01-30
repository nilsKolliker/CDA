var contenu=document.querySelector(".gridListe");
var retour=document.querySelector(".retour");
const requ = new XMLHttpRequest();
requ.open('GET', 'https://localhost:44327/api/UtilisateursControllers', true);
requ.send();

requ.onreadystatechange = function(event) {
    if (this.readyState === XMLHttpRequest.DONE) {
        if (this.status === 200) {
            reponse=JSON.parse(this.responseText); 
            reponse.forEach(ligne => {
                creeDiv(ligne["nom"],["caseListe","donneeListe"]);
                creeDiv(ligne["prenom"],["caseListe","donneeListe"]);
                creeDiv(ligne["adresseMail"],["caseListe","donneeListe"]);
                creeDiv(ligne["motDePasse"],["caseListe","donneeListe"]);
                creeDiv(ligne["role"],["caseListe","donneeListe"]);

                creeDiv('<a href="index.php?page=FormUtilisateurs&mode=Afficher&id='+ligne["idUtilisateur"]+'"><i class="fas fa-file-contract"></i></a>',["caseListe"]);
                creeDiv('<a href="index.php?page=FormUtilisateurs&mode=Modifier&id='+ligne["idUtilisateur"]+'"><i class="fas fa-pen"></i></a>',["caseListe"]);
                creeDiv('<a href="index.php?page=FormUtilisateurs&mode=Supprimer&id='+ligne["idUtilisateur"]+'"><i class="fas fa-trash-alt"></i></a>',["caseListe"]);
            });            
        } else {
            console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
        }
    }
}

function creeDiv(html,tabClass) {
    let nouvElt = document.createElement("div");
    tabClass.forEach(classe => {
        nouvElt.classList.add(classe);
    });
    nouvElt.innerHTML=html;
    contenu.insertBefore(nouvElt,retour);
}