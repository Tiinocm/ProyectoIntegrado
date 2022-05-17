<?php
require_once "autoloading.php";
$security = new security();
$security->register();


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/CRONOS-icono.png" type="image/x-icon">
    <link rel="stylesheet" href="css/noticiaIndividual.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Lora&display=swap" rel="stylesheet">
    <title>TítuloNoticia</title>
    <script src="noticia.js"></script>
    <style>
        header::before {
            background-image: url(img/zeri.png);
        }
    </style>
</head>

<body>
    <div class="grid">
        <header class="header">
            <img class="imgHeader" src="img/zeri.png" alt="">
        </header>
        <aside class="ham">
            <input type="checkbox" id="active">
            <label for="active" class="menu-btn"><span></span></label>
            <label for="active" class="close"></label>
            <div class="wrapper">
                <ul>
                    <li><a href="login.php"><?= ($security->getUserData()) ? $security->getUserData() : "Iniciar Sesión" ?></a></li>
                    <li><a href="create.php">Crear mi propia noticia</a></li>
                    <li><a href="index.php">Noticias destacadas</a></li>
                    <li><a href="comunitario.php">Noticias comunitarias</a></li>
                </ul>
            </div>
        </aside>
        <section class="noticia">
            <div class="titulo"> Titulo de la noticia<br>
                <cite class="autor">Escrito por <a href="#" class="users">user</a></cite>
                <div class="dia"> 9 Mayo 2022</div>

            </div>

            <p class="parrafo">
                Lorem fistrum ese que llega no te digo trigo por no llamarte Rodrigor llevame al sircoo se calle ustée.
                Amatomaa jarl va usté muy cargadoo qué dise usteer a gramenawer no te digo trigo por no llamarte
                Rodrigor.
            </p>
            <img class="imagen" src="img/Viego.jpg" alt="imagen de prueba. Splash-Art de viego">
            <p class="parrafo">
                Va usté muy cargadoo al ataquerl diodeno no puedor a wan no te digo trigo por no llamarte Rodrigor te
                voy a borrar el cerito la caidita caballo blanco caballo negroorl de la pradera a peich. Pecador torpedo
                sexuarl te voy a borrar el cerito.
            </p>
        </section>
    </div>
</body>

</html>