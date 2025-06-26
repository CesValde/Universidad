<?php 

include_once "Aerolineas.php";
include_once "Vuelo.php" ;
include_once "Persona.php";
include_once "Aeropuerto.php";

// Objeto responsable
$responsable = new Persona("Juan", "Pérez", "Calle 123", "juan@example.com", "123456789");

// Objetos Vuelos
$vuelo1 = new Vuelo(101, 15000, "2025-05-10", "Madrid", "18:30:00", "15:00:00", 180, 50, $responsable);
$vuelo2 = new Vuelo(102, 12000, "2025-05-12", "Barcelona", "20:00:00", "16:00:00", 150, 75, $responsable);
$vuelo3 = new Vuelo(103, 18000, "2025-05-15", "New York", "23:00:00", "18:00:00", 200, 20, $responsable);
$vuelo4 = new Vuelo(104, 10000, "2025-05-20", "Santiago", "19:45:00", "17:30:00", 120, 60, $responsable);
$vuelo5 = new Vuelo(101, 15000, "2025-05-10", "Paris", "18:30:00", "15:00:00", 180, 50, $responsable);

// Objetos Aerolineas
$aerolinea1 = new Aerolineas("AR01", "Aerolíneas Argentinas", [$vuelo1, $vuelo2]);
$aerolinea2 = new Aerolineas("COPA02", "Copa Airlines", [$vuelo3, $vuelo4]);

$coleccAerolineas = [$aerolinea1, $aerolinea2];
$aeropuerto = new Aeropuerto("Aeropuerto Internacional Ezeiza", "Autopista Tte. Gral. Ricchieri Km 33,5, Buenos Aires", $coleccAerolineas);

// Test 
$vueloVendido = $aeropuerto -> ventaAutomatica(3, "2025-05-10", "Madrid");
echo $vueloVendido . "\n" ; 

$promeImporAerolinea = $aeropuerto -> promedioRecaudadoXAerolinea("AR01") ;
echo $promeImporAerolinea . "\n" ;
