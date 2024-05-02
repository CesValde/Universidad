<?php 

    // Programa Telefonica 
    // Desencripta numeros enteros 
    // int $numero, $dig1, $resto, $dig2, $dig3, $dig4, $aux, $num

    echo "Ingrese un numero de 4 digitos: " ; 
    $numero = trim(fgets(STDIN)) ;

    /* Separa el numero en cifras */ 
    $dig1 = (int) ($numero / 1000) ; 
    $resto = $numero % 1000 ; 
    $dig2 = (int) ($resto / 100) ; 
    $resto = $numero % 100 ; 
    $dig3 = (int) ($resto / 10 ) ;
    $dig4 = $resto % 10 ; 

    $dig1 = (($dig1 + 10 - 7) % 10) ; 
    $dig2 = (($dig2 + 10 - 7) % 10) ; 
    $dig3 = (($dig3 + 10 - 7) % 10) ; 
    $dig4 = (($dig4 + 10 - 7) % 10) ; 

    /* Intercambia los valores */ 
    $aux = $dig3 ;
    $dig3 = $dig1 ;
    $dig1 = $aux ; 
    $aux = $dig4 ; 
    $dig4 = $dig2 ; 
    $dig2 = $aux ; 

    /*Convertir a numero entero*/
    $dig1 = $dig1 * 1000 ; 
    $dig2 = $dig2 * 100 ; 
    $dig3 = $dig3 * 10 ; 
    $num = $dig1 + $dig2 + $dig3 + $dig4 ; 

    echo "El numero desencriptado es: " . $num ; 