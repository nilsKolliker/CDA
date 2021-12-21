var listeMenu = document.querySelectorAll(".menu");

listeMenu.forEach(element => {
    element.addEventListener("click",touchAuMenu);
});

function touchAuMenu(e){
    afficheMenu(e);
    activedClass(e)
}

function afficheMenu(e) {
    e.target.parentNode.parentNode.querySelectorAll(".sousMenu").forEach(element => {
        if (element.style.display=="flex") {
            element.style.display="none"
        }else{
            element.style.display="flex"
        }  
    });
}

function activedClass(e) {
    if (e.target.classList.contains("isActived")) {
        e.target.classList.remove("isActived");
    }else{
        e.target.classList.add("isActived");
    }
}
