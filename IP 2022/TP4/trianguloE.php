<?php

    /**
     * Calcula el perimetro de un triangulo equilatero 
     * @param int $lado
     * @return float 
     */

    function calcPerimetro($lado) {
        // float $perimetro

        $perimetro = $lado + $lado + $lado ; 
        return $perimetro ; 
    }

    /**
     * Calcula la altura de un triángulo equilátero 
     * @param int $lado 
     * @return float 
     */
    function calcAltura($lado) {
        // float $altura

        $altura = sqrt(($lado * $lado) - ($lado / 2) * ($lado / 2)) ;
        return $altura ; 
    }

    /**
     * Calcula el área de un triángulo equilátero
     * @param int $lado
     * @return float
     */

     function calcArea($lado) {
        // float $h, $area 

        $h = calcAltura($lado) ; 
        $area = ($lado * $h) / 2 ; 
        return $area ; 
    }

    // Programa Triangulo
    // Muestra por pantalla el perimetro y area de un triangulo equilatero 
    // int $ladoX, float $perimetroX, areaX

    echo "Ingrese el lado del triangulo equilatero: " ; 
    $ladoX = trim(fgets(STDIN)) ; 
    $perimetroX = calcPerimetro($ladoX) ; 
    $areaX = calcArea($ladoX) ; 
    echo "Dado un triángulo equilátero de " . $ladoX . " cm, su perímetro es: " . $perimetroX . 
    " cm y su área es de: " . $areaX . " cm2" ; 