<?php
include_once "Tarta.php";

$rellenos = ["Negro", "Avellana", "Blanco"];
$tarta = new Tarta("Tres chocolates", 4, 8.50, 3, $rellenos, 2, 4);

echo ($tarta->muestraResumen());
