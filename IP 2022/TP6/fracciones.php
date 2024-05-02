<?php

    /** Programa Sumatoria */
    // Calcula la sumatoria de un numero
    // $n, $nA, $nB, $sumatoria 

        $nA = 2 ; 
        $nB = 1 ; 
        $sumatoria = 0 ;

    echo "Ingrese un numero para para repetir cantidad de terminos: " ; 
    $n = trim(fgets(STDIN)) ; 
        for($i = 0 ; $i < $n ; $i++) {
            $sumatoria = ($nA / $nB) + $sumatoria ;
            $nA = $nA + $nB ; 
            $nB = $nA - $nB ; 
        }
    echo "La sumatoria de los numeros es: " . $sumatoria ; 