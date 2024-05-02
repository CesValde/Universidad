<?php 

    /** Programa porcentaje */
    // Muestra el porcentaje de la cantidad de multiplos del numero ingresado
    // int numX, $numSe, $cantNumeros, $multiplo
    // float $porcentaje
    // string $respuesta

        $cantNumeros = 0 ; 
        $multiplo = 0 ; 
    
    echo "Ingrese el numero para evaluar sus múltiplos: " ; 
    $numX = trim(fgets(STDIN)) ;
    echo "Desea ingresar un numero a la secuencia? " ; 
    $respuesta = trim(fgets(STDIN)) ; 
        while($respuesta == "si") {
            echo "Ingrese un numero para la secuencia: " ; 
            $numSe = trim(fgets(STDIN)) ; 
            $cantNumeros = $cantNumeros + 1 ; 
                if($numSe % $numX == 0) {
                    $multiplo = $multiplo + 1 ; 
                }
            echo "Desea ingresar otro numero a la secuencia? " ; 
            $respuesta = trim(fgets(STDIN)) ; 
        }
        if($cantNumeros == 0) {
            echo "No se ingresaron números en la secuencia" ; 
        } else {
            $porcentaje = (($multiplo / $cantNumeros) * 100) ; 
            echo "El porcentaje de múltiplos es de: " . $porcentaje . "%" ; 
        }