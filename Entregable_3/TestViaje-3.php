<?php 

    include_once "Viaje-3.php" ;
    include_once "Pasajero-3.php" ; 
    include_once "PasajeroVIP.php" ; 
    include_once "PasajeroEspecial.php" ;
    include_once "Responsable.php" ;
    include_once "Venta.php" ; 

    // Test 

    $pasajero1 = new Pasajero("Cesar", 1, 101) ; 
    $pasajero2 = new PasajeroVIP("Isagi", 2, 102, 02, 1500) ; 
    $pasajero3 = new PasajeroEspecial("David", 3, 103, true, true, true) ;
    $pasajero4 = new PasajeroEspecial("Luffy", 4, 104, true, false, false) ;
    $pasajero5 = new PasajeroEspecial("Aqua", 5, 105, true, true, false) ;
    $pasajero6 = new PasajeroEspecial("Hinata", 6, 106, true, false, true) ;
    $pasajero7 = new PasajeroEspecial("Garp", 7, 107, false, true, false) ;
    $pasajero8 = new PasajeroEspecial("Saiki", 8, 108, false, true, true) ;
    $pasajero9 = new PasajeroEspecial("Lelouch", 9, 109, false, false, true) ;

    $coleccPasajeros = [$pasajero1, $pasajero2, $pasajero3, $pasajero4, $pasajero5] ;

    $responsable = new Responsable("Mc", "nan", 7438345, "fwerfwf", "sdfgsgrewgf", 7893264) ;

    $viaje = new Viaje(12345, "Cipo", 10, $coleccPasajeros, $responsable, true, false) ; 

    // crear objeto venta ? 
    // $venta1 = new Venta($precioTicket, $pasajero, $ida, $vuelta)
    // $coleccVentas = [$venta1, ]
    // como saber que tipodepasaj es
    // se vendio 
    // no tengo precio del ticket 

    $importe = $viaje -> venderPasaje($pasajero6) ; 
        if($importe > 0) {
            // $importe de la venta
        }





    echo $viaje ;