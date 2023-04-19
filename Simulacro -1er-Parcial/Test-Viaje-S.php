<?php 

    // include

    // $horaActual = strtotime("$hora:$minutos") ;
    // $hora_desde = date("H:i:s", $hora_desde) ;

    // San Martin 
    $fechaSanMa = date('d.m.y' , $horaPartidaSanMa) ; 

    // Bariloche
    $fechaBari = date('d.m.y' , $horaPartidaBari) ;

    // Buenos Aires 
    $fechaCaba = date('d.m.y' , $horaPartidaCaba) ;

    // La plata 
    $fechaLaPlata = date('d.m.y' , $horaPartidaLaPlata) ;
   

    $sanMartin = new Viaje("San Martin", "10:00", "16:00", 1, 7000, $fechaSanMa, 10, 5, "Cesarito") ;
    $bariloche = new Viaje("Bariloche", "12:00", "17:00", 2, 8000, $fechaBari, 20, 10, "Pepito") ; 
    $caba = new Viaje("Buenos Aires", "20:00", "23:00", 3, 9000, $fechaCaba, 30, 20, "Luffy") ; 
    $laPlata = new Viaje("La Plata", "08:00", "12:00", 4, 15000, $fechaLaPlata, 25, 15, "Tu vieja") ; 






    $viaBariloche = new Empresa("bari00", "viaBariloche", $coleccViajes) ;
    $flechaBus = new Empresa("")  ;
    $coleccEmpresas = [$viaBariloche, $flechaBus] ;



    $terminalCipo = new Terminal("bariloche", "Cipo", $coleccEmpresas) ;