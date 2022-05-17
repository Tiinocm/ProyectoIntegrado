document.addEventListener("DOMContentLoaded", main)

function main()
{
    let get = window.location.search;
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function(){
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data);
            document.getElementById("dia").innerHTML = data[0]["fecha"];
        }
    });
    xhttp.open("GET", "noticia.php" + get, true);
    xhttp.send();
}