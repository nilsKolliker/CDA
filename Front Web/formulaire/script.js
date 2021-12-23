var valide = {};
var listInput =document.querySelectorAll("input");
listInput.forEach(input => {
    input.addEventListener("input", check);
    valide[input.name]=!input.required;
})
var boutonSubmit=document.querySelector("button[type=submit]");
document.querySelector("button[type=button]").addEventListener("click",reset);
var InputPassword = document.querySelector("input[name=Password]");
var InputConfirmation = document.querySelector("input[name=Confirmation]");
var listeIndice=document.querySelectorAll(".fa-question-circle");
listeIndice.forEach(indice => {
    indice.addEventListener("mouseover", voirIndice);
    indice.addEventListener("mouseout", cacheIndice);     
});

function check(event){
    checkInput(event.target)
    if (event.target.name=="Password") {
        checkInput(InputConfirmation);
    }
    checkBouton();
}

function checkInput(input) {
    valide[input.name]=inputValide(input);
    if (input.value=="") {
        input.classList.remove("red");
        input.classList.remove("green");
    }else if(inputValide(input)) {
        input.classList.remove("red");
        input.classList.add("green");
    }else{
        input.classList.remove("green");
        input.classList.add("red");
    }
}

function inputValide(input) {
    return input.name=="Confirmation"?input.value==InputPassword.value:input.checkValidity();
}

function checkBouton(){
    boutonSubmit.disabled=Object.values(valide).indexOf(false) != -1;
}


function reset(){
    listInput.forEach(input => {
        input.value="";
        checkInput(input)
    });
    checkBouton();
}

function voirIndice(event){
    listeIndice.forEach(indice => {
        detruitIndice(indice);   
    });
    let parent=event.target.parentNode;
    if (!parent.querySelector(".indice")) {
        let indice=document.createElement("div");
        if (parent.previousElementSibling.name=="Password") {
            indice.classList.add("indice grid");
            let listeIndiceMdp=parent.previousElementSibling.title.split(", ");
            // parent.previousElementSibling.pattern
            for (let i = 0; i < listeIndiceMdp.length; i++) {
                listeIndiceMdp[i];
                let divValidité=document.createElement("div");
                let iconValidité=document.createElement("i");
                let divIndice=document.createElement("div");
                appendChild(document.createTextNode(listeIndiceMdp[i]));
                
            }
        }else{
            indice.classList.add("indice");
            indice.appendChild(document.createTextNode(parent.previousElementSibling.title));
            event.target.parentNode.insertBefore(indice,null);
        }
        
    }  
}

function cacheIndice(event){
    detruitIndice(event.target);
}

function detruitIndice(indice){
    let parent=indice.parentNode;;
    if (parent.querySelector(".indice")) {//sécu au cas ou l' indice n'existe pas
        parent.removeChild(parent.querySelector(".indice"));
    }
}