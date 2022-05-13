<?php

class cronos extends connection {
    protected $publicadas = [];

    public function getNoticias($publicado)
    {
        /* 
            $publicado = 1 noticias publicadas
            $publicado = 0 noticias NO publicadas
        */
        try {
            $sql = "SELECT noticias.id_noticia, comunidad.nombre, noticias.usuario, noticias.fecha, noticias.votos, noticias.imagen_portada, noticias.publicidad, noticias.titulo, noticias.posiciones from noticias
            inner join comunidad on noticias.id_comunidad = comunidad.id_comunidad
            where publicidad = $publicado ORDER BY votos DESC";
            $rows = $this->conn->query($sql);
            $rows = $rows->fetchAll(PDO::FETCH_ASSOC);

            for ($i=0; $i < count($rows); $i++) { 
                array_push($this->publicadas, new noticia($rows[$i]["id_noticia"], $rows[$i]["nombre"], $rows[$i]["usuario"], $rows[$i]["fecha"], $rows[$i]["votos"], $rows[$i]["imagen_portada"], $rows[$i]["publicidad"], $rows[$i]["titulo"], $rows[$i]["posiciones"]));
            }
        } catch (PDOException $e) {
            echo 'Falló la consulta: ' . $e->getMessage();
        }
    }

    public function drawNoticias($lugar)
    {
        $countFor = count($this->publicadas);
        for ($i=0; $i < $countFor; $i++) { 
            if ($lugar != "destacadas") {
                $i = 3;
            }else{
                $countFor = 3;
            }
            $str = "<li class='noticia noti$i'>";
            $str .= "<a href='noticiaIndividual.html?id=". $this->publicadas[$i]->getId() . "'><div class='titulo'>" . $this->publicadas[$i]->getTitulo() . "</div></a>";
            $str .= "<div class='comunidad'>" . $this->publicadas[$i]->getNombreComunidad() . "</div>
            </li>";
            if ($lugar != "destacadas") {
                $str .= '<li class="textNoticia"><div class="tituloT">' . $this->publicadas[$i]->getTitulo() . '</div></li>';
            }
            echo $str;  
        }
    }

    public function drawComunitario()
    {
        for ($i=0; $i < count($this->publicadas); $i++) { 
            $str = "<li class='noticia noti$i'>";
            $str .= "<a href='noticiaIndividual.html?id=". $this->publicadas[$i]->getId() . "'><div class='titulo'>" . $this->publicadas[$i]->getTitulo() . "</div></a>";
            $str .= "<div class='comunidad'>" . $this->publicadas[$i]->getNombreComunidad() . "</div>
            </li>";
                $str .= '<li class="textNoticia"><div class="tituloT">' . $this->publicadas[$i]->getTitulo() . '</div></li>';
            echo $str;  
        }
    }

    public function styleNoticias()
    {
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
}
