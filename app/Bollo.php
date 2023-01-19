<?php
include_once "Dulce.php";

class Bollo extends Dulce
{
    function __construct(
        $nombre,
        $numero,
        $precio,
        private $relleno
    ) {
        parent::__construct($nombre, $numero, $precio);
    }

    public function getRelleno()
    {
        return $this->relleno;
    }

    function muestraResumen()
    {
        return parent::muestraResumen() .
            "Relleno: " . $this->relleno . "<br>";
    }
}
