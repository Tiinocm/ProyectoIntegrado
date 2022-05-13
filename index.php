<?php
require_once "autoloading.php";

$cronos = new cronos();
$cronos->getNoticias(1);
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/CRONOS-icono.png" type="image/x-icon">
    <title>Cronos</title>
    <link rel="stylesheet" href="css/index.css">
    <style>
       <?php $cronos->styleNoticias() ?> 
    </style>
</head>

<body>

    <div class="grid">
        <header class="header">Cronos</header>
        <aside class="ham">
            <input type="checkbox" id="active">
            <label for="active" class="menu-btn"><span></span></label>
            <label for="active" class="close"></label>
            <div class="wrapper">
                <ul>
                    <li><a href="inicioSesion.html">Iniciar Sesión</a></li>
                    <li><a href="create.html">Crear mi propia noticia</a></li>
                    <li><a href="#">Noticias destacadas</a></li>
                    <li><a href="comunitario.php">Noticias comunitarias</a></li>
                </ul>
            </div>
        </aside>
        <section class="destacadas">
            <!-- sección de las noticias mejor valoradas -->
            <header>noticias mejor valoradas</header>
            <!-- lista de las noticias -->
            <ul class="mejorValoradas" id="mejorValoradas">
                <!-- cada "li" es una noticia. Las noticias se generarán mediante PHP.-->

                    <?php $cronos->drawNoticias("destacadas") ?>
            </ul>
        </section>
        <section class="scroll">
            <header>noticias scroll</header>
            <ul class="noticiasScroll">
            <?php $cronos->drawNoticias("") ?>

            </ul>
        </section>
    </div>
</body>

</html>