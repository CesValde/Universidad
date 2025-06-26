<?php 

include_once "Recibo.php";
include_once "CabinaPeaje.php";
include_once "RegistroVehiculo.php";
include_once "Camion.php";
include_once "TransporteEscolar.php";
include_once "VehiculoParticular.php";

/* Test */
$camion = new Camion('gfw63n', 7, 4);
$trafic = new TransporteEscolar('ymc83bd', 10);
$toyota = new VehiculoParticular('qwsa283');

$coleccVehiculos = [$camion, $trafic, $toyota]; 
$coleccRecibos = []; 
$cabinaPeaje = new CabinaPeaje($coleccVehiculos, $coleccRecibos);

$valor = $camion->calcularPeaje();
echo $valor."\n"; 
$valor = $trafic->calcularPeaje();
echo $valor."\n"; 
$valor = $toyota->calcularPeaje();
echo $valor."\n"; 

// 11
$info = [
    'patente' => 'gfw63n',
    'peso' => 7,          // en kg
    'cantEjes' => 4
];
$recibo = $cabinaPeaje->cobrarPeaje('camion', $info);
echo $recibo ."\n";

$reciboMayorMonto = $cabinaPeaje->reciboMayorMonto('13-06-2025');
echo $reciboMayorMonto."\n";

$totalRecaudado = $cabinaPeaje->totalRecaudado('13-06-2025');
echo $totalRecaudado."\n"; 