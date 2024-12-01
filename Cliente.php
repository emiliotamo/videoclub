<?php
include_once "Soporte.php";

class Cliente {
    private $nombre;
    private $numero;
    private $maxAlquilerConcurrente;
    private $soportesAlquilados;
    private $numSoportesAlquilados;

    // Constructor
    public function __construct($nombre, $numero, $maxAlquilerConcurrente = 3) {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
        $this->soportesAlquilados = [];
        $this->numSoportesAlquilados = 0;
    }

    // Getter y Setter para numero
    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    // Getter para numSoportesAlquilados
    public function getNumSoportesAlquilados() {
        return $this->numSoportesAlquilados;
    }

    // Método muestraResumen
    public function muestraResumen() {
        echo "Nombre del cliente: " . $this->nombre . "<br>";
        echo "Número de alquileres realizados: " . count($this->soportesAlquilados) . "<br>";
    }

    // Método para comprobar si tiene un soporte alquilado
    public function tieneAlquilado(Soporte $s) {
        foreach ($this->soportesAlquilados as $soporte) {
            if ($soporte == $s) {
                return true;
            }
        }
        return false;
    }

    // Método para alquilar un soporte
    public function alquilar(Soporte $s) {
        if ($this->tieneAlquilado($s)) {
            echo "El soporte '" . $s->getTitulo() . "' ya está alquilado por el cliente.<br>";
            return false;
        }
        if ($this->numSoportesAlquilados >= $this->maxAlquilerConcurrente) {
            echo "El cliente ha alcanzado el máximo de alquileres concurrentes (" . $this->maxAlquilerConcurrente . ").<br>";
            return false;
        }

        // Alquilar el soporte
        $this->soportesAlquilados[] = $s;
        $this->numSoportesAlquilados++;
        echo "El cliente ha alquilado el soporte '" . $s->getTitulo() . "'.<br>";
        return true;
    }

    // Método para devolver un soporte
    public function devolver($numSoporte) {
        if (isset($this->soportesAlquilados[$numSoporte])) {
            $soporte = $this->soportesAlquilados[$numSoporte];
            unset($this->soportesAlquilados[$numSoporte]);
            $this->soportesAlquilados = array_values($this->soportesAlquilados); 
            $this->numSoportesAlquilados--;
            echo "El cliente ha devuelto el soporte '" . $soporte->getTitulo() . "'.<br>";
            return true;
        } else {
            echo "El soporte especificado no está alquilado por el cliente.<br>";
            return false;
        }
    }

    // Método para listar los alquileres
    public function listarAlquileres() {
        echo "El cliente tiene " . count($this->soportesAlquilados) . " alquileres:<br>";
        foreach ($this->soportesAlquilados as $soporte) {
            echo "- " . $soporte->getTitulo() . "<br>";
        }
    }
}
?>
