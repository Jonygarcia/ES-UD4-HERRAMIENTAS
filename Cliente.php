<?php
include_once "Dulces.php";

class Cliente
{
    private $dulcesComprados = [];
    private $numDulcesComprados;
    function __construct(
        public $nombre,
        private $numero,
        private $numPedidosEfectuados = 0
    ) {
    }

    public function getDulcesComprados()
    {
        return $this->dulcesComprados;
    }

    public function getNumDulcesComprados()
    {
        return $this->numDulcesComprados;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getNumPedidosEfectuados()
    {
        return $this->numPedidosEfectuados;
    }

    public function comprar(Dulce $dulce): bool
    {

        if(in_array($dulce, $this->dulcesComprados)){
            foreach ($this->dulcesComprados as $d => $cant) {
                if ($d == $dulce)
                    $cant += 1;
            }

            echo "Has comprado una unidad más de " . $dulce->nombre;
            $this->numDulcesComprados += 1;
        } else {

            array_push($this->dulcesComprados, $dulce);

            echo "Has comprado una unidad de " . $dulce->nombre;
            $this->numDulcesComprados += 1;
        }

        return true;
    }

    public function valorar(Dulce $dulce, string $comentario)
    {
    }

    public function listaDeDulces(Dulce $dulce): bool
    {
        return in_array($dulce, $this->dulcesComprados);
    }

    public function listarPedidos()
    {
    }
}
