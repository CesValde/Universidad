<?php 

    echo "Ingrese x: " ; 
    $num = trim(fgets(STDIN)) ; 

    $total = (int) ($num / 1000);   // division entera num = 1576 me da 1 
    $subTotal = $num / 1000 ;       // division normal num = 1576 me da 1.576 
    $resto = $num % 1000 ;          // MOD num = 1576 me da 576 
    $div = $num % 2 == 0 ;          // esto me da el resto 0 si es positivo 


    echo $total . "\n" ; 
    echo $subTotal . "\n" ; 
    echo $resto . "\n" ; 
    echo $div ; 


    // division toma del . a la izq 
    // % toma del . a la der
