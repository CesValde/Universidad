<?php 

    /* Programa Sumatoria */
    // Calcula la sumatoria de los primeros numeros impares
    // int $suma, $nro, $aux, $i 

    $suma = 0 ; 
    $aux = 1 ;

    echo "Ingrese un numero: " ; 
    $nro = trim(fgets(STDIN)) ; 
        for($i = 1 ; $i <= $nro ; $i++) {
            $suma = $suma + $aux ;
            $aux = $aux + 2 ; 
        }
    echo "La sumatoria es: " . $suma ; 