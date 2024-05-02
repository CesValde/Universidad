<?php 

    // Programa LineaRecta
    // Calcula la cantidad de metros entre a y b 
    // int $mtrsA, $mtrsB, $h 

    echo "Ingrese cantidad A de metros: " ; 
    $mtrsA = trim(fgets(STDIN)) ; 
    echo "Ingrese cantidad B de metros: " ; 
    $mtrsB = trim(fgets(STDIN)) ; 
    $h = ($mtrsA * $mtrsA) + ($mtrsB * $mtrsB) ; 
    $h = sqrt($h) ; 
    echo "La cantidad de metros entre A y B es: " . $h ;