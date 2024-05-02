<?php

    /* Programa Guardavidas */
    // Muestra 
    // int 
    //
    //

    $cantMujeres = 0 ; 
    $sumaEdadMujeres = 0 ; 
    $promedio = 0 ; 
    $menorEdad = 999 ; 
    $cantPersonas = 0 ; 

    echo "Desea ingresar persona rescatada? " ; 
    $respuesta = trim(fgets(STDIN)) ; 

    while($respuesta == "si") {
        echo "Ingrese edad: " ; 
        $edad = trim(fgets(STDIN)) ; 
        echo "Ingrese sexo: " ; 
        $sexo = trim(fgets(STDIN)) ; 

        $cantPersonas = $cantPersonas + 1 ; 
            if($sexo == "femenino") {
                $cantMujeres = $cantMujeres + 1 ;
                $sumaEdadMujeres = $sumaEdadMujeres + $edad ;
            }
            if($edad < $menorEdad) {
                $menorEdad = $edad ; 
                $sexoMenorEdad = $sexo ; 
            }
        echo "Desea ingresar otra persona? " ; 
        $respuesta = trim(fgets(STDIN)) ; 
    }

        if($cantPersonas == 0) {
            echo "No se registraron rescatados " ; 
        } elseif($cantMujeres > 0) {
            $promedio = $sumaEdadMujeres / $cantMujeres ; 
            echo "El promedio de la edad de las mujeres es: " . $promedio . "\n" ; 
            echo "Sexo de la persona de menor edad: " . $sexoMenorEdad . "\n" . 
            "edad de la persona de menor edad " . $menorEdad ;         
        } else {
            echo "El promedio de la edad de las mujeres es: " . $promedio . "\n" ; 
            echo "Sexo de la persona de menor edad: " . $sexoMenorEdad . "\n" . 
            "edad de la persona de menor edad " . $menorEdad ;
        }
  
