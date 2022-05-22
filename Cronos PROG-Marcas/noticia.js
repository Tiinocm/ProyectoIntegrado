document.addEventListener("DOMContentloaded", main())

function main()
{
    let get = window.location.search;
    const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function(){
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data);
            console.log(data[0]["usuario"]);

            let imgHeader = data[0]["imagen_portada"].slice(1, data[0]["imagen_portada"].length -1);
            imgHeader = imgHeader.split("\"");
            imgHeader = imgHeader[0];
            document.getElementById("imgHeader").src = imgHeader;
            document.getElementById("dia").innerHTML = data[0]["fecha"];
            document.getElementById("titulo").innerHTML = data[0]["titulo"];
            document.getElementById("user").innerHTML = data[0]["usuario"];
            document.getElementsByClassName("countvotos")[0].innerHTML = data[0]["votos"];
            if (data[0]["plantilla"] == 0) {
                document.getElementById("plantilla0").style.display = "block";
                document.getElementById("titulo1").innerHTML = data[0]["titulo1"];
                document.getElementById("titulo2").innerHTML = data[0]["titulo2"];
                document.getElementById("parrafo1").innerHTML = data[0]["parrafo1"];
                document.getElementById("parrafo2").innerHTML = data[0]["parrafo2"];

                let img1 = data[0]["img1"].slice(1, data[0]["img1"].length -1);
                img1 = img1.split("\"");
                img1 = img1[0];
                document.getElementById("img1").src = img1;

                let img2 = data[0]["img2"].slice(1, data[0]["img2"].length -1);
                img2 = img2.split("\"");
                img2 = img2[0];
                document.getElementById("img2").src = img2;
            }else{
                document.getElementById("plantilla1").style.display = "block";
                document.getElementById("titulo3").innerHTML = data[0]["titulo1"];
                document.getElementById("parrafo3").innerHTML = data[0]["parrafo1"];
                document.getElementById("parrafo4").innerHTML = data[0]["parrafo2"];

                let img3 = data[0]["img3"].slice(1, data[0]["img3"].length -1);
                img3 = img3.split("\"");
                img3 = img3[0];
                document.getElementById("img3").src = img3;

                let img4 = data[0]["img4"].slice(1, data[0]["img4"].length -1);
                img4 = img4.split("\"");
                img4 = img4[0];
                document.getElementById("img4").src = img4;
            }
        }
    });
    xhttp.open("GET", "noticia.php" + get, true);
    xhttp.send();
}