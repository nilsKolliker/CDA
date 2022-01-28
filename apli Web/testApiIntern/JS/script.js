var zoneDep=document.getElementById("departement");
var zoneVille=document.getElementById("ville");
var selectRegion=document.getElementById("region_id");
var zoneInfo=document.getElementById("info");
var selectDep=null;
var selectVille=null;

selectRegion.addEventListener("input",creeDep);

function creeDep(e) {
    remouvSelect(zoneDep);
    remouvSelect(zoneVille);
    remouvSelect(zoneInfo);
    if(selectRegion.value!==""){
        let requ = new XMLHttpRequest();
        requ.open('POST', 'index.php?page=LDAPI', true);
        requ.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        let args = "idRegion="+selectRegion.value;
        requ.send(args);
        requ.onreadystatechange = function(event) {
            if (this.readyState === XMLHttpRequest.DONE) {
                if (this.status === 200) {
                    reponse=JSON.parse(this.responseText); 
                    zoneDep.innerHTML=reponse;
                    selectDep=document.getElementById("departement_id");
                    selectDep.addEventListener("input",creeVille);
                } else {
                    console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
                }
            }
        }
    }
}

function creeVille(e) {
    remouvSelect(zoneVille);
    remouvSelect(zoneInfo);
    if(selectDep.value!==""){
        let requ = new XMLHttpRequest();
        requ.open('POST', 'index.php?page=LVAPI', true);
        requ.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        let args = "codeDep="+selectDep.options[selectDep.selectedIndex].text.split(' ')[0];
        requ.send(args);
        requ.onreadystatechange = function(event) {
            if (this.readyState === XMLHttpRequest.DONE) {
                if (this.status === 200) {
                    reponse=JSON.parse(this.responseText); 
                    zoneVille.innerHTML=reponse;
                    selectVille=document.getElementById("ville_id");
                    selectVille.addEventListener("input",creeInfo);
                } else {
                    console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
                }
            }
        }
    }
}

function creeInfo(e) {
    remouvSelect(zoneInfo);
    if(selectVille.value!==""){
        let requ = new XMLHttpRequest();
        requ.open('POST', 'index.php?page=InfoVilleAPI', true);
        requ.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        let args = "idVille="+selectVille.value;
        requ.send(args);
        requ.onreadystatechange = function(event) {
            if (this.readyState === XMLHttpRequest.DONE) {
                if (this.status === 200) {
                    reponse=JSON.parse(this.responseText); 
                    console.log(reponse);
                } else {
                    console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
                }
            }
        }
    }
}

function remouvSelect(select) {
    for (let i = select.children.length; i >0; i--) {
        select.children[i-1].remove();
    }
}