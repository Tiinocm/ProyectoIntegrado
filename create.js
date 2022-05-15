document.addEventListener("DOMContentLoaded", main)

function main() {
    console.log("DOM Content Loaded");
    let contElement = 0;
    let element = document.getElementById("element");
    let add = document.getElementById("add");

    add.addEventListener("click", function(e){
        e.preventDefault();
        if (element.value == 0) {
            let str = '<textarea name="parrafo" id="text' + contElement + '" cols="50" rows="10"></textarea><br>';
            document.getElementById("elementNoticia").innerHTML += str;
            contElement++
        }else if (element.value == 1) {
            let str = '<input type="file" name="multimedia" id="multimedia' + contElement + '"><br>';
            document.getElementById("elementNoticia").innerHTML += str;
            contElement++
        }
    });
}