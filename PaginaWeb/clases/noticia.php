<?php

class noticia
{
    protected $id;
    protected $idComunidad;
    protected $usuario;
    protected $fecha;
    protected $votos;
    protected $imagenPortada;
    protected $publico;
    protected $titulo;
    protected $posiciones;

    public function __construct($id, $idComunidad, $usuario, $fecha, $votos, $imagenPortada, $publico, $titulo, $posiciones)
    {
        $this->id = $id;
        $this->idComunidad = $idComunidad;
        $this->usuario = $usuario;
        $this->formatoFecha($fecha);
        $this->votos = $votos;
        $this->imagenPortada = $imagenPortada;
        $this->publico = $publico;
        $this->titulo = $titulo;
        $this->posiciones = $posiciones;
    }

    private function formatoFecha($fecha)
    {
        $fecha = strtotime($fecha);
        $fecha = date("j M Y", $fecha);
        $this->fecha = $fecha;
    }
}
