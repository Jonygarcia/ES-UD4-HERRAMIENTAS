<?php
include_once "app/Bollo.php";

$bollo = new Bollo("Bollycao", 2, 0.99, "Chocolate");

echo ($bollo->muestraResumen());
