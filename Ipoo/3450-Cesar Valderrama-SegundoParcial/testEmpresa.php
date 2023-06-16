<?php 

    include_once "Cliente.php" ; 
    include_once "Vehiculo.php" ; 
    include_once "VehiculoNacional.php" ; 
    include_once "VehiculoInternacional.php" ; 
    include_once "Venta.php" ; 
    include_once "Empresa.php" ; 

    // test 

    $cliente1 = new Cliente("Cesarito", "Valde", "no", "dni", 95947908) ; 
    $cliente2 = new Cliente("Davito", "Londo", "si", "cedula", 29568839) ; 
    $coleccClientes = [$cliente1, $cliente2] ;

    $vehiculo1 = new VehiculoNacional(11, 50000, 2020, "Volkswagen Polo Trendline", 85, true, 10) ; 
    $vehiculo2 = new VehiculoNacional(12, 10000, 2021, "Ram 1500 Laramie", 70, true, 10) ; 
    $vehiculo3 = new VehiculoNacional(13, 10000, 2022, "Jeep Renegade 1.8 Sport", 55, false, 0) ; 
    $vehiculo4 = new VehiculoImportado(14, 12499900, 2020, "Ferrari", 100, true, "Italia", 6244400) ; 
    $coleccVehi = [$vehiculo1, $vehiculo2, $vehiculo3, $vehiculo4] ; 

    $coleccVentas = [] ; 

    $empresa = new Empresa("Alta gama", "Av Argentina 123", $coleccClientes, $coleccVehi, $coleccVentas) ; 

    $coleccCodigosVehi1 = [11, 12, 13, 14] ; 
    $coleccCodigosVehi2 = [0, 14] ; 
    $coleccCodigosVehi3 = [2, 14] ; 

    // punto 4 
    $precioFinal = $empresa -> registrarVenta($coleccCodigosVehi1, $cliente2) ; 
    echo $precioFinal . "\n" ;

    // punto 5 
    $precioFinal = $empresa -> registrarVenta($coleccCodigosVehi2, $cliente2) ; 
    echo $precioFinal . "\n" ;

    // punto 6 
    $precioFinal = $empresa -> registrarVenta($coleccCodigosVehi3, $cliente2) ; 
    echo $precioFinal . "\n" ;

    // punto 7 
    $coleccVehiImportados = $empresa -> informarVentasImportadas() ; 
    print_r($coleccVehiImportados) . "\n" ;

    // punto 8 
    $total = $empresa -> informarSumaVentasNacionales() ; 
    echo $total . "\n" ;

    // echo $empresa . "\n" ;