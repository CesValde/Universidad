<?php 

    /* Programa Suma */ 
    // Muestra la suma de los numeros ingresados 
    // int $suma, $num

    $suma = 0 ;

    echo "Ingrese un numero, 0 para terminar: " ; 
    $num = trim(fgets(STDIN)) ;
        while($num <> 0) {
            $suma = $suma + $num ; 
            echo "Ingrese un numero, 0 para terminar: " ; 
            $num = trim(fgets(STDIN)) ; 
        }
    echo "La suma de los numeros ingresados es: " . $suma ; 