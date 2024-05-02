<?php 

    /** Programa Secuencia Palabras */
    // Arma una oracion con las palabras ingresadas
    // string $oracion, $palabra 

        $oracion = " " ; 

    do{
        echo "Ingrese una palabra . para finalizar: " ; 
        $palabra = trim(fgets(STDIN)) ;
        $oracion = $oracion . " " . $palabra ; 
    } while($palabra != ".") ;
    echo $oracion ; 