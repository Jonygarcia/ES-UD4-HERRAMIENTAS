<?php
include_once "app/Chocolate.php";

$chocolate = new Chocolate("Belgium", 3, 2.99, 75, 120);

echo ($chocolate->muestraResumen());
