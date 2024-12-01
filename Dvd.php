<?php
include_once "Soporte.php";

class Dvd extends Soporte {
    private $idiomas;
    private $formatoPantalla;

public function __construct(string $titulo, int $numero, float $precio, array $idiomas, string $formatoPantalla) {
        parent::__construct($titulo, $numero, $precio);
        $this->idiomas = $idiomas;
        $this->formatoPantalla = $formatoPantalla;
    }

public function muestraResumen() {
        parent::muestraResumen();
        echo "Idiomas: " . implode(", ", $this->idiomas) . "<br>"; 
        echo "Formato de pantalla: " . $this->formatoPantalla . "<br>";
    }
}
?>
