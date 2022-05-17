<?php
require_once "autoloading.php";
$security = new security();
$security->checkLoggedIn();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/CRONOS-icono.png" type="image/x-icon">
    <link rel="stylesheet" href="css/creacionNoticia.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Lora&display=swap" rel="stylesheet">
    <script src="create.js"></script>
    <title>TítuloNoticia</title>
    <style>
        header::before {
            background-image: url(img/cronos_logo.png);
        }
    </style>
</head>

<body>
    <div class="grid">
        <header class="header">
            <img class="imgHeader" src="img/cronos_logo.png" alt="">
        </header>
        <aside class="ham">
            <input type="checkbox" id="active">
            <label for="active" class="menu-btn"><span></span></label>
            <label for="active" class="close"></label>
            <div class="wrapper">
                <ul>
                    <li><a href="login.php"><?= ($security->getUserData()) ? $security->getUserData() : "Iniciar Sesión" ?></a></li>
                    <li><a href="create.html">Crear mi propia noticia</a></li>
                    <li><a href="index.php">Noticias destacadas</a></li>
                    <li><a href="comunitario.php">Noticias comunitarias</a></li>
                </ul>
            </div>
        </aside>

        <section class="noticia">
            <form action="" method="post" id="formulario">
                <div class="titulo">
                    <label for="titulo" class="obligatorio">Título: </label>
                    <input type="text" name="titulo" id="titulo" placeholder="Inserte el título de la noticia" required><br>
                    <label for="img" class="obligatorio">imagen de portada: </label>
                    <input type="file" name="img" id="img" required>
                    <br>
                    <cite class="autor">Escrito por <a href="#" class="users"><?= $security->getUserData() ?></a></cite>
                    <div class="dia"><?= date("j M Y") ?></div>
                </div>

                <div class="comunidades">
                    <label for="comunidades">Selecciona la comunidad</label>
                    <select name="comunidades" id="comunidades">
                        <option value="0">Lol</option>
                    </select>
                </div>

                <div class="selectorPlantilla">
                <label for="plantilla">Plantilla a usar: </label>
                <select name="plantilla" id="plantilla">
                    <option value="0">Dos secciones con imágenes</option>
                    <option value="1">Una sección con imágenes</option>
                </select>
                <button id="add">usar plantilla</button>
                </div>
                <div id="elementNoticia">


                    <section class="plantilla0" id="plantilla0">
                        <label for="titulo1">título de la sección 1: </label>
                        <input type="text" name="titulo1" id="titulo1"><br>
                        <textarea name="text1" id="text1" cols="45" rows="10"></textarea><br>
                        <input type="file" name="img1" id="img1"><br>

                        <label for="titulo2">título de la sección 2: </label>
                        <input type="text" name="titulo2" id="titulo2"><br>
                        <textarea name="text2" id="text2" cols="45" rows="10"></textarea><br>
                        <input type="file" name="img2" id="img2"><br>
                    </section>

                    <section class="plantilla1" id="plantilla1">
                        <label for="titulo3">título de la sección 1: </label>
                        <input type="text" name="titulo3" id="titulo3"><br>
                        <textarea name="text3" id="text3" cols="45" rows="10"></textarea><br>
                        <input type="file" name="img3" id="img3"><br>

                        <textarea name="text4" id="text4" cols="45" rows="10"></textarea><br>
                        <input type="file" name="img4" id="img4"><br>
                    </section>
                </div>
                <button type="submit" class="submit">Enviar todo y terminar</button>
            </form>

        </section>
    </div>
</body>
</html>