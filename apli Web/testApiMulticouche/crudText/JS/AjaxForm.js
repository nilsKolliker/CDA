var contenu = document.querySelector(".contenu");
var mode = document.querySelector("form").dataset.mode;
const port=44327;

if (mode=='Ajouter') {
    CreerLeClique();
}else{
    var id=document.querySelector("input[name='IdUtilisateur']").value;
    GetApi();
}

function CreerLeClique() {
    document.querySelector("button[name='submit']").disabled = false;
    document.querySelector("button[name='submit']").addEventListener("click",PostPutDelAPI);
}

function GetApi(){
    let requ = new XMLHttpRequest();    
    requ.open('GET', 'https://localhost:'+port+'/api/UtilisateursControllers/'+id, true);
    requ.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    requ.send();
    requ.onreadystatechange = function(event) {
        if (this.readyState === XMLHttpRequest.DONE) {
            if (this.status === 200) {
                console.log("Réponse reçue: %s", this.responseText);
                reponse=JSON.parse(this.responseText);
                document.querySelector("input[name='Nom']").value=reponse["nom"];
                document.querySelector("input[name='Prenom']").value=reponse["prenom"];
                document.querySelector("input[name='AdresseMail']").value=reponse["adresseMail"];
                document.querySelector("input[name='MotDePasse']").value=reponse["motDePasse"];
                document.querySelector("input[name='Role']").value=reponse["role"];
                if (mode!="Afficher") {
                    CreerLeClique();
                }            
            } else {
                console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
            }
        }
    }
}

function PostPutDelAPI() {
    let string="";
    switch (mode) {
        case 'Ajouter':
            method='POST';
            break;
        case 'Modifier':
            method='PUT';
            string="/"+id;
            break;
        case 'Supprimer':
            method='DELETE';
            string="/"+id;
            break;
        default:
            break;
    }
    requ.open(method, 'https://localhost:'+port+'/api/UtilisateursControllers'+string, true);
    if (mode=='Supprimer') {
        requ.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        requ.send();
    }else{
        requ.setRequestHeader("Content-Type", "application/json");
        let arg={
            "Nom":document.querySelector("input[name='Nom']").value,
            "Prenom":document.querySelector("input[name='Prenom']").value,
            "AdresseMail":document.querySelector("input[name='AdresseMail']").value,
            "MotDePasse":document.querySelector("input[name='MotDePasse']").value,
            "Role":document.querySelector("input[name='Role']").value
        };
        // console.log(arg);
        requ.send(JSON.stringify(arg));
    }

    requ.onreadystatechange = function(event) {
        if (this.readyState === XMLHttpRequest.DONE) {
            if (this.status === 200||this.status === 201||this.status === 204) {
                window.location.href = "index.php?page=ListeUtilisateurs"                
            } else {
                console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
            }
        }
    }
}