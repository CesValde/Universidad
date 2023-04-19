<?php 

    // include

    // $horaActual = strtotime("$hora:$minutos") ;
    // $hora_desde = date("H:i:s", $hora_desde) ;

    // SanMartin 
    // Tiempo unix
    $horaPartidaSanMa = strtotime("10:00") ;
    $horaLlegadaSanMa = strtotime("16:00") ; 
    // fecha 
    $fechaSanMa = date('d.m.y' , $horaPartidaSanMa) ;
    // hora
    $horaPartida = date('H:i:s' , $horaPartidaSanMa) ; 
    $horaLlegadaSanMa = date('H:i:s' , $horaLlegadaSanMa) ; 

    /*
    echo $fecha . "\n" ;
    echo $horaPartida . "\n" ; 
    echo $horaLlegada . "\n" ;
    */

    // Bariloche
    // Tiempo unix
    $horaPartidaBari = strtotime("12:00") ;
    $horaLlegadaBari = strtotime("17:00") ; 
    // fecha 
    $fechaBari = date('d.m.y' , $horaPartidaBari) ;
    // hora
    $horaPartidaBari = date('H:i:s' , $horaPartidaBari) ; 
    $horaLlegadaBari = date('H:i:s' , $horaLlegadaBari) ;

    // Buenos Aires 
    // Tiempo unix
    $horaPartidaCaba = strtotime("20:00") ;
    $horaLlegadaCaba = strtotime("23:00") ; 
    // fecha 
    $fechaCaba = date('d.m.y' , $horaPartidaCaba) ;
    // hora
    $horaPartidaCaba = date('H:i:s' , $horaPartidaCaba) ; 
    $horaLlegadaCaba = date('H:i:s' , $horaLlegadaCaba) ;

    // La plata 
    // Tiempo unix
    $horaPartidaLaPlata = strtotime("08:00") ;
    $horaLlegadaLaPlata = strtotime("12:00") ; 
    // fecha 
    $fechaLaPlata = date('d.m.y' , $horaPartidaLaPlata) ;
    // hora
    $horaPartidaLaPlata = date('H:i:s' , $horaPartidaLaPlata) ; 
    $horaLlegadaLaPlata = date('H:i:s' , $horaLlegadaLaPlata) ;

    $sanMartin = new Viaje("Bariloche", $horaPartidaSanMa, $horaLlegadaSanMa, 1, 7000, $fechaSanMa  ) ;
    $bariloche = new Viaje() ; 
    $caba = new Viaje() ; 
    $laPlata = new Viaje() ; 






    $viaBariloche = new Empresa("bari00", "viaBariloche", $coleccViajes) ;
    $flechaBus = new Empresa("")  ;
    $coleccEmpresas = [$viaBariloche, $flechaBus] ;



    $terminalCipo = new Terminal("bariloche", "Cipo", $coleccEmpresas) ;