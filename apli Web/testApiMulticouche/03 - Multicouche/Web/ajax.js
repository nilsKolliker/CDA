
var contenu = document.querySelector(".contenu");

// var arg=
// [
//     "POST",
//     null,
//     {
//         "IdVille": 4,
//         "NomVille": "testinsertion",
//         "IdDepartement": 1
//     }
// ];
// testAPI(arg);

// var arg=["GET"];
// testAPI(arg);

// var arg=
// [
//     "PUT",
//     4,
//     {
//         "IdVille": 4,
//         "NomVille": "testmodification",
//         "IdDepartement": 1
//     }
// ];
// testAPI(arg);

var arg=["DELETE",4];
testAPI(arg);

function testAPI(arg){
    let requ = new XMLHttpRequest();    
    switch (arg[0]) {
        case "GET":
            requ.open('GET', 'https://localhost:5001/api/Villes', true);
            requ.send();
            break;
        case "GET by ID":
            requ.open('GET', 'https://localhost:5001/api/Villes/'+arg[1], true);
            requ.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            requ.send();
            break;
        case "POST":
            requ.open('POST', 'https://localhost:5001/api/Villes', true);
            requ.setRequestHeader("Content-Type", "application/json");
            requ.send(JSON.stringify(arg[2]));
            break;
        case "PUT":
            requ.open('PUT', 'https://localhost:5001/api/Villes/'+arg[1], true);
            requ.setRequestHeader("Content-Type", "application/json");
            requ.send(JSON.stringify(arg[2]));
            break;
        case "DELETE":
            requ.open('DELETE', 'https://localhost:5001/api/Villes/'+arg[1], true);
            requ.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            requ.send();
            break;
        default:
            break;
    }
    requ.onreadystatechange = function(event) {
        if (this.readyState === XMLHttpRequest.DONE) {
            if (this.status === 200) {
                console.log("Réponse reçue: %s", this.responseText);
                let nouvElt = document.createElement("div");
                nouvElt.innerHTML=this.responseText;
                contenu.appendChild(nouvElt);
                
            } else {
                console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
            }
        }
    }
}
