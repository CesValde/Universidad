<?php

include_once "Locomotora.php" ;
include_once "Vagon.php" ;
include_once "VagonCarga.php" ;
include_once "VagonPasajeros.php" ;
include_once "Formacion.php" ;

// 1
$locomotora = new Locomotora(188, 140) ;

// 2
$vagon1 = new VagonPasajeros(15000, 30, 25);
$vagonCarga = new VagonCarga(15000, 0, 55000) ;
$vagon = new VagonPasajeros(15000, 50, 50) ;

// 3  Se crea un objeto formación que tiene la locomotora y los vagones creados en (1) y (2) usando el método .
// $coleccVagones = [$vagon1, $vagonCarga, $vagon]; 
$formacion = new Formacion($locomotora, 10); 
$formacion-> incorporarVagonFormacion($vagon1);
$formacion-> incorporarVagonFormacion($vagonCarga);
$formacion-> incorporarVagonFormacion($vagon);

// 4 
$incorpora = $formacion-> incorporarPasajeroFormacion(6) ;
if($incorpora) {
    echo "Se han incorporado las personas". "\n" ;
} else {
    echo "No se han incorporado las personas". "\n" ;
}

// 5
print_r($vagon1) ;
print_r($vagonCarga) ;
print_r($vagon) ;

// 6 
$incorpora = $formacion-> incorporarPasajeroFormacion(14) ;
if($incorpora) {
    echo "Se han incorporado las personas". "\n" ;
} else {
    echo "No se han incorporado las personas". "\n" ;
}

// 7 
print_r($locomotora). "\n" ; 

// 8 
$promedio = $formacion-> promedioPasajeroFormacion();
echo $promedio. "\n" ;

// 9 
$pesoFormacion = $formacion-> pesoFormacion();
echo $pesoFormacion. "\n" ;

// 10 
print_r($vagon1) ;
print_r($vagonCarga) ;
print_r($vagon) ;