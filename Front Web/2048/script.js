var dimention=parseInt(prompt("Taille de la Grille ?"));
var grille=document.querySelector(".grid");
var score=document.querySelector("input[name='score']");
score.value=0;
var gameOver=false;
var listeCaseVide;
var debutMouvementX=0;
var debutMouvementY=0;
// création de la grille
var gridTemplateColumns =""
for (let i = 0; i < dimention; i++) {
    gridTemplateColumns+=" 1fr";
    
}
grille.style.gridTemplateColumns=gridTemplateColumns;

var tabCase= new Array(dimention);
for (let i = 0; i < tabCase.length; i++) {
    tabCase[i]=new Array(dimention);
}

for (let i = 0; i < dimention; i++) {
    for (let j = 0; j < dimention; j++) {
        let laCase=document.createElement("input");
        laCase.classList.add("case");
        laCase.dataset.x=j;
        laCase.dataset.y=i;
        laCase.readOnly=true;
        grille.insertBefore(laCase,null);
        tabCase[i][j]=laCase;
    }   
}
//creation des events,
window.addEventListener("keydown",bougeAuClavier);
document.querySelectorAll("div, button, input, label, body").forEach(element => {
    element.addEventListener("mousedown",initialiserLeMouvement);
    element.addEventListener("mouseup",bougeALaSourie);
});
//lancement de la partie
fairePopeUn2();


//les fonctions

function initialiserLeMouvement(event) {
    debutMouvementX=event.clientX;
    debutMouvementY=event.clientY;
    console.log(debutMouvementX);
    console.log(debutMouvementY);
}

function bougeALaSourie(event) {
    console.log(event.clientX);
    console.log(event.clientY);
}
function bougeAuClavier(event) {
    switch (event.code) {
        case "ArrowRight":
            toutBouger("droite");
            break;
        case "ArrowLeft":
            toutBouger("gauche");
            break;
        case "ArrowDown":
            toutBouger("bas");
            break;
        case "ArrowUp":
            toutBouger("haut");
            break;
        default:
            break;
    }
}

function toutBouger(direction){
    let modifieur
    switch (direction) {
        case "droite":
            modifieur=[0,1];
            break;
        case "gauche":
            modifieur=[0,-1];
            break;
        case "bas":
            modifieur=[1,0];
            break;
        case "haut":
            modifieur=[-1,0];
            break;
        default:
            break;
    }
    for (let i = 0; i < dimention; i++) {
        for (let j = 0; j < dimention; j++) {
            bouger1case(modifieur, i, j);
        } 
    }
    fairePopeUn2();
}
function bouger1case(modifieur, cordX, cordY){
    let laCase=tabCase[cordX][cordY];
    if (laCase.placeholder!="" &&cordX+modifieur[0]>=0&&cordX+modifieur[0]<dimention&&cordY+modifieur[1]>=0&&cordY+modifieur[1]<dimention) {
        let caseACote=tabCase[cordX+modifieur[0]][cordY+modifieur[1]];
        if (caseACote.placeholder==""||caseACote.placeholder==laCase.placeholder) {
            if (caseACote.placeholder=="") {
                caseACote.placeholder=laCase.placeholder;
            }else{
                caseACote.placeholder=parseInt(caseACote.placeholder,10)+parseInt(laCase.placeholder,10);
            }
            laCase.placeholder="";
            bouger1case(modifieur, cordX+modifieur[0],cordY+modifieur[1]);
            if (cordX-modifieur[0]>=0&&cordX-modifieur[0]<dimention&&cordY-modifieur[1]>=0&&cordY-modifieur[1]<dimention&&tabCase[cordX-modifieur[0]][cordY-modifieur[1]].placeholder!="") {
                bouger1case(modifieur, cordX-modifieur[0],cordY-modifieur[1])
            }
        }
    }
}

function fairePopeUn2(){
    listeCaseVide= listerLesCasesVides();
    if (listeCaseVide.length) {
        listeCaseVide[Math.floor(Math.random()*listeCaseVide.length)].placeholder=2;
        score.value=parseInt(score.value,10)+2;
    }else{
        gameOver=true;
        alert("Partie terminée : "+score.value+" points.")
    }
}
function listerLesCasesVides(){
    return document.querySelectorAll('.case:not([placeholder]), .case[placeholder=""]');//impossible de reperer facilement une value vide.. bon on passe par les placeholders
}