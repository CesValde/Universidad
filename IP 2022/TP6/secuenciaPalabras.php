<?php 

    /** Programa Secuencia Palabras */
    // Arma una oracion con las palabras ingresadas
    // string $oracion, $palabra 

        $oracion = " " ; 

        echo "Ingrese una palabra . para finalizar: " ; 
        $palabra = trim(fgets(STDIN)) ;
            while($palabra != ".") {            
                $oracion = $oracion . " " . $palabra ;
                echo "Ingrese una palabra . para finalizar: " ; 
                $palabra = trim(fgets(STDIN)) ;
            } 
        echo $oracion ; 