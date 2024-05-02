<?php 

    /** Programa secuencia */
    // Muestra un cartel si el numero x fue encontrado
    // int $x, $num 
    // boolean $encontrado

    echo "Ingrese un numero a encontrar mayor a 0: " ; 
    $x = trim(fgets(STDIN)) ;

    $encontrado = false ;

        do {
            echo "Ingrese un numero a la secuencia: " ; 
            $num = trim(fgets(STDIN)) ;
                if($num == $x) {
                    $encontrado = true ;
                }
        } while($encontrado == false && $num <> -1) ;

        if($encontrado) {
            echo $x . " fue encontrado" ;
        } else {
            echo $x . " No fue encontrado" ; 
        }