<?php 

    // Programa Velocidad
    /* Calcula la velocidad de un vehiculo a partir de la distancia en km y tiempo en horas del recorrido */ 
    // FLOAT $distancia, $tiempo, $velocidad

    echo "Ingrese la distancia en km: " ; 
    $distancia = trim(fgets(STDIN)) ; 
    echo "Ingrese el tiempo en horas: " ; 
    $tiempo = trim(fgets(STDIN)) ; 
    $velocidad = $distancia / $tiempo ; 
    echo "La velocidad que tomo el vehiculo en: " . $distancia . "km y " . $tiempo . " horas es de: " . $velocidad . " km/h" ; 