<?php
include_once "Soporte.php";

class Juego extends Soporte {
    // Atributos específicos de la clase Juego
    private $consola;
    private $minNumJugadores;
    private $maxNumJugadores;

    // Constructor de la clase
    public function __construct($titulo, $numero, $precio, $consola, $minNumJugadores, $maxNumJugadores) {
        // Llamamos al constructor de la clase padre
        parent::__construct($titulo, $numero, $precio);
        $this->consola = $consola;
        $this->minNumJugadores = $minNumJugadores;
        $this->maxNumJugadores = $maxNumJugadores;
    }

    // Método muestraJugadoresPosibles
    public function muestraJugadoresPosibles() {
        if ($this->minNumJugadores == 1 && $this->maxNumJugadores == 1) {
            echo "Para un jugador<br>";
        } elseif ($this->minNumJugadores == $this->maxNumJugadores) {
            echo "Para " . $this->minNumJugadores . " jugador(es)<br>";
        } else {
            echo "De " . $this->minNumJugadores . " a " . $this->maxNumJugadores . " jugadores<br>";
        }
    }

    // Método para mostrar el resumen sobrescrito
    public function muestraResumen() {
        // Llamamos al método muestraResumen de la clase padre
        parent::muestraResumen();
        echo "Consola: " . $this->consola . "<br>";
        $this->muestraJugadoresPosibles(); // Muestra los jugadores posibles
    }
}
?>
