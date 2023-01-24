<?php
use PHPUnit\Framework\TestCase;

include_once "./app/Pasteleria.php";

class PasteleriaTest extends TestCase {
    public function testPasteleria() {
        $pasteleria = new Pasteleria("Dulces Román");
        $this->assertSame("Dulces Román", $pasteleria->getNombre());
        $this->assertNotSame("Dulces Ramón", $pasteleria->getNombre());
    }
}