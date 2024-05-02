<?php

    /** Programa SecuenciaLetras */
    // Muestra cantidad de vocales ingresadas
    // int $cantVocales 
    // string $letra

        $cantVocales = 0 ; 
    
    do{
        echo "Ingrese una letra, - para finalizar: " ; 
        $letra = trim(fgets(STDIN)) ; 
            if($letra == "a" || $letra == "e" || $letra == "i" || $letra == "o" || $letra == "u") {
                $cantVocales = $cantVocales + 1 ;
            }
    } while($letra != "-") ; 

    if($cantVocales == 0) {
        echo "No ha ingresado ninguna vocal" ; 
    } else {
        echo "Cantidad de vocales: " . $cantVocales ; 
    }