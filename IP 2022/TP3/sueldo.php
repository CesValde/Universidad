<?php 

    // PROGRAMA Sueldo
    // Calcula el porcentaje de aumento del salario
    // int $sueldoInicial, $sueldoDeseado Float $porcentaje, $resultado

    echo "Ingrese sueldo inicial: " ; 
    $sueldoInicial = trim(fgets(STDIN)) ; 
    echo "Ingrese sueldo deseado: " ; 
    $sueldoDeseado = trim(fgets(STDIN)) ; 
    $resultado = ($sueldoDeseado / $sueldoInicial ) * 100 ; 
    $porcentaje = $resultado - 100 ; 
    echo "El porcentaje de aumento es: " . $porcentaje ; 