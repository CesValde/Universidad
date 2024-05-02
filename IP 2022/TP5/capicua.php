<?php 

    /** Programa Capicua */
    // Calcula si un numero es capicua 
    // int $numero, $dig1, $dig2, $dig3, $resto String $cartel

    echo "Ingrese un numero de 3 cifras: " ; 
    $numero = trim(fgets(STDIN)) ; 
    $dig1 = (int) ($numero / 100) ; 
    $resto = $numero % 100 ; 
    $dig2 = (int) ($resto / 10) ; 
    $dig3 = $resto % 10 ; 
        if($numero > 999 || $numero < 100) {
            $cartel = "Error, ingrese numero de 3 cifras" ;
        }elseif($dig1 == $dig3) {
            $cartel = $numero . " Es capicua" ; 
        } else {
            $cartel = $numero . " No es capicua" ; 
        }
    echo $cartel ; 