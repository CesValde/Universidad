<?php 

    /**
     * Encripta un numero entero
     * @param int $numero
     * @return int
     */

    function encripta($num) {
        // int $dig1, $dig2, $dig3, $dig4, $resto $aux, $numeroEncriptado

        // Separo el numero en cifras
        $dig1 = (int) ($num / 1000) ; 
        $resto = $num % 1000 ; 
        $dig2 = (int) ($resto / 100) ; 
        $resto = $num % 100 ; 
        $dig3 = (int) ($resto / 10) ; 
        $dig4 = $resto % 10 ;

        $dig1 = (($dig1 + 7) % 10) ; 
        $dig2 = (($dig2 + 7) % 10) ; 
        $dig3 = (($dig3 + 7) % 10) ; 
        $dig4 = (($dig4 + 7) % 10) ; 

        // Intercambio el 1ro con el 3ro y el 2do con el 4to 
        $aux = $dig1 ;
        $dig1 = $dig3 ;
        $dig3 = $aux ;
        $aux = $dig2 ;
        $dig2 = $dig4 ;
        $dig4 = $aux ;

        // Convertir a numero entero 
        $dig1 = $dig1 * 1000 ; 
        $dig2 = $dig2 * 100 ; 
        $dig3 = $dig3 * 10 ;

        $numeroEncriptado = $dig1 + $dig2 + $dig3 + $dig4 ; 
        return $numeroEncriptado ; 
    }

    /**
     * Desencripta el numero encriptado
     * @param int $numero
     * @return int 
     */

    function desencripta($numero) {
        // int $dig1, $dig2, $dig3, $dig4, $resto, $aux, $numeroDesencriptado

        // Separo el numero en cifras
        $dig1 = (int) ($numero / 1000) ;
        $resto = $numero % 1000 ;
        $dig2 = (int) ($resto / 100) ;
        $resto = $numero % 100 ;     
        $dig3 = (int) ($resto / 10) ;
        $dig4 = $resto % 10 ;

        $dig1 = (($dig1 + 10 - 7) % 10) ; 
        $dig2 = (($dig2 + 10 - 7) % 10) ;
        $dig3 = (($dig3 + 10 - 7) % 10) ;
        $dig4 = (($dig4 + 10 - 7) % 10) ;

        // Intercambio el 3ro con el 1ro y el 4do con el 2to
        $aux = $dig3 ;
        $dig3 = $dig1 ;
        $dig1 = $aux ;
        $aux = $dig4 ;
        $dig4 = $dig2 ;
        $dig2 = $aux ;

        // Convertir a numero entero
        $dig1 = $dig1 * 1000 ;
        $dig2 = $dig2 * 100 ;
        $dig3 = $dig3 * 10 ;

        $numeroDesencriptado = $dig1 + $dig2 + $dig3 + $dig4 ;
        return $numeroDesencriptado ; 
    }

    /** Programa EncriptarDesencriptar */
    // Muestra por pantalla un numero entero de 4 cifras de forma encriptada y desencriptada
    // int $num, $numeroEncrip, $numeroDesencrip

    echo "Ingrese un numero de 4 cifras: " ; 
    $numero = trim(fgets(STDIN)) ; 
    $numeroEncrip = encripta($numero) ; 
    $numeroDesencrip = desencripta($numeroEncrip) ; 

        if($numero > 9999) {
            echo "ERROR ingrese un numero de 4 cifras !!!" ; 
        } else {
            echo  "El numero encriptado es: " . $numeroEncrip . "\n" .
            "El numero desencriptado es: " . $numeroDesencrip ;
        }