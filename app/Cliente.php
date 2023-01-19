<?php
include_once "Dulce.php";
include_once "./util/DulceNoCompradoException.php";

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

        if (in_array($dulce, $this->dulcesComprados)) {
            return true;
        } else {
            throw new DulceNoCompradoException("No ha sido posible completar la compra");
        }
    }

    public function valorar(Dulce $dulce, string $comentario)
    {
        try {
            if ($this->listaDeDulces($dulce)) {
                echo "Se ha publicado su valoración con éxito";
            } else {
                throw new DulceNoCompradoException("El dulce que desea valorar no lo has comprado aún");
            }
        } catch (DulceNoCompradoException $e) {
            echo $e->getMensaje();
        }
        
    }

    public function listaDeDulces(Dulce $dulce): bool
    {
        return in_array($dulce, $this->dulcesComprados);
    }

    public function listarPedidos()
    {
        //* He cambiado la función de void a String para poder llamarla desde muestraResumen y no descuadre todo al mostrarlo.
        $str = "Has realizado " . $this->numPedidosEfectuados . " pedidos:";

        foreach ($this->dulcesComprados as $d) {
            $str .= "<br>- " . $d->nombre;
        }

        return $str;
    }

    public function muestraResumen()
    {
        return "</br><strong>" . $this->nombre . "</strong><br>
            Número: " . $this->numero . "<br>" .
            $this->listarPedidos();
    }
}
