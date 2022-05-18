/* Alejandro */

document.addEventListener("DOMContentLoaded", main)

function main()
{
     let icon = document.getElementById("icon")
     icon.addEventListener("click",function(){
         icon.classList.replace("fa-regular","fa-solid");
         
    /*     const xhttp = new XMLHttpRequest();
    xhttp.addEventListener("readystatechange", function(){
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data);
            

        }
    });
    xhttp.open("GET", "likes.php", true);
    xhttp.send(); */

     });
    
}