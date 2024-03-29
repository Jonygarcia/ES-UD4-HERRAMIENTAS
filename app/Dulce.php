<?php
include_once "Resumible.php";

abstract class Dulce implements Resumible
{
    private const IVA = 0.21;

    function __construct(
        public $nombre,
        protected $numero,
        private $precio
    ) {
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getPrecioConIVA()
    {
        return $this->precio + ($this->precio * self::IVA);
    }

    public function muestraResumen()
    {
        return "<br><strong>Nombre: " . $this->nombre . "</strong><br>
            Número: " . $this->numero . "<br>
            Precio: " . $this->precio . "€<br>
            Precio IVA incluido: " . $this->getPrecioConIVA() . "€<br>";
    }
}
