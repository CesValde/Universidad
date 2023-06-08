<?php 

    include "Cliente.php" ; 
    include "Vehiculo.php" ; 
    include "Venta.php" ; 
    include "Concesionaria.php" ; 

    // Test 

    $cliente1 = new Cliente("Cesarito", "Valde", "no", "dni", 95947908) ; 
    $cliente2 = new Cliente("Davito", "Londo", "si", "cedula", 29568839) ; 
    $coleccClientes = [$cliente1, $cliente2] ; 

    $vehiculo1 = new Vehiculo(11, 50000, 2020, "Volkswagen Polo Trendline", 85, true) ; 
    $vehiculo2 = new Vehiculo(12, 10000, 2021, "Ram 1500 Laramie", 70, true) ; 
    $vehiculo3 = new Vehiculo(13, 10000, 2022, "Jeep Renegade 1.8 Sport", 55, false) ; 
    $coleccVehi = [$vehiculo1, $vehiculo2, $vehiculo3] ; 

    $coleccVentas = [] ; 

    $concesionaria = new Concesionaria("Alta gama", "Av Argentina 123", $coleccClientes, $coleccVehi, $coleccVentas) ; 
    $coleccCodigosVehi = [11, 12, 13] ; 
    $coleccCodigosVehi2 = [0] ; 
    $coleccCodigosVehi3 = [2] ; 

    // pt 5 
    $concesionaria -> registrarVenta($coleccCodigosVehi, $cliente2) ; 

    // pt 6
    $concesionaria -> registrarVenta($coleccCodigosVehi2, $cliente2) ;

    // pt 7
    $concesionaria -> registrarVenta($coleccCodigosVehi3, $cliente2) ;

    // pt8
    $tipo = $cliente1 -> getTipoDoc() ; 
    $numDoc = $cliente1 -> getNroDoc() ; 
    $ventaCli1 = $concesionaria -> retornarVentasXCliente($tipo,$numDoc) ; 
    // print_r($ventaCli1) ; 

    // pt9
    $tipo = $cliente2 -> getTipoDoc() ; 
    $numDoc = $cliente2 -> getNroDoc() ; 
    $ventaCli2 = $concesionaria -> retornarVentasXCliente($tipo,$numDoc) ; 
    // print_r($ventaCli2) ; 

    // pt 10 
    echo $concesionaria ; 