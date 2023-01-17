<?php
include_once "Dulces.php";

class Chocolate extends Dulce
{

    function __construct(
        $nombre,
        $numero,
        $precio,
        private $porcentajeCacao,
        private $peso
    ) {
        parent::__construct($nombre, $numero, $precio);
        $this->porcentajeCacao = $porcentajeCacao;
        $this->peso = $peso;
    }

    public function getPorcentajeCacao()
    {
        return $this->porcentajeCacao;
    }

    public function getPeso()
    {
        return $this->peso;
    }

    function muestraResumen()
    {
        return parent::muestraResumen() .
            "Porcentaje de Cacao: " . $this->porcentajeCacao . "%<br>
            Peso: " . $this->peso . "gr<br>";
    }
}