var image=document.querySelector("#imageProduit");
var inputFile=document.querySelector("input[type='file']");

inputFile.addEventListener("input",changeImage);


function changeImage() {
    console.log(inputFile.files);
}