document.addEventListener("DOMContentLoaded", main)

function main()
{
    let get = window.location.search;
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function(){
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data);
            console.log(data[0]["usuario"]);
            document.getElementById("dia").innerHTML = data[0]["fecha"];
            document.getElementById("titulo").innerHTML = data[0]["titulo"];
            /* document.getElementById("user").innerHTML = "alfajor"; */
            if (data[0]["plantilla"] == 0) {
                document.getElementById("plantilla0").style.display = "block";
                document.getElementById("titulo1").innerHTML = data[0]["titulo1"];
                document.getElementById("titulo2").innerHTML = data[0]["titulo2"];
                document.getElementById("parrafo1").innerHTML = data[0]["parrafo1"];
                document.getElementById("parrafo2").innerHTML = data[0]["parrafo2"];
                document.getElementById("img1").src = data[0]["img1"];
                document.getElementById("img2").src = data[0]["img2"];
            }else{
                document.getElementById("plantilla1").style.display = "block";
                document.getElementById("titulo3").innerHTML = data[0]["titulo3"];
                document.getElementById("parrafo3").innerHTML = data[0]["parrafo3"];
                document.getElementById("parrafo4").innerHTML = data[0]["parrafo4"];
                document.getElementById("img3").src = data[0]["img3"];
                document.getElementById("img4").src = data[0]["img4"];
            }

        }
    });
    xhttp.open("GET", "noticia.php" + get, true);
    xhttp.send();
}