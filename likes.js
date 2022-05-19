/* Alejandro */

document.addEventListener("DOMContentLoaded", main)

function main() {
    let icon = document.getElementsByClassName("icon");
    for (let i = 0; i < icon.length; i++) {
        let id = icon[i].classList.toString();
        id = id[id.length - 1];

        icon[i].addEventListener("click", function () {
            if (icon[i].classList.contains("fa-regular")) {
                icon[i].classList.replace("fa-regular", "fa-solid");
                sumar(id);
            } else {
                icon[i].classList.replace("fa-solid", "fa-regular");
                restar(id);
            }
        });


    }




}

function sumar(id) {
    let url = "id=" + id + "&op=true";

    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            document.getElementById("countvotos").innerHTML = data[0]["votos"];
        }
    })
    xhttp.open("GET", "likes.php?" + url, true);
    xhttp.send();
}

function restar(id) {
    let url = "id=" + id + "&op=false";

    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            document.getElementById("countvotos").innerHTML = data[0]["votos"];
        }
    })
    xhttp.open("GET", "likes.php?" + url, true);
    xhttp.send();
}