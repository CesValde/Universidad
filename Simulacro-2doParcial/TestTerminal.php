<?php 

    include_once "Viaje-S2.php" ; 
    include_once "ViajeNacional.php" ; 
    include_once "ViajeIntercional.php" ; 
    include_once "Empresa.php" ;
    include_once "Responsable.php" ;
    include_once "Terminal.php" ;

    // test 

    $responsableCopa = new Responsable("Viejo", "qti", 0101, "ahi al lado", "viejo@gmail.com", 299765) ; 
    $responsableFlecha = new Responsable("Otro Viejo", "qsy", 0202, "al lado del otro", "viejo2@gmail.com", 2995634) ; 

    $viaje1 = new ViajeNacional("Cipo", "08:00:00", "10:00:00", 1, 1000, "20/03/2023", 10, 3, $responsableFlecha) ; 
    $viaje2 = new ViajeNacional("Neuquen", "07:00:00", "09:00:00", 2, 2000, "30/09/2023", 10, 5, $responsableFlecha) ; 
    $viaje3 = new ViajeIntercional("Machiques City", "06:00:00", "22:00:00", 3, 10000, "22/04/2023", 20, 10, $responsableCopa) ;
    $viaje4 = new ViajeIntercional("Maracibo City", "12:30:00", "16:00:00", 4, 20000, "18/09/2023", 30, 15, $responsableCopa) ; 

    $coleccViajesNacio = [$viaje1, $viaje2] ;
    $cooleccViajesInter = [$viaje3, $viaje4] ;

    $empresa1 = new Empresa(101, "Flecha Bus", $coleccViajesNacio) ; 
    $empresa2 = new Empresa(102, "Copa", $cooleccViajesInter) ;
    $coleccEmpresas = [$empresa1, $empresa2] ; 

    $terminal = new Terminal("que es", "Otra dimension", $coleccEmpresas) ; 

    $coleccViajesMenorValor = $terminal -> darViajeMenorValor() ;
    print_r($coleccViajesMenorValor) ;
    echo $terminal ; 

/*
    $importeInter = $viaje2 -> calcularImporteViaje() ; 
    echo $importeInter . "\n" ; 

    $importeNacional = $viaje4 -> calcularImporteViaje() ; 
    echo $importeNacional ; 
*/