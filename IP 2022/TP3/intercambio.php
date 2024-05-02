<?php 
    
    // Programa Intercambio
    // Intercambia los valores entre a y
    // int $a, $b, $c 

    echo "Ingrese el primer valor: " ; 
    $a = trim(fgets(STDIN)) ; 
    echo "Ingrese el segundo valor: " ; 
    $b = trim(fgets(STDIN)) ; 
    $c = $a ; 
    $a = $b ; 
    $b = $c ; 
    echo $a . " " .  $b ; 