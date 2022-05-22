<?php
/* tino */
require_once "autoloading.php";
$cronos = new cronos();
$cronos->getNoticias(1);

$security = new security();
$mod = ($security->isAdmin($security->getUserData())) ? $cronos->modOption() : "";
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/CRONOS-icono.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Lora&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f875adcb03.js" crossorigin="anonymous"></script>
    <script src="likes.js"></script>
    <title>Cronos</title>
    <link rel="stylesheet" href="css/index.css">
    <style>
        <?php $cronos->styleNoticias() ?>
    </style>
</head>

<body>

    <div class="grid">
        <header class="header"><img class="logo" src="img/CRONOS-icono.png">Cronos</header>
        <aside class="ham">
            <input type="checkbox" id="active">
            <label for="active" class="menu-btn"><span></span></label>
            <label for="active" class="close"></label>
            <div class="wrapper">
                <ul>
                    <li><a href="login.php"><?= ($security->getUserData()) ? $security->getUserData() : "Iniciar Sesión" ?></a></li>
                    <li><a href="create.php">Crear mi propia noticia</a></li>
                    <li><a href="#">Noticias destacadas</a></li>
                    <li><a href="comunitario.php">Noticias comunitarias</a></li>
                    <?= $mod ?>
                </ul>
            </div>
        </aside>
        <section class="destacadas">
            <!-- sección de las noticias mejor valoradas -->
            <header class="titulares">noticias mejor valoradas</header>
            <!-- lista de las noticias -->
            <ul class="mejorValoradas" id="mejorValoradas">
                <!-- cada "li" es una noticia. Las noticias se generarán mediante PHP.-->

                <?php $cronos->drawNoticias("destacadas") ?>
            </ul>
        </section>
        <section class="scroll">
            <header class="titulares">noticias scroll</header>
            <ul class="noticiasScroll">

                <?php $cronos->drawNoticias("") ?>
            </ul>
        </section>
    </div>
</body>

</html>