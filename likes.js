/* Alejandro */

document.addEventListener("DOMContentLoaded", main)

function main()
{

    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function(){
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data);
            console.log(data[0]["usuario"]);
            document.getElementById("dia").innerHTML = data[0]["fecha"];
            document.getElementById("titulo").innerHTML = data[0]["titulo"];

        }
    });
    xhttp.open("GET", "likes.php" + get, true);
    xhttp.send();
}