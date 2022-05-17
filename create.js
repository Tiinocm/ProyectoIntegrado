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
        formData.append("text1", text1.value);
        formData.append("text2", text2.value);
        formData.append("text3", text3.value);
        formData.append("text4", text4.value);  
        formData.append("img", img);
        const xhhtp = new XMLHttpRequest();
        xhhtp.addEventListener("readystatechange", function(){
            if (this.readyState == 4 && this.status == 200) {
                let data = JSON.parse(this.responseText);
                console.table(data);
            }
        });
        xhhtp.open("POST", "crear.php", true);
        xhhtp.send(formData);
    })
}