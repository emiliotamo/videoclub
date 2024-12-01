<?php
include_once "CintaVideo.php";
include_once "Dvd.php";
include_once "Juego.php";
include_once "Cliente.php";

// Instanciamos un par de objetos cliente
$cliente1 = new Cliente("Bruce Wayne", 23);
$cliente2 = new Cliente("Clark Kent", 33);

// Mostramos el número de cada cliente creado
echo "<br>El identificador del cliente 1 es: " . $cliente1->getNumero();
echo "<br>El identificador del cliente 2 es: " . $cliente2->getNumero();

// Instancio algunos soportes
$soporte1 = new CintaVideo("Los cazafantasmas", 23, 3.5, 107);
$soporte2 = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1);

// Aquí cambio la cadena "es,en,fr" por un array usando explode()
$idiomas = explode(",", "es,en,fr");  // Convierte la cadena en un array
$soporte3 = new Dvd("Origen", 24, 15, $idiomas, "16:9");  // Pasa el array a Dvd

// Otro ejemplo con un array de idiomas
$idiomas2 = explode(",", "es,en");
$soporte4 = new Dvd("El Imperio Contraataca", 4, 3, $idiomas2, "16:9");

// Alquilo algunos soportes
$cliente1->alquilar($soporte1);
$cliente1->alquilar($soporte2);
$cliente1->alquilar($soporte3);

// Intento alquilar de nuevo un soporte que ya tiene alquilado
$cliente1->alquilar($soporte1);

// El cliente tiene 3 soportes en alquiler como máximo
// Este soporte no lo va a poder alquilar
$cliente1->alquilar($soporte4);

// Este soporte no lo tiene alquilado
$cliente1->devolver(4);

// Devuelvo un soporte que sí tiene alquilado
$cliente1->devolver(2);

// Alquilo otro soporte
$cliente1->alquilar($soporte4);

// Listo los elementos alquilados
$cliente1->listarAlquileres();

// Este cliente no tiene alquileres
$cliente2->devolver(2);
