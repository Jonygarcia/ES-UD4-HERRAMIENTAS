<?php
include_once "Dulces.php";

class Tarta extends Dulce
{
    function __construct(
        $nombre,
        $numero,
        $precio,
        private $numPisos,
        private $rellenos = [],
        private $minNumComensales = 2,
        private $maxNumComensales
    ) {
        parent::__construct($nombre, $numero, $precio);
        $this->numPisos = $numPisos;
        $this->rellenos = $rellenos;
        $this->minNumComensales = $minNumComensales;
        $this->maxNumComensales = $maxNumComensales;
    }

    public function getNumPisos()
    {
        return $this->numPisos;
    }

    public function getRellenos()
    {
        return $this->rellenos;
    }

    public function getMinNumComensales()
    {
        return $this->minNumComensales;
    }

    public function getMaxNumComensales()
    {
        return $this->maxNumComensales;
    }

    public function muestraComensalesPosibles()
    {
        if ($this->minNumComensales < $this->maxNumComensales) {
            return "De " . $this->minNumComensales . " a " . $this->maxNumComensales . " comensales.";
        } else if ($this->minNumComensales == $this->maxNumComensales) {
            return "Para " . $this->minNumComensales . " comensales";
        } else {
            return "Hay un error en el número de comensales";
        }
    }

    public function muestraRellenos()
    {
        $str = "";

        foreach ($this->rellenos as $relleno) {
            $str .= $relleno . ", ";
        }

        return $str;
    }

    public function muestraResumen()
    {
        return parent::muestraResumen() .
            "Comensales: " . $this->muestraComensalesPosibles() . "<br>
            Número de pisos: " . $this->numPisos . "<br>
            Rellenos: " . $this->muestraRellenos();
    }
}