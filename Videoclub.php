<?php
include_once "CintaVideo.php"; 
include_once "Dvd.php"; 
include_once "Juego.php"; 
include_once "Cliente.php"; 

class Videoclub {
    // Propiedades
    private string $nombre;
    private array $productos = []; // Array de soportes
    private int $numProductos = 0;
    private array $socios = []; // Array de clientes
    private int $numSocios = 0;

    // Constructor
    public function __construct(string $nombre) {
        $this->nombre = $nombre;
    }

    // Métodos para incluir productos
    private function incluirProducto(Soporte $producto): void {
        $this->productos[] = $producto;
        $this->numProductos++;
    }

    public function incluirCintaVideo(string $titulo, float $precio, int $duracion): void {
        $producto = new CintaVideo($titulo, $this->numProductos + 1, $precio, $duracion);
        $this->incluirProducto($producto);
    }

    public function incluirDvd(string $titulo, float $precio, array $idiomas, string $formatoPantalla): void {
        $producto = new Dvd($titulo, $this->numProductos + 1, $precio, $idiomas, $formatoPantalla);
        $this->incluirProducto($producto);
    }

    public function incluirJuego(string $titulo, float $precio, string $consola, int $minJugadores, int $maxJugadores): void {
        $producto = new Juego($titulo, $this->numProductos + 1, $precio, $consola, $minJugadores, $maxJugadores);
        $this->incluirProducto($producto);
    }

    // Métodos para incluir socios
    public function incluirSocio(string $nombre, int $maxAlquilerConcurrente = 3): void {
        $socio = new Cliente($nombre, $this->numSocios + 1, $maxAlquilerConcurrente);
        $this->socios[] = $socio;
        $this->numSocios++;
    }

    // Listar productos
    public function listarProductos(): void {
        echo "Listado de productos en el videoclub '{$this->nombre}':\n";
        foreach ($this->productos as $producto) {
            $producto->muestraResumen();
            echo "\n";
        }
    }

    // Listar socios
    public function listarSocios(): void {
        echo "Listado de socios del videoclub '{$this->nombre}':\n";
        foreach ($this->socios as $socio) {
            $socio->muestraResumen();
        }
    }

    // Alquilar producto a un socio
    public function alquilarSocioProducto(int $numeroCliente, int $numeroSoporte): void {
        $cliente = $this->buscarSocioPorNumero($numeroCliente);
        $soporte = $this->buscarProductoPorNumero($numeroSoporte);

        if ($cliente && $soporte) {
            $cliente->alquilar($soporte);
        } else {
            echo "No se pudo realizar el alquiler: ";
            if (!$cliente) {
                echo "el cliente con número {$numeroCliente} no existe.\n";
            }
            if (!$soporte) {
                echo "el soporte con número {$numeroSoporte} no existe.\n";
            }
        }
    }

    // Buscar cliente por número
    private function buscarSocioPorNumero(int $numeroCliente): ?Cliente {
        foreach ($this->socios as $socio) {
            if ($socio->getNumero() === $numeroCliente) {
                return $socio;
            }
        }
        return null;
    }

    // Buscar producto por número
    private function buscarProductoPorNumero(int $numeroSoporte): ?Soporte {
        foreach ($this->productos as $producto) {
            if ($producto->getNumero() === $numeroSoporte) {
                return $producto;
            }
        }
        return null;
    }
}
?>
