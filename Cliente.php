<?php
include_once "Dulces.php";

class Cliente
{
    private $dulcesComprados = [];

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

        array_push($this->dulcesComprados, $dulce);
        $this->numPedidosEfectuados++;

        return in_array($dulce, $this->dulcesComprados);
    }

    public function valorar(Dulce $dulce, string $comentario)
    {
        echo ($this->listaDeDulces($dulce)) ?
            "Se ha publicado su valoración con éxito" :
            "El dulce que desea valorar no lo has comprado aún";
    }

    public function listaDeDulces(Dulce $dulce): bool
    {
        return in_array($dulce, $this->dulcesComprados);
    }

    public function listarPedidos()
    {
        $str = "Has realizado " . $this->numPedidosEfectuados . " pedidos:";

        foreach ($this->dulcesComprados as $d) {
            $str .= "<br>- " . $d->nombre;
        }
    }

    public function muestraResumen()
    {
        return "</br><strong>" . $this->nombre . "</strong><br>
            Número: " . $this->numero . "<br>" .
            $this->listarPedidos();
    }
}
