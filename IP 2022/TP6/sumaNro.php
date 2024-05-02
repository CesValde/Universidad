<?php 

    /* Programa Secuencia Numeros */
    // Lee una secuencia de números y determina la suma de los mismos
    // int $suma, $nro, $aux, $i 

    $suma = 0 ; 

    echo "Cuantos numeros desea sumar? " ; 
    $nro = trim(fgets(STDIN)) ; 
        for($i = 1 ; $i <= $nro ; $i++) {
            echo "Ingrese el numero " . $i ; 
            $aux = trim(fgets(STDIN)) ; 
            $suma = $suma + $aux ; 
        }
    echo "La suma de los numeros es: " . $suma ;