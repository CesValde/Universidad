<?php 

    /* Programa Sumatoria */
    // Calcula la sumatoria de los primeros numeros naturales
    // int $suma, $nrom $i

    $suma = 0 ; 

    echo "Ingrese un numero: " ; 
    $nro = trim(fgets(STDIN)) ; 
        for($i = 1 ; $i <= $nro ; $i++) {
            $suma = $suma + $i ;
        }
    echo "La sumatoria es: " . $suma ; 