<?php
/* hecho por tino */
class noticia
{
    protected $id;
    protected $nombreComunidad;
    protected $usuario;
    protected $fecha;
    protected $votos;
    protected $imagenPortada;
    protected $publico;
    protected $titulo;
    protected $posiciones;

    public function __construct($id, $nombreComunidad, $usuario, $fecha, $votos, $imagenPortada, $publico, $titulo, $posiciones)
    {
        $this->id = $id;
        $this->nombreComunidad = $nombreComunidad;
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

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of usuario
     */ 
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Get the value of votos
     */ 
    public function getVotos()
    {
        return $this->votos;
    }

    /**
     * Get the value of imagenPortada
     */ 
    public function getImagenPortada()
    {
        return $this->imagenPortada;
    }

    public function getPublico()
    {
        return $this->publico;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Get the value of nombreComunidad
     */ 
    public function getNombreComunidad()
    {
        return $this->nombreComunidad;
    }
}
