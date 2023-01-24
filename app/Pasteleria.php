<?php

use Monolog\Logger;
use util\LogFactory;

include_once "Chocolate.php";
include_once "Bollo.php";
include_once "Tarta.php";
include_once "Cliente.php";
include_once "./util/ClienteNoEncontradoException.php";
include_once "./util/DulceNoEncontradoException.php";
include_once "./util/DulceNoCompradoException.php";
include_once "./util/LogFactory.php";

class Pasteleria
{

    private $productos = [];
    private $numProductos = 0;
    private $clientes = [];
    private $numClientes = 0;
    private Logger $log;

    function __construct(
        private $nombre
    ) {
        $this->log = LogFactory::getLogger();
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
        $this->log->info("Se ha creado el producto ", [$prod->nombre]);
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
        $this->log->info("Se ha creado el cliente ", [$nombre]);
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
        try {
            $saveCliente = "";
            $saveProducto = "";

            foreach ($this->clientes as $cliente) {
                if ($cliente->getNumero() == $numeroCliente) {
                    $saveCliente = $cliente;
                    try {
                        foreach ($this->productos as $producto) {
                            if ($producto->getNumero() == $numeroDulce) {
                                $saveProducto = $producto;
                                $cliente->comprar($producto);
                                return $this;
                            }
                        }
                    } catch (DulceNoCompradoException $e) {
                        echo $e->getMensaje();
                    }
                }
            }

            if ($saveCliente === "") {
                $this->log->warning("No se ha encontrado el cliente ", [$numeroCliente]);
                throw new ClienteNoEncontradoException("El número no coincide con ninguno de los clientes registrados<br>");
            } else if ($saveProducto === "") {
                $this->log->warning("No se ha encontrado el producto ", [$numeroDulce]);
                throw new DulceNoEncontradoException("El número no coincide con ninguno de los dulces registrados<br>");
            }
        } catch (ClienteNoEncontradoException $e) {
            echo $e->getMensaje();
        } catch (DulceNoEncontradoException $e) {
            echo $e->getMensaje();
        }
        return $this;
    }
}
