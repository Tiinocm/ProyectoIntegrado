<?php
require_once "autoloading.php";
$security = new security();
$security->register();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="">
    <title>Registrarse</title>
    <link rel="stylesheet" href="css/bulma.css">
    <link rel="stylesheet" href="css/inicioSesion.css">
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
                    <li><a href="create.html">Crear mi propia noticia</a></li>
                    <li><a href="index.php">Noticias destacadas</a></li>
                    <li><a href="comunitario.php">Noticias comunitarias</a></li>
                </ul>
            </div>
        </aside>
    </div>
    <section class="section columns">
        <div class="column"></div>
        <div class="column box has-text-centered contenido">
            <p class="formulario">
            <form method="post" action="">
                <label for="email" class="label">Email: </label>
                <input type="email" name="email" id="email" class="input">

                <label for="password" class="label">Contraseña: </label>
                <input type="password" name="password" id="password" class="input">

                <label for="password2" class="label">Repetir Contraseña: </label>
                <input type="password" name="password2" id="password2" class="input">

                <label for="name" class="name label">Nombre de Usuario: </label>
                <input type="name" name="name" id="name" class="input">
                <button type="submit" class="button mt-1">Registrarme</button>
                <p>¿Ya tienes una cuenta? Inicie sesión <a href="inicioSesion.html">aquí</a></p>
            </form>
            </p>
        </div>
        <div class="column"></div>
    </section>

</body>

</html>