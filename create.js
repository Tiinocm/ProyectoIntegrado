document.addEventListener("DOMContentLoaded", main)

function main() {
    console.log("DOM Content Loaded");
    let plantilla = document.getElementById("plantilla")
    let plantilla0 = document.getElementById("plantilla0")
    let plantilla1 = document.getElementById("plantilla1")
    let add = document.getElementById("add");

    add.addEventListener("click", function(e){
        e.preventDefault();
        if (plantilla.value == 0) {
            plantilla0.style.display = "block";
            plantilla1.style.display = "none";
        }else if (plantilla.value == 1) {
            plantilla1.style.display = "block";
            plantilla0.style.display = "none";
        }
    });
}