<?php

    /* Programa IpLearning */
    // Muestra los valores solicitados 
    // int $menorEdad, $cantProfesionales, $promedio, $cantEmpleados, $cantTecnicos, $sumaEdad, $porcentaje, $edad
    // string $respuesta, $nombre, $puesto, $nombreMenorEdad

    $menorEdad = 9999 ;    
    $cantProfesionales = 0 ;
    $promedio = 0 ; 
    $cantEmpleados = 0 ; 
    $cantTecnicos = 0 ;
    $sumaEdad = 0 ; 
    $porcentaje = 0 ; 

    echo "Desea ingresar empleado? " ; 
    $respuesta = trim(fgets(STDIN)) ; 
   
        while($respuesta == "si") {
            echo "Ingrese nombre del empleado: " ;
            $nombre = trim(fgets(STDIN)) ; 
            echo "Ingrese edad: " ; 
            $edad = trim(fgets(STDIN)) ; 
            echo "Ingrese puesto: " ; 
            $puesto = trim(fgets(STDIN)) ; 

            $cantEmpleados = $cantEmpleados + 1 ; 

                if($edad < $menorEdad) {
                    $menorEdad = $edad ; 
                    $nombreMenorEdad = $nombre ; 
                }
                if($puesto == "t") {
                    $sumaEdad = $sumaEdad + $edad ; 
                    $cantTecnicos = $cantTecnicos + 1 ;
                } elseif($puesto == "p") {
                    $cantProfesionales = $cantProfesionales + 1 ; 
                }
            echo "Desea ingresar otro empleado? " ; 
            $respuesta = trim(fgets(STDIN)) ; 
        }

        if($cantEmpleados == 0 ) {
            echo "Error no se ingresaron empleados" ; 
        } else {
            $promedio = $sumaEdad / $cantTecnicos ; 
            $porcentaje = ($cantProfesionales * 100) / $cantEmpleados ; 
            echo $nombreMenorEdad . "\n" ; 
            echo $porcentaje . "\n" ; 
            echo $promedio  ; 
        }