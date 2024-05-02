<?php

    /** DibujoRep */
    // int $i, $j, $digito
    
    echo "ingrese cantidad: " ; 
    $n = trim(fgets(STDIN)) ;
        
        for($i = 1; $i <= $n; $i++) {
            $digito = $i % 2 ;
                for($j = 1 ; $j <= $i ; $j++) {
                    echo $digito ;
                }
            echo "\n" ;
        }
    echo "fin dibujo" . "\n"; 


    //$mod = $i % 2 ;
    //echo $mod ;

    // n = 4
    // 1
    // 00
    // 111
    // 0000