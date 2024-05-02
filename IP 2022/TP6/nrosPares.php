<?php 

    /* Programa Numeros Pares */
    // Muestra los numeros pares menores a n
    // $int $num, $i 

    echo "Ingrese un numero: " ; 
    $num = trim(fgets(STDIN)) ; 
        for($i = 0 ; $i <= $num ; $i = $i + 2) {
            echo $i . "\n" ; 
        }