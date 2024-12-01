<?php 
// Incluir todos los archivos necesarios
include_once "CintaVideo.php"; 
include_once "Dvd.php"; 
include_once "Juego.php"; 
include_once "Cliente.php"; 
include_once "Videoclub.php"; 

// Crear una instancia de Videoclub
$vc = new Videoclub("Severo 8A");  

// Incluir unos cuantos soportes de prueba  
$vc->incluirJuego("God of War", 19.99, "PS4", 1, 1);  
$vc->incluirJuego("The Last of Us Part II", 49.99, "PS4", 1, 1); 

// Convertir el string de idiomas a un array antes de pasarlo al método
$vc->incluirDvd("Torrente", 4.5, ["es"], "16:9");  
$vc->incluirDvd("Origen", 4.5, ["es", "en", "fr"], "16:9");  
$vc->incluirDvd("El Imperio Contraataca", 3, ["es", "en"], "16:9");  

$vc->incluirCintaVideo("Los cazafantasmas", 3.5, 107);  
$vc->incluirCintaVideo("El nombre de la Rosa", 1.5, 140);  

// Listar los productos
$vc->listarProductos();  

// Crear algunos socios
$vc->incluirSocio("Amancio Ortega");  
$vc->incluirSocio("Pablo Picasso", 2);  

// Realizar algunos alquileres
$vc->alquilarSocioProducto(1, 2);  
$vc->alquilarSocioProducto(1, 3);  

// Intento de alquiler repetido, debería fallar
$vc->alquilarSocioProducto(1, 2);  

// Intento de alquiler de un soporte cuando el socio ya tiene 2 alquileres
$vc->alquilarSocioProducto(1, 6);  

// Listar los socios
$vc->listarSocios();
?>

