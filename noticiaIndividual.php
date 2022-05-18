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
            <div class="titulo" id="titulo"><br>
                <cite class="autor">Escrito por <a href="#" class="users"><div id="usuario"></div></a></cite>
                <div class="dia" id="dia"> 9 Mayo 2022</div>

            </div>
            <div class="plantilla0" id="plantilla0">
                <h1 class="titulo1" id="titulo1"></h1>
                <p class="parrafo" id="parrafo1"></p>
                <img src="" alt="" class="imagen" id="img1">
                <h1 class="titulo1" id="titulo2"></h1>
                <p class="parrafo" id="parrafo2"></p>
                <img src="" alt="" class="imagen" id="img2">
            </div>
            <div class="plantilla1" id="plantilla1">
            <h1 class="titulo1" id="titulo3"></h1>
                <p class="parrafo" id="parrafo3"></p>
                <img src="" alt="" class="imagen" id="img3">
                <p class="parrafo" id="parrafo4"></p>
                <img src="" alt="" class="imagen" id="img4">
            </div>

        </section>
    </div>
</body>

</html>