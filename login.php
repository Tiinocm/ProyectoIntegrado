<?php

require_once "autoloading.php";
$security = new security();
$loginMessage = $security->doLogin();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="css/bulma.css">
    <link rel="stylesheet" href="css/inicioSesion.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Lora&display=swap" rel="stylesheet">
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
                    <li><a href="#">Iniciar Sesión</a></li>
                    <li><a href="create.html">Crear mi propia noticia</a></li>
                    <li><a href="index.php">Noticias destacadas</a></li>
                    <li><a href="comunitario.php">Noticias comunitarias</a></li>
                </ul>
            </div>
        </aside>
    </div>
    <section class="section columns">
        <div class="column"></div>
        <div class="column box contenido has-text-centered">
            <h1 style="color: red"><?= $loginMessage ?></h1>
            <p class="formulario">
            <form method="post" action="login.php">
                <label for="userName" class="label">userName: </label>
                <input type="text" name="userName" id="userName" class="input">
                <label for="password" class="label">Contraseña: </label>
                <input type="password" name="password" id="password" class="input">
                <button class="button mt-1">Inicio</button>
                <p>¿Todavía no tienes una cuenta? Registrate <a href="register.php">aquí</a></p>
            </form>
            </p>
        </div>
        <div class="column"></div>
    </section>

</body>

</html>