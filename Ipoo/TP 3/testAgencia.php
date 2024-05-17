<?php

    include_once "Agencia.php" ;
    include_once "Destinos.php" ;
    include_once "Ventas.php" ; 
    include_once "VentasOnline.php" ;
    include_once "PaquetesTuristicos.php" ;
    include_once "Persona_3.php" ;
    include_once "Cliente_2.php" ;

    // test 
    $destino = new Destinos(1, "Bariloche", 250) ;
    $destino2 = new Destinos(2, "Zulia", 250) ;

    $paquete = new PaquetesTuristicos("23/05/2014", 3, $destino, 20) ;
    $paquete2 = new PaquetesTuristicos("23/05/2015", 3, $destino, 20) ;
    $paquete3 = new PaquetesTuristicos("23/05/2018", 3, $destino2, 20) ;
    $coleccPaquetes = [$paquete, $paquete2, $paquete3] ;
    $coleccVentas = [] ;
    $coleccVentasOnline = [] ;
    $agencia = new Agencia($coleccPaquetes, $coleccVentas, $coleccVentasOnline) ;

    // crear un paquete nuevo si quieres probar la funcion
    /* $incorpora = $agencia -> incorporarPaquete($paqueteNuevo) ;
    if($incorpora) {
        echo "siii" . "\n" ; 
    } else {
        echo "no hdp" . "\n" ;
    }

    // crear un paquete nuevo si quieres probar la funcion
    $incorpora = $agencia -> incorporarPaquete($paqueteNuevo) ;
    if($incorpora) {
        echo "siii" . "\n" ; 
    } else {
        echo "no hdp" . "\n" ;
    }
*/
    $incorpora = $agencia -> incorporarVenta($paquete, 27898654, "dni", 4, true) ;
    if($incorpora <> -1) {
        echo "si tilin" . "\n" ; 
    } else {
        echo "no" . "\n" ;
    }

    $incorpora = $agencia -> incorporarVenta($paquete, 764, "dni", 10, true) ;
    if($incorpora <> -1) {
        echo "si tilin" . "\n" ; 
    } else {
        echo "no" . "\n" ;
    }

    $incorpora = $agencia -> incorporarVenta($paquete2, 567, "dni", 15, true) ;
    if($incorpora <> -1) {
        echo "si tilin" . "\n" ; 
    } else {
        echo "no" . "\n" ;
    }

    $incorpora = $agencia -> incorporarVenta($paquete3, 1234, "dni", 5, true) ;
    if($incorpora <> -1) {
        echo "si tilin" . "\n" ; 
    } else {
        echo "no" . "\n" ;
    }

    // perfecto
    $coleccPaquetes = $agencia -> informarPaquetesMasVendido("2024", 1) ;
    print_r($coleccPaquetes) ;

    $coleccVentasOnline = $agencia -> getColeccVentasOnline() ;
    //echo $agencia ;