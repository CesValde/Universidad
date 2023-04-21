<?php 

    include_once "Viaje-S.php" ; 
    include_once "Responsable.php" ;
    include_once "Empresa.php" ;
    include_once "Terminal.php" ;

    // $horaActual = strtotime("$hora:$minutos") ;
    // $hora_desde = date("H:i:s", $hora_desde) ;

    // Test 
    // p1
    $coleccEmpresas = [
        $viaBariloche = new empresa("1", "viaBariloche", []),
        $flechaBus = new Empresa("2", "flechabus", [])
    ] ;

  
    // p2
    $responsable1 = new Responsable("Cesarito", "Valde", 95, "Machiques", "valdecesar", "+54") ; 
    $viajes1 = [
        $sanMartin = new Viaje("San Martin", "10:00", "16:00", 1, 7000, "1/01/2023", 10, 5, $responsable1),
        $bariloche = new Viaje("Bariloche", "12:00", "17:00", 2, 8000, "2/02/2023", 20, 10, $responsable1) 
    ] ; 

    $responsable2 = new Responsable("Davito" , "londo", 29, "zulia", "cesardavidvl", "+58") ;
    $viajes2 = [
        $caba = new Viaje("Buenos Aires", "20:00", "23:00", 3, 9000, "3/03/2023", 30, 20, $responsable2),
        $laPlata = new Viaje("La Plata", "08:00", "12:00", 4, 15000, "4/04/2023", 25, 15, $responsable2) 
    ] ;
     
    $coleccEmpresas[0] -> setColeccionViajes($viajes1) ; 
    $coleccEmpresas[1] -> setColeccionViajes($viajes2) ; 

    //print_r($coleccEmpresas) ;
    


/*
    # Acceder al objeto $sanMartin dentro de la lista $coleccionViajes de la clase Empresa
    $sanMartin = $empresa->coleccionViajes[0];

    # Acceder al objeto $responsable1 dentro del objeto $sanMartin
    $responsable1 = $sanMartin->responsable1;

    # Acceder al objeto $responsable2 dentro del objeto $responsable1
    $dato = $responsable1->responsable2->atributoDeseado;
*/