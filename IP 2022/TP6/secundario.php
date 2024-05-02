<?php 

    /** Programa Colegio */
    // Calcula la edad y altura del alumno con mayor edad y la edad y peso del alumno con menor edad
    // int $cantAlumnos, $anioNac, $edad 
    // float $altura, $peso, $sumaPeso
    // string $respuesta 

    $cantAlumnos = 0 ;
    $sumaPeso = 0 ;
    $mayorEdad = -1 ; 
    $menorEdad = 9999 ; 
   
    echo "Desea ingresar datos de un alumno? " ;
    $respuesta = trim(fgets(STDIN)) ; 
    
        while($respuesta == "si") {
            echo "Ingrese año de nacimiento: " ; 
            $anioNac = trim(fgets(STDIN)) ; 
            echo "Ingrese altura: " ; 
            $altura = trim(fgets(STDIN)) ; 
            echo "Ingrese peso: " ; 
            $peso = trim(fgets(STDIN)) ;
            $cantAlumnos = $cantAlumnos + 1 ;
            $sumaPeso = $sumaPeso + $peso ; 
            $edad = 2022 - $anioNac ; 
                if($edad > $mayorEdad) {
                    $mayorEdad = $edad ; 
                    $mayorAltura = $altura ; 
                }
                if($edad < $menorEdad) {
                    $menorEdad = $edad ; 
                    $menorPeso = $peso ; 
                }
            echo "Desea ingresar otro alumno? " ; 
            $respuesta = trim(fgets(STDIN)) ; 
        }
        if($cantAlumnos > 0) {
            $promedio = $sumaPeso / $cantAlumnos ;
            echo "Altura y edad del alumno con mayor edad: " . $mayorAltura . " " . $mayorEdad . "\n" ; 
            echo "Edad y peso del alumno con menor edad: " . $menorEdad . " " . $menorPeso . "\n" ; 
            echo "El peso promedio es de: " . $promedio ; 
        } else {
            echo "No ha ingresado ningun alumno" ; 
        }