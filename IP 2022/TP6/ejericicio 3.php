<?php 

    /**
     * @param int $num
     */

    function dibujo($num) {
        // int $i, $j, $blancos, $asteriscos

        for($i = 1 ; $i <= $num ; $i++) {
            $blancos = $num - $i ;
                for($j = 1 ; $j <= $blancos ; $j++) {
                    echo " " ; 
                }
            $asteriscos = $i ; 
            for($j = 1 ; $j <= $asteriscos ; $j++) {
                echo " * " ; 
            }
            echo "\n" ; 
        }   
        echo "FIN" ;     
    } 

    /* Programa Piramide */
    echo "Ingrese numero: " ; 
    $numero = trim(fgets(STDIN)) ;
        $piramide = dibujo($numero) ; 
    echo $piramide ; 