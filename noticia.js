document.addEventListener("DOMContentLoaded", main)

function main()
{
    let get = window.location.search;
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function(){
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data);
            console.log(document.getElementById("user").innerHTML);
            document.getElementById("dia").innerHTML = data[0]["fecha"];
            document.getElementById("titulo").innerHTML = data[0]["titulo"];
            document.getElementById("user").innerHTML = "alfajor";
        }
    });
    xhttp.open("GET", "noticia.php" + get, true);
    xhttp.send();
}