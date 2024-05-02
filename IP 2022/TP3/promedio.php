<?php 

    // Programa Nota
    // Calcula el promedio de 3 notas 
    // int $nota1, $nota2, $nota3 float $promedio 

    echo "Ingrese la primera nota: " ;
    $nota1 = trim(fgets(STDIN)) ; 
    echo "Ingrese la segunda nota: " ; 
    $nota2 = trim(fgets(STDIN)) ; 
    echo "Ingrese la tercera nota: " ; 
    $nota3 = trim(fgets(STDIN)) ; 
    $promedio = ($nota1 + $nota2 + $nota3) / 3 ; 
    echo "El promedio de las 3 notas es: " . $promedio ;