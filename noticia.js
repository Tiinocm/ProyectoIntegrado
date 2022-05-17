document.addEventListener("DOMContentLoaded", main)

function main()
{
    console.log(window.location.search);
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function(){
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data);
        }
    });
    xhttp.open("GET", "noticia.php", true);
    xhttp.send();
}