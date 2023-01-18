<?php
include_once "Chocolate.php";
include_once "Bollo.php";
include_once "Tarta.php";

class Pasteleria
{

    private $productos = [];
    private $numProductos = 0;
    private $clientes = [];
    private $numClientes = 0;

    function __construct(
        private $nombre
    ) {
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getProductos()
    {
        return $this->productos;
    }

    private function incluirProducto(Dulce $prod)
    {
        array_push($this->productos, $prod);
    }

    public function incluirTarta($nombre, $precio, $numPisos, $rellenos, $minC, $maxC)
    {
        $tarta = new Tarta($nombre, $this->numProductos, $precio, $numPisos, $rellenos, $minC, $maxC);
        $this->numProductos++;
        $this->incluirProducto($tarta);
    }

    public function incluirBollo($nombre, $precio, $relleno)
    {
        $bollo = new Bollo($nombre, $this->numProductos, $precio, $relleno);
        $this->numProductos++;
        $this->incluirProducto($bollo);
    }

    public function incluirChocolate($nombre, $precio, $porcentajeCacao, $peso)
    {
        $chocolate = new Chocolate($nombre, $this->numProductos, $precio, $porcentajeCacao, $peso);
        $this->numProductos++;
        $this->incluirProducto($chocolate);
    }

    public function incluirCliente($nombre)
    {
        $cliente = new Cliente($nombre, $this->numClientes);
        $this->numClientes++;
        array_push($this->clientes, $cliente);
    }

    public function listarProductos()
    {
        $str = "";
        foreach ($this->productos as $value) {
            $str .= $value->muestraResumen();
        }
        return $str;
    }

    public function listarClientes()
    {
        $str = "";
        foreach ($this->clientes as $value) {
            $str .= $value->muestraResumen();
        }
        return $str;
    }

    public function comprarClienteProducto($numeroCliente, $numeroDulce)
    {
        foreach ($this->clientes as $cliente) {
            if ($cliente->getNumero() == $numeroCliente) {
                foreach ($this->productos as $producto) {
                    if ($producto->getNumero() == $numeroDulce) {
                        if ($cliente->comprar($producto)) {
                            echo "<br>La compra de " . $producto->nombre . " se ha realizado correctamente<br>";
                        } else {
                            echo "<br>No se ha podido realizar la compra de " . $producto->nombre . "<br>";
                        }
                        return $this;
                    }
                }
                echo "<br>El producto que ha intentado comprar no existe<br>";
                return $this;
            }
        }
        echo "<br>El cliente seleccionado no existe<br>";
        return $this;
    }
}
