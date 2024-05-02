<?php 

    // Programa Resto 
    // Calcula el resto de la division entera 
    // int $a, $b, $cociente, $resto 

    echo "Ingrese a: " ; 
    $a= trim(fgets(STDIN)) ; 
    echo "Ingrese b: " ; 
    $b = trim(fgets(STDIN)) ; 
    $cociente = (int) ($a / $b) ; 
    $resto = $a - ($cociente * $b ) ; 
    echo $resto ; 