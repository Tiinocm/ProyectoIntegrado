document.addEventListener("DOMContentLoaded", main)

function main() {
    console.log("DOM Content Loaded");
    let plantilla = document.getElementById("plantilla")
    let plantilla0 = document.getElementById("plantilla0")
    let plantilla1 = document.getElementById("plantilla1")
    let add = document.getElementById("add");
    let form = document.getElementById("formulario")
    let text1 = document.getElementById("text1")
    let text2 = document.getElementById("text2")
    let text3 = document.getElementById("text3")
    let text4 = document.getElementById("text4")
    let img = document.getElementById("img")
    let img1 = document.getElementById("img1")
    let img2 = document.getElementById("img2")
    let img3 = document.getElementById("img3")
    let img4 = document.getElementById("img4")
    let user = document.getElementById("user");

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

    form.addEventListener("submit", function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        formData.append("img", img);
        formData.append("img1", img1);
        formData.append("img2", img2);
        formData.append("img3", img3);
        formData.append("img4", img4);
        formData.append("text1", text1.value);
        formData.append("text2", text2.value);
        formData.append("text3", text3.value);
        formData.append("text4", text4.value);  
        formData.append("user", user.innerHTML);

        const xhttp = new XMLHttpRequest();
        xhttp.open("POST", "crear.php", true);
        xhttp.send(formData);
        window.location.href = "index.php";
    })
}