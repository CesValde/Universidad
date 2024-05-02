<?php 

    $atras = 0 ;
    $alante = 1 ; 
    $suma = 1 ;

    echo "Ingrese un numero para imprimir dicha cantidad de términos: " ; 
    $n = trim(fgets(STDIN)) ; 

        for($i = 0 ; $i < $n ; $i++) {
            echo $suma . "\n" ; 
            $suma = $atras + $alante ; 
            $atras = $alante ;
            $alante = $suma ;          
        } 