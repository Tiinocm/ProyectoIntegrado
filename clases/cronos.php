<?php
/* hecho por tino */
class cronos extends connection {
    protected $publicadas = [];
    protected $noticia =  [];

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

            for ($i=0; $i < count($rows); $i++) { 
                array_push($this->publicadas, new noticia($rows[$i]["id_noticia"], $rows[$i]["nombre"], $rows[$i]["usuario"], $rows[$i]["fecha"], $rows[$i]["votos"], $rows[$i]["imagen_portada"], $rows[$i]["publicidad"], $rows[$i]["titulo"], $rows[$i]["plantilla"]));
            }
        } catch (PDOException $e) {
            echo 'Falló la consulta: ' . $e->getMessage();
        }
    }

    public function getNoticia($id)
    {
        /* 
        SELECT noticias.id_noticia, noticias.usuario, noticias.fecha, noticias.titulo, noticias.imagen_portada, noticias.votos, comunidad.nombre, comunidad.id_comunidad, parrafos.posicion AS posicion_parrafos, parrafos.texto AS texto_parrafos, multimedia.posicion AS posicion_multimedia, multimedia.ruta AS ruta_multimedia FROM noticias INNER JOIN comunidad ON noticias.id_comunidad = comunidad.id_comunidad INNER JOIN parrafos ON parrafos.id_noticia = noticias.id_noticia INNER JOIN multimedia ON multimedia.id_noticia = noticias.id_noticia WHERE noticias.id_noticia = 1
        */
    }

    public function drawNoticias($lugar)
    {
        /* muestra por pantalla las noticias de index.html (cabe destacar que al haber dos formato de noticias diferentes $lugar identifica el formato que se le da dependiendo de donde deberían de ir) */
        $countFor = count($this->publicadas);
        if ($lugar != "destacadas") {
            $i = 3;
        }else{
            $countFor = 3;
        }
        $str = "";
        for ($i=0; $i < $countFor; $i++) { 
            $num = ($i % 2 == 0) ? "par" : "impar";
            $str .= "<li class='noticia noti$i $num'>";
            $str .= "<a href='noticiaIndividual.php?id=". $this->publicadas[$i]->getId() . "'><div class='titulo'>" . $this->publicadas[$i]->getTitulo() . "</div></a>";
            $str .= "<div class='comunidad'>" . $this->publicadas[$i]->getNombreComunidad() . "</div></li>";
            if ($lugar != "destacadas") {
                $str .= '<li class="textNoticia"><a href="noticiaIndividual.php?id=' . $this->publicadas[$i]->getId() . '"><div class="tituloT">' . $this->publicadas[$i]->getTitulo() . '</div></a></li>';
            }
        }
        echo $str;  
    }

    public function drawComunitario()
    {
        /* muestra por pantalla las noticias de comunitario.php */
        for ($i=0; $i < count($this->publicadas); $i++) { 
            $num = ($i % 2 == 0) ? "par" : "impar";
            $str = "<li class='noticia noti$i $num'>";
            $str .= "<a href='noticiaIndividual.php?id=". $this->publicadas[$i]->getId() . "'><div class='titulo'>" . $this->publicadas[$i]->getTitulo() . "</div></a>";
            $str .= "<div class='comunidad'>" . $this->publicadas[$i]->getNombreComunidad() . "</div>
            </li>";
                $str .= '<li class="textNoticia"><a href="noticiaIndividual.php?id=' . $this->publicadas[$i]->getId() . '"<div class="tituloT">' . $this->publicadas[$i]->getTitulo() . '</div></a></li>';
            echo $str;  
        }
    }

    public function styleNoticias()
    {
        /* carga un css a la etiqueta <style> en el head de los html que necesitan un estilo para las noticias */
        for ($i=0; $i < count($this->publicadas); $i++) { 
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

    public function insertNoticia()
    {
        /* INSERT INTO `plantilla1`(`id_noticia`, `titulo1`, `parrafo1`, `img1`, `parrafo2`, `img2`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]') */
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
            
            try {
                $maxId = $this->getIdNoticia();
                $maxId++;

                $titulo = $_POST["titulo"];
                $imgPortada = $location;
                $comunidad = "";
                $user = "";
                $date = date("Y-m-d");
                $plantilla = $_POST["plantilla"];

                $sqlNoticias = "INSERT INTO `noticias`(`id_noticia`, `id_comunidad`, `usuario`, `fecha`, `votos`, `imagen_portada`, `publicidad`, `titulo`, `plantilla`) VALUES ($maxId,1,'$user','$date',0,'$location',0,'$titulo','$plantilla')";
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
                }else{
                    $sql = "INSERT INTO `plantilla1`(`id_noticia`, `titulo1`, `parrafo1`, `img1`, `parrafo2`, `img2`) VALUES ($maxId,'$titulo3','$parrafo3','$location3','$parrafo4','$location4')";
                    $this->conn->exec($sql);
                }
                
            } catch (PDOException $e) {
                echo 'Falló la consulta: ' . $e->getMessage();
            }
        }

        return $location;

    }

    private function getIdNoticia()
    {
        try {
            $sql = "SELECT id_noticia FROM noticias WHERE id_noticia = (SELECT max(id_noticia) FROM noticias)";
            $maxNoticia = $this->conn->query($sql);
            $maxNoticia = $maxNoticia->fetchAll(PDO::FETCH_ASSOC);
            return $maxNoticia[0]["id_noticia"];
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function insertImagen()
    {

    }
}
