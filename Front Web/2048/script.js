var dimention=parseInt(prompt("Taille de la Grille ?"));
grille=document.querySelector(".grid");

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
        laCase.disabled=true;
        grille.insertBefore(laCase,null);
        tabCase[i][j]=laCase;
    }   
}
console.log(tabCase);

//
var listeCaseVide= listerLesCasesVides();

fairePopeUn2();


function fairePopeUn2(){
    listeCaseVide[Math.floor(Math.random()*listeCaseVide.length)].placeholder=2;
    listeCaseVide= listerLesCasesVides();
}
function listerLesCasesVides(){
    return document.querySelectorAll('.case:not([placeholder]), .case[placeholder=""]');
}