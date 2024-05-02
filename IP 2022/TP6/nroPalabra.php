<?php

    /* Programa secuencia */
    // Muestra la palabras ingresadas con su respectivo numero de ingreso
    // int $cantPalabras, $i
    // string $palabra 

    echo "Cuantas palabras desea ingresar: " ; 
    $cantPalabras = trim(fgets(STDIN)) ; 
        for($i = 1 ; $i <= $cantPalabras ; $i++) {
            echo "Ingrese palabra: " ; 
            $palabra = trim(fgets(STDIN)) ; 
            echo "Su palabra numero " . $i . " es: " . $palabra . "\n" ; 
        }