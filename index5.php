<?php
include_once "app/Pasteleria.php";

$gorditos = new Pasteleria("Gorditos");

$gorditos->incluirCliente("Juan");

$gorditos->incluirChocolate("Belga", 1.99, 75, 150);
$gorditos->incluirBollo("Bollycao", 0.99, "Chocolate");
$rellenos = ["Negro", "Avellana", "Blanco"];
$gorditos->incluirTarta("Tres chocolates", 12.50, 3, $rellenos, 2, 4);

echo ($gorditos->listarProductos());
echo ($gorditos->listarClientes());

$gorditos->comprarClienteProducto(0, 1);
$gorditos->comprarClienteProducto(0, 2);
$gorditos->comprarClienteProducto(1, 2);
$gorditos->comprarClienteProducto(0, 4);
