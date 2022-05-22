<?php

class cronos extends connection
{
    protected $publicadas = [];
    protected $noticia =  [];
    /* hecho por tino */
    public function getNoticias($publicado)
    {
        /* 
            getNoticias carga desde la base de datos las noticias publicadas o no publicadas en función de la siguiente lógica:
            $publicado = 1 noticias publicadas
            $publicado = 0 noticias NO publicadas
        */
        try {
            $sql = "SELECT noticias.id_noticia, comunidad.nombre, noticias.usuario, noticias.fecha, noticias.votos, noticias.imagen_portada, noticias.publicidad, noticias.titulo, noticias.plantilla from noticias
            inner join comunidad on noticias.id_comunidad = comunidad.id_comunidad
            where publicidad = $publicado ORDER BY votos DESC";
            $rows = $this->conn->query($sql);
            $rows = $rows->fetchAll(PDO::FETCH_ASSOC);

            for ($i = 0; $i < count($rows); $i++) {
                array_push($this->publicadas, new noticia($rows[$i]["id_noticia"], $rows[$i]["nombre"], $rows[$i]["usuario"], $rows[$i]["fecha"], $rows[$i]["votos"], $rows[$i]["imagen_portada"], $rows[$i]["publicidad"], $rows[$i]["titulo"], $rows[$i]["plantilla"]));
            }
        } catch (PDOException $e) {
            echo 'Falló la consulta: ' . $e->getMessage();
        }
    }
    
    /* hecho por tino */
    public function getNoticia($id)
    {
        /* 
            SELECT fecha, 
            (SELECT comunidad.nombre from comunidad where comunidad.id_comunidad = noticias.id_comunidad) AS nombre_comunidad,
            usuario, votos, imagen_portada, titulo, plantilla
            FROM `noticias` WHERE noticias.id_noticia = 8;
            luego un if de plantilla para conceatenar el resto de la consulta
        */

        try {
            $plantilla = "SELECT plantilla from noticias WHERE id_noticia = $id";
            $sqlPlantilla = $this->conn->query($plantilla);
            $sqlPlantilla = $sqlPlantilla->fetchAll(PDO::FETCH_ASSOC);
            $plantilla = $sqlPlantilla[0]["plantilla"];

            if ($plantilla == 0) {
                $strPlantilla = "plantilla0.titulo1, plantilla0.parrafo1, plantilla0.img1, plantilla0.titulo2, plantilla0.parrafo2, plantilla0.img2";
            } else {
                $strPlantilla = "plantilla1.titulo1, plantilla1.parrafo1, plantilla1.img1, plantilla1.parrafo2, plantilla1.img2";
            }

            $plantillaNum = "plantilla" . $plantilla;
            $sql = "SELECT fecha, 
            (SELECT comunidad.nombre from comunidad where comunidad.id_comunidad = noticias.id_comunidad) AS nombre_comunidad,
            usuario, votos, imagen_portada, titulo, plantilla, $strPlantilla
            FROM `noticias`
            INNER JOIN $plantillaNum on noticias.id_noticia = $plantillaNum.id_noticia
            WHERE noticias.id_noticia = $id";

            $sqlQuery = $this->conn->query($sql);
            return $sqlQuery->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Falló la consulta: ' . $e->getMessage();
        }
    }

    /* hecho por tino */
    public function drawNoticias($lugar)
    {

        /* 
            <li class='noticia noti$i $num'>
            <div class='titulo'> <a href='noticiaIndividual.php?id=8'> Título </a></div> 
            <div class="votos"> <i class="icon fa-regular fa-heart id=8"></i> <span id="countvotos">123</span> </div>
            <div class='comunidad'> comunidad</div> </li>
        */
        $countFor = count($this->publicadas);
        if ($lugar != "destacadas") {
            $i = 3;
        } else {
            $countFor = 3;
            $i = 0;
        }
        $str = "";
        for ($i; $i < $countFor; $i++) {
            $num = ($i % 2 == 0) ? "par" : "impar";
            $str .= "<li class='noticia noti$i $num'>";
            $str .= "<div class='titulo'><a href='noticiaIndividual.php?id=" . $this->publicadas[$i]->getId() . "'>" . $this->publicadas[$i]->getTitulo() . "</a></div>" .  '<div class="votos"><i class="icon fa-regular fa-heart id=' . $this->publicadas[$i]->getId() . '"></i> <span class="countvotos">' . $this->publicadas[$i]->getVotos() . '</span></div>';
            $str .= "<a href='comunidades.php?nombre=" . $this->publicadas[$i]->getNombreComunidad(). "'><div class='comunidad'>" . $this->publicadas[$i]->getNombreComunidad() . "</div></li>";
            if ($lugar != "destacadas") {
                $str .= '<li class="textNoticia"><a href="noticiaIndividual.php?id=' . $this->publicadas[$i]->getId() . '"><div class="tituloT">' . $this->publicadas[$i]->getTitulo() . '</div></a></li>';
            }
        }
        echo $str;
    }


    public function styleNoticia($id)
    {
        /* 
        header::before {
            background-image: url(img/zeri.png);
        }
        */
        try {
            $sql = "SELECT imagen_portada FROM noticias where id_noticia = $id";
            $sql = $this->conn->query($sql);
            $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Falló la consulta: ' . $e->getMessage();
        }
        $img = $sql[0]["imagen_portada"];
        return "header::before {
            background-image: url($img);
        }";
    }

    /* hecho por tino */
    public function drawComunitario()
    {
        /* muestra por pantalla las noticias de comunitario.php */
        for ($i = 0; $i < count($this->publicadas); $i++) {
            $num = ($i % 2 == 0) ? "par" : "impar";
            $str = "<li class='noticia noti$i $num'>";
            $str .= "<a href='noticiaIndividual.php?id=" . $this->publicadas[$i]->getId() . "'><div class='titulo'>" . $this->publicadas[$i]->getTitulo() . "</div></a>" .  '<div class="votos"><i class="icon fa-regular fa-heart id=' . $this->publicadas[$i]->getId() . '"></i> <span class="countvotos">' . $this->publicadas[$i]->getVotos() . '</span></div>'  ;
            $str .= "<a href='comunidades.php?nombre=" . $this->publicadas[$i]->getNombreComunidad(). "'><div class='comunidad'>" . $this->publicadas[$i]->getNombreComunidad() . "</div>
            </li>";
            $str .= '<li class="textNoticia"><a href="noticiaIndividual.php?id=' . $this->publicadas[$i]->getId() . '"<div class="tituloT">' . $this->publicadas[$i]->getTitulo() . '</div></a> <br> <a class="publicar" href="publicar.php?id=' . $this->publicadas[$i]->getId() . '">Publicar noticia</a> </li>';
            echo $str;
        }
    }

    /* hecho por tino */
    public function styleNoticias()
    {
        /* carga un css a la etiqueta <style> en el head de los html que necesitan un estilo para las noticias */
        for ($i = 0; $i < count($this->publicadas); $i++) {
            $style = ".noti$i::before {
                content: '';
                position: relative;
                display: block;
                background-image: url(" . $this->publicadas[$i]->getImagenPortada() . ");
                width: 100%;
                height: 100%;
                background-size: 100%;
                filter: brightness(65%);
            }";
            echo $style;
        }
    }

    /* hecho por tino */
    public function insertNoticia()
    {
        $location = "img/" . $_FILES["img"]["name"];
        $temporal = $_FILES["img"]["tmp_name"];

        $location1 = "img/" . $_FILES["img1"]["name"];
        $temporal1 = $_FILES["img1"]["tmp_name"];

        $location2 = "img/" . $_FILES["img2"]["name"];
        $temporal2 = $_FILES["img2"]["tmp_name"];

        $location3 = "img/" . $_FILES["img3"]["name"];
        $temporal3 = $_FILES["img3"]["tmp_name"];

        $location4 = "img/" . $_FILES["img4"]["name"];
        $temporal4 = $_FILES["img4"]["tmp_name"];

        if (move_uploaded_file($temporal, $location)) {
            move_uploaded_file($temporal1, $location1);
            move_uploaded_file($temporal2, $location2);
            move_uploaded_file($temporal3, $location3);
            move_uploaded_file($temporal4, $location4);
            try {
                $maxId = $this->getIdNoticia();
                $maxId++;
                $titulo = $_POST["titulo"];
                $imgPortada = $location;
                $comunidad = $_POST["comunidades"];
                $user = $_POST["user"];
                $date = date("Y-m-d");
                $plantilla = $_POST["plantilla"];

                $sqlNoticias = "INSERT INTO `noticias`(`id_noticia`, `id_comunidad`, `usuario`, `fecha`, `votos`, `imagen_portada`, `publicidad`, `titulo`, `plantilla`) VALUES ($maxId,$comunidad,'$user','$date',0,'$location',0,'$titulo','$plantilla')";
                $this->conn->exec($sqlNoticias);
                $titulo1 = $_POST["titulo1"];
                $titulo2 = $_POST["titulo2"];
                $titulo3 = $_POST["titulo3"];
                $parrafo1 = $_POST["text1"];
                $parrafo2 = $_POST["text2"];
                $parrafo3 = $_POST["text3"];
                $parrafo4 = $_POST["text4"];

                if ($_POST["plantilla"] == 0) {
                    $sql = "INSERT INTO `plantilla0`(`id_noticia`, `titulo1`, `parrafo1`, `img1`, `titulo2`, `parrafo2`, `img2`) VALUES ($maxId,'$titulo1','$parrafo1','$location1','$titulo2','$parrafo2','$location2')";
                    $this->conn->exec($sql);

                } else {
                    $sql = "INSERT INTO `plantilla1`(`id_noticia`, `titulo1`, `parrafo1`, `img1`, `parrafo2`, `img2`) VALUES ($maxId,'$titulo3','$parrafo3','$location3','$parrafo4','$location4')";
                    $this->conn->exec($sql);

                }
            } catch (PDOException $e) {
                echo 'Falló la consulta: ' . $e->getMessage();
            }
        } else {
            echo "los ficheros no se pudieron subir correctamente";
        }

        return $location;
    }

    /* hecho por tino */
    private function getIdNoticia()
    {
        try {
            $sql = "SELECT id_noticia FROM noticias WHERE id_noticia = (SELECT max(id_noticia) FROM noticias)";
            $maxNoticia = $this->conn->query($sql);
            $maxNoticia = $maxNoticia->fetchAll(PDO::FETCH_ASSOC);
            return $maxNoticia[0]["id_noticia"];
        } catch (PDOException $e) {
            echo 'Falló la consulta: ' . $e->getMessage();
        }
    }

    /* Tino */
    public function selectComunidad()
    {
        try {
            $sql = "SELECT id_comunidad, nombre from comunidad";
            $comunidades = $this->conn->query($sql);
            $comunidades = $comunidades->fetchAll(PDO::FETCH_ASSOC);
            $str = "";
            for ($i = 0; $i < count($comunidades); $i++) {
                $str .= '<option value="' . $comunidades[$i]["id_comunidad"] . '">' . $comunidades[$i]["nombre"] . '</option>';
            }
            echo $str;
        } catch (PDOException $e) {
            echo 'Falló la consulta: ' . $e->getMessage();
        }
    }

    /* Alejandro */
    public function updateVotos($id, $operacion)
    {
        try {
            $cantVotos = "SELECT votos from noticias WHERE id_noticia = $id";
            $cantVotos = $this->conn->query($cantVotos);
            $cantVotos = $cantVotos->fetchAll(PDO::FETCH_ASSOC);
            $cantVotos = $cantVotos[0]["votos"];

            if ($operacion == "true") {
                $cantVotos += 1;
            } else {
                $cantVotos -= 1;
            }


            $sqlUpdate = "UPDATE `noticias` SET `votos`=$cantVotos WHERE noticias.id_noticia = $id";
            $sqlUpdate = $this->conn->query($sqlUpdate);
            return $cantVotos;
        } catch (PDOException $e) {
            echo 'Falló la consulta: ' . $e->getMessage();
        }
    }

    /* Tino */
    public function modOption()
    {
        return '<li><a href="comunitario.php?pub=0">Noticias no publicadas</a></li>';
    }

    /* Tino */
    public function publicarNoticia($id)
    {
        try {
            $sql = "UPDATE `noticias` SET `publicidad` = '1' WHERE `noticias`.`id_noticia` = $id";
            $this->conn->query($sql);
        } catch (PDOException $e) {
            echo 'Falló la consulta: ' . $e->getMessage();
        }
    }

    /* Tino */
    public function mostrarEnlace()
    {
        return ".publicar{ display: block}";
    }

    /* Candela */
    public function filtarComunidad($comunidad)
    {
        /* al hacer click en una comunidad, podrás ver las noticas filtradas por esa comunidad */
        try {
            $sql = "SELECT noticias.id_noticia, comunidad.nombre, noticias.usuario, noticias.fecha, noticias.votos, noticias.imagen_portada, noticias.publicidad, noticias.titulo, noticias.plantilla from noticias
            inner join comunidad on noticias.id_comunidad = comunidad.id_comunidad
            where publicidad = 1 AND comunidad.nombre = '$comunidad' ORDER BY votos DESC";
            $noticias = $this->conn->query($sql);
            $noticias = $noticias->fetchAll(PDO::FETCH_ASSOC);

            for ($i = 0; $i < count($noticias); $i++) {
                $num = ($i % 2 == 0) ? "par" : "impar";
                $str = "<li class='noticia noti$i $num'>";
                $str .= "<a href='noticiaIndividual.php?id=" . $noticias[$i]["fecha"] . "'><div class='titulo'>" . $noticias[$i]["titulo"] . "</div></a>" .  '<div class="votos"><i class="icon fa-regular fa-heart id=' . $noticias[$i]["votos"] . '"></i> <span class="countvotos">' . $noticias[$i]["votos"] . '</span></div>';
                $str .= "<div class='comunidad'>" . $noticias[$i]["nombre"] . "</div>
                </li>";
                $str .= '<li class="textNoticia"><a href="noticiaIndividual.php?id=' . $noticias[$i]["id_noticia"] . '"<div class="tituloT">' . $noticias[$i]["titulo"] . '</div></a> <br> <a class="publicar" href="publicar.php?id=' . $noticias[$i]["fecha"] . '">Publicar noticia</a> </li>';
                echo $str;
            }
        } catch (PDOException $e) {
            echo 'Falló la consulta: ' . $e->getMessage();
        }
    }
}
