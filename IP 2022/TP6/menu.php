<?php

    /**
     * Ordena el número de forma inversa
     * @param int $nroInicial
     * @return int
     */

    function ordenInverso($nroInicial) {
        //int $cifra, $nroReves
         
        $cifra = 0 ;
        $nroReves = 0 ;
            do {
                $cifra = $nroInicial % 10 ;
                $nroInicial = $nroInicial / 10 ;
                $nroReves = $nroReves * 10 + $cifra ;
            } while ($nroInicial >= 1) ;
        return $nroReves; 
    } 

    /**
     * Suma los digitos del numero ingresado
     * @param int $numero
     * @return int $numeroSumado
     */

    function sumaDigitos($numero) {
        // int $numeroSumado, $digito

        $numeroSumado = 0 ;

            while($numero > 0) {
                $digito = $numero % 10 ;
                $numero = (int) ($numero / 10) ;
                $numeroSumado = $numeroSumado + $digito ;                          
            }
        return $numeroSumado ; 
    }

    /**
     * Calcula la cantidad de divisores del numero ingresado
     * @param int $numero 
     * @return int $cantDivisores
     */

    function calcDivisores($numero) {
        // int $cantDivisores, $i

        $cantDivisores = 0 ;

            for($i = 1 ; $i <= $numero ; $i++) {
                if($numero % $i == 0) {
                    $cantDivisores = $cantDivisores + 1 ;
                }
            }
        return $cantDivisores ; 
    }

    /** 
     * Calcula si un número es primo
     * @param int $numero 
     * @return int $primo
     */

    function calcPrimo($numero) {
        // int $primo, $i 
            
        $i = 2 ;
        $primo = true ;

            if($numero == 1) {
                $primo = false ; 
            } else {
                while($primo && $i < $numero) {
                    if($numero % $i == 0) {
                        $primo = false ; 
                    } 
                    $i++ ; 
                }
            }
        return $primo ; 
    }

    /** Programa Menu */
    // Despliega un menu de opciones para seleccionar
    // int $opcion, $num, $numReves, $numSumado, $cantDivisores, 
    // boolean $prim 

    echo "1 Numero Inverso: " . "\n" ;
    echo "2 Suma Digitos: " . "\n" ; 
    echo "3 Cantidad de divisores: " . "\n" ; 
    echo "4 Es Primo?" . "\n" ; 
    echo "5 Salir" . "\n" ; 
    echo "Opcion: " ;
    $opcion = trim(fgets(STDIN)) ;
            
        while($opcion <> 5) {
            if($opcion > 5 || $opcion <= 0) {
                echo "Ingrese una opcion valida" . "\n" . "\n" ;
            } else {          
                if($opcion == 1) {
                    echo "Ingrese un numero para invertir: " ;
                    $num = trim(fgets(STDIN)) ;
                    $numReves = ordenInverso($num) ;
                    echo "El numero invertido es: " . $numReves . "\n" . "\n" ;
                } elseif($opcion == 2) {
                    echo "Ingrese un numero para sumar sus digitos: " ;
                    $num = trim(fgets(STDIN)) ;
                    $numSumado = sumaDigitos($num) ; 
                    echo "El numero sumado es: " . $numSumado . "\n" . "\n" ; 
                } elseif ($opcion == 3) {
                    echo "Ingrese un numero para ver su cantidad de divisores: " ; 
                    $num = trim(fgets(STDIN)) ;
                    $cantDivi = calcDivisores($num) ;
                    echo "La cantidad de divisores de " . $num . " es: " . $cantDivi . "\n" . "\n" ;
                } elseif($opcion == 4) {
                    echo "Ingrese un numero para saber si es primo: " ; 
                    $num = trim(fgets(STDIN)) ;
                    $prim = calcPrimo($num) ; 
                        if($prim) {
                            echo "El numero " . $num . " es primo" . "\n" . "\n" ; 
                        } else {
                            echo "no es primo" . "\n" . "\n" ; 
                        } 
                }                             
            } 
            echo "1 Numero Inverso: " . "\n" ;
            echo "2 Suma Digitos: " . "\n" ; 
            echo "3 Cantidad de divisores: " . "\n" ; 
            echo "4 Es Primo?" . "\n" ; 
            echo "5 Salir" . "\n" ; 
            echo "Opcion: "  ;
            $opcion = trim(fgets(STDIN)) ;   
        } 
    echo "\n" . "Hasta otra ocasion!" ;