<?php
require_once "autoloading.php";
$cronos = new cronos;
$cronos->getNoticias(1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/CRONOS-icono.png" type="image/x-icon">
    <link rel="stylesheet" href="css/comunitario.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Lora&display=swap" rel="stylesheet">
    <title>Noticias comunitarias</title>
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
                    <li><a href="login.php">Iniciar Sesión</a></li>
                    <li><a href="create.php">Crear mi propia noticia</a></li>
                    <li><a href="index.php">Noticias destacadas</a></li>
                    <li><a href="#">Noticias comunitarias</a></li>
                </ul>
            </div>
        </aside>
    </div>
    <ul class="noticias">
        <?php $cronos->drawComunitario() ?>
    </ul>
</body>

</html>