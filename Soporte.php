<?php

class Soporte {
  
    public $titulo;      
    protected $numero;   
    private $precio;    
    // IVA con un valor del 21%
    private static $IVA = 0.21;


    // Getter para el título
    public function getTitulo() {
        return $this->titulo;
    }

    // Constructor
    public function __construct($titulo, $precio, $numero) {
        $this->titulo = $titulo;
        $this->precio = $precio;
        $this->numero = $numero;
    }

public function getPrecio() {
        return $this->precio;
    }

 public function getPrecioConIVA() {
        return $this->precio * (1 + self::$IVA);
    }
    
public function getNumero() {
        return $this->numero;
    }

// Método para mostrar el resumen del soporte
     public function muestraResumen() {
        echo "<br>Resumen del soporte:<br>";
        echo "Título: " . $this->titulo . "<br>";
        echo "Número de unidades: " . $this->getNumero() . "<br>";
        echo "Precio sin IVA: " . $this->getPrecio() . " euros<br>";
        echo "Precio con IVA: " . $this->getPrecioConIVA() . " euros<br>";
    }
}
?>
