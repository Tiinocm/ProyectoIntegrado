/* Alejandro */

document.addEventListener("DOMContentLoaded", main)

function main() {
    let icon = document.getElementsByClassName("icon");
    for (let i = 0; i < icon.length; i++) {
        icon[i].addEventListener("click", function () {
            if (icon[i].classList.contains("fa-regular")) {
                icon[i].classList.replace("fa-regular", "fa-solid");
            } else {
                icon[i].classList.replace("fa-solid", "fa-regular");
            }
        });

    }


    /*     const xhttp = new XMLHttpRequest();
   xhttp.addEventListener("readystatechange", function(){
       if (this.readyState == 4 && this.status == 200) {
           let data = JSON.parse(this.responseText);
           console.log(data);
           if(icon.classList.contains("fa-regular")){
               icon.classList.replace("fa-regular","fa-solid");
              }else{
                  icon.classList.replace("fa-solid","fa-regular");
              }

       }
   });
   xhttp.open("GET", "likes.php?id", true);
   xhttp.send(); 
 
    }); */
}