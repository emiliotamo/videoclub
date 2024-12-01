<?php

include_once "Soporte.php";
class CintaVideo extends Soporte {
    private $duracion;

    public function __construct($titulo, $numero, $precio, $duracion) {
        parent::__construct($titulo, $numero, $precio);
        $this->duracion = $duracion;
    }

     // Método para mostrar el resumen
 public function muestraResumen() {
        // Llamamos al método de la clase padre
        parent::muestraResumen();
        // Añadimos la duración al resumen
        echo "Duración: " . $this->duracion . " minutos<br>";
    }
}
?>
