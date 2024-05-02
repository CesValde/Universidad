<?php

    /** Programa Censo */
    /* Muestra la Cantidad de encuestas, la cantidad de viviendas con menores, el nombre del jefe con mas cantidad de menores y 
        el promedio de la cantidad de personas por vivienda */
    // int $cantViviendasMenor, $mayorCantidadMenores, $habitantesTotales, $cantMenores, $cantHabitantes, $cantEncuestas
    // float $promedioCantPersonas
    // string $nombreJefe, $nombreJefeMenores

    $cantViviendasMenor = 0 ; 
    $mayorCantidadMenores = -1 ;
    $habitantesTotales = 0 ;
  
    echo "Ingrese cantidad de encuentas a realizar: " ; 
    $cantEncuestas = trim(fgets(STDIN)) ; 
        for($i = 0 ; $i < $cantEncuestas ; $i++) {      // otra opcion $i = 1 ; $i <= $cantEncuestas
            echo "Ingrese nombre del jefe del hogar: " ; 
            $nombreJefe = trim(fgets(STDIN)) ;
            echo "Ingrese cantidad de habitantes que viven en la vivienda: " ; 
            $cantHabitantes = trim(fgets(STDIN)) ; 
            echo "Ingrese cantidad de niños menores a 18: " ; 
            $cantMenores = trim(fgets(STDIN)) ; 
                if($cantMenores > 0) {
                    $cantViviendasMenor = $cantViviendasMenor + 1 ;
                }
                if($cantMenores > $mayorCantidadMenores) {
                    $mayorCantidadMenores = $cantMenores ; 
                    $nombreJefeMenores = $nombreJefe ; 
                }
            $habitantesTotales = $habitantesTotales + $cantHabitantes ; 
        }
        $promedioCantPersonas = $habitantesTotales / $cantEncuestas ; 
        echo "Cantidad de encuestas: " . $cantEncuestas . "\n" ; 
        echo "Cantidad de viviendas con menores: " . $cantViviendasMenor . "\n" ; 
        echo "Nombre del jefe con mas cantidad de menores: " . $nombreJefeMenores . "\n" ; 
        echo "Promedio de la cantidad de personas por vivienda: " . $promedioCantPersonas . "\n" ; 