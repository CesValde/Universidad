<?php 

include_once "Torneo.php" ;
include_once "Equipo.php" ;
include_once "Categoria.php" ;
include_once "Partido.php" ;
include_once "PartidoBasket.php" ;
include_once "PartidoFutbol.php" ;

// 1. Crear un objeto de la clase Torneo donde el importe base del premio es de: 100.000
$torneo = new Torneo(100000) ;

// 2. 
/* Crear 3 categorias para basket y 3 para fut o solo para fut ? en ese caso Categoria solo es para fut? como saco que tipo de deporte es en la clase torneo para basket ? */
$categoriaMayores = new Categoria("futbol", "mayores");
$categoriaJuveniles = new Categoria("basket","juveniles");
$categoriaMenores = new Categoria("basket","menores");

// futbol
$objE1 = new Equipo("Real Madrid", "Karim Benzema", 11, $categoriaMayores);
$objE2 = new Equipo("FC Barcelona", "Sergio Busquets", 11, $categoriaMayores);
$objE3 = new Equipo("Atlético de Madrid", "Koke", 11, $categoriaMayores);
$objE4 = new Equipo("Manchester City", "Kevin De Bruyne", 11, $categoriaMayores);
$objE5 = new Equipo("Liverpool", "Virgil van Dijk", 11, $categoriaMayores);
$objE6 = new Equipo("Chelsea", "Reece James", 11, $categoriaMayores);

// basket 
$objE7 = new Equipo("Los Angeles Lakers", "LeBron James", 7, $categoriaMenores);
$objE8 = new Equipo("Boston Celtics", "Jayson Tatum", 7, $categoriaJuveniles);
$objE9 = new Equipo("Miami Heat", "Jimmy Butler", 7, $categoriaMenores);
$objE10 = new Equipo("Milwaukee Bucks", "Giannis Antetokounmpo", 7, $categoriaMenores);
$objE11 = new Equipo("Phoenix Suns", "Devin Booker", 7, $categoriaJuveniles);
$objE12 = new Equipo("Dallas Mavericks", "Luka Dončić", 7, $categoriaMenores);

$partidoBasket = new PartidoBasket(11, "2024-05-05", 80, 120, $objE7, $objE8, 7); 
$partidoBasket2 = new PartidoBasket(12, "2024-05-06", 81, 110, $objE9, $objE10, 8);
$partidoBasket3 = new PartidoBasket(131, "2024-05-07", 115, 85, $objE11, $objE12, 9);

$partidoFut = new PartidoFutbol(14, "2024-05-07", 3, 2, $objE1, $objE2);
$partidoFut2 = new PartidoFutbol(15, "2024-05-08", 0, 1, $objE3, $objE4);
$partidoFut3 = new PartidoFutbol(15, "2024-05-09", 2, 3, $objE5, $objE6);

// 3. 
$partido1 = $torneo->ingresarPartido($objE5, $objE11, '2024-05-23', 'futbol'); 
echo $partido1. "\n";
$partido2 = $torneo->ingresarPartido($objE11, $objE11, '2024-05-23', 'basquetbol');
echo $partido2. "\n";
$partido3 = $torneo->ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol'); 
echo $partido3;

$coleccGanadores = $torneo->darGanadores('basket');
print_r($coleccGanadores);  // muestra los dos equipos pq esta mostrando el que se crea dentro de la clase
$coleccGanadores = $torneo->darGanadores('futbol');
print_r($coleccGanadores);  // no hay partidos

// partido1
// tengo que mostrar premio aunque no se registre el partido ?
$descripGanador = $partido1 !== null ? $torneo->calcularPremioPartido($partido1) : "El partido no existe";
if(is_array($descripGanador)) {
    print_r($descripGanador);
} else {
    echo $descripGanador. "\n";
}

// partido2
$descripGanador = $partido2 !== null ? $torneo->calcularPremioPartido($partido2) : "El partido no existe";
if(is_array($descripGanador)) {
    print_r($descripGanador);
} else {
    echo $descripGanador. "\n";
}

// partido3
// me devuelve null por eso no muestra nada 
$descripGanador = $partido3 !== null ? $torneo->calcularPremioPartido($partido3) : "El partido no existe";
if(is_array($descripGanador)) {
    print_r($descripGanador);
} else {
    echo $descripGanador. "\n";
}

// 4. 
echo $torneo;