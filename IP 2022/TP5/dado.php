<?php

    /** Programa Dado */
    // Calcula el lado opuesto del dado
    // int $cara, $caraOpuesta

    echo "Ingrese cara del dado (numero del 1 al 6): " ; 
    $cara = trim(fgets(STDIN)) ; 
        if($cara == 1) {
            $caraOpuesta = 6 ;
            echo $caraOpuesta ;
        } elseif($cara == 2) {
            $caraOpuesta = 5 ; 
            echo $caraOpuesta ;
        } elseif($cara == 3) {
            $caraOpuesta = 4 ; 
            echo $caraOpuesta ;
        } elseif($cara == 4) {
            $caraOpuesta = 3 ;
            echo $caraOpuesta ;
        } elseif($cara == 5) {
            $caraOpuesta = 2 ;
            echo $caraOpuesta ;
        } elseif($cara == 6) {
            $caraOpuesta = 1 ; 
            echo $caraOpuesta ;
        } else {
            echo "Error numero incorrecto" ; 
        }
     