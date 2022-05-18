document.addEventListener("DOMContentLoaded", main)

function main()
{
    let get = window.location.search;
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function(){
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data);
            console.log(data[0]["user"]);
            document.getElementById("dia").innerHTML = data[0]["fecha"];
            document.getElementById("titulo").innerHTML = data[0]["titulo"];
            /* document.getElementById("user").innerHTML = "alfajor"; */
            if (data[0]["plantilla"] == 0) {
                document.getElementById("plantilla0").style.display = "block";
                document.getElementById("titulo1").innerHTML = data[0]["titulo1"];
                
            }else{
                document.getElementById("plantilla1").style.display = "block";
            }

        }
    });
    xhttp.open("GET", "noticia.php" + get, true);
    xhttp.send();
}