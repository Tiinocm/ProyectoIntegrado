/* Alejandro */

document.addEventListener("DOMContentLoaded", main)

function main() {
    let icon = document.getElementsByClassName("icon");
    for (let i = 0; i < icon.length; i++) {
        let id = icon[i].classList.toString();
        id = id.split("=");
        id = id[id.length - 1];
        console.log(id);
        icon[i].addEventListener("click", function () {
            if (icon[i].classList.contains("fa-regular")) {
                icon[i].classList.replace("fa-regular", "fa-solid");
                sumar(id, i);
            } else {
                icon[i].classList.replace("fa-solid", "fa-regular");
                restar(id, i);
            }
        });


    }




}

function sumar(id, i) {
    let url = "id=" + id + "&op=true";

    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data);
            document.getElementsByClassName("countvotos")[i].innerHTML = data;
        }
    })
    xhttp.open("GET", "likes.php?" + url, true);
    xhttp.send();
}

function restar(id, i) {
    let url = "id=" + id + "&op=false";

    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data);
            document.getElementsByClassName("countvotos")[i].innerHTML = data;
        }
    })
    xhttp.open("GET", "likes.php?" + url, true);
    xhttp.send();
}