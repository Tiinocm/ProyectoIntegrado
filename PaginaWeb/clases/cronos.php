<?php

class cronos extends connection {
    protected $publicadas = [];

    public function getNoticias()
    {
        try {
            $sql = "SELECT * from noticias where publicidad = 1";
            $rows = $this->conn->query($sql);
            $rows = $rows->fetchAll(PDO::FETCH_ASSOC);

            for ($i=0; $i < count($rows); $i++) { 
                array_push($this->publicadas, new noticia($rows[$i]["id_noticia"], $rows[$i]["id_comunidad"], $rows[$i]["usuario"], $rows[$i]["fecha"], $rows[$i]["votos"], $rows[$i]["imagen_portada"], $rows[$i]["publicidad"], $rows[$i]["titulo"], $rows[$i]["posiciones"]));
            }
        } catch (PDOException $e) {
            echo 'Falló la consulta: ' . $e->getMessage();
        }
    }
}
