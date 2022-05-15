document.addEventListener("DOMContentLoaded", main)

function main() {
    console.log("DOM Content Loaded");

    let element = document.getElementById("element");
    let add = document.getElementById("add");

    add.addEventListener("click", function(e){
        e.preventDefault();
        if (element.value == 0) {
            console.log("texto");
        }else if (element.value == 1) {
            console.log("multimedia");
        }
    });
}