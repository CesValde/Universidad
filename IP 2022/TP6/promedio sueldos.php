<?php 

    /** Programa Empresa */
    // Calcula el promedio de los sueldos ingresados 
    // string $respuesta 
    // float $sueldo, $promedio, $sumaSueldo
    // int $cantSueldos 

        $sumaSueldo = 0 ; 
        $cantSueldos = 0 ; 

    echo "Desea ingresar un sueldo? " ; 
    $respuesta = trim(fgets(STDIN)) ; 

        while($respuesta == "si") {
            echo "ingrese un sueldo: " ; 
            $sueldo = trim(fgets(STDIN)) ; 
            $sumaSueldo = $sumaSueldo + $sueldo ; 
            $cantSueldos = $cantSueldos + 1 ; 
            echo "Desea ingresar otro sueldo? " ; 
            $respuesta = trim(fgets(STDIN)) ; 
        }
        if($cantSueldos == 0) {
            echo "No ha ingresado ningun sueldo" ;
        } else {
            $promedio = $sumaSueldo / $cantSueldos ; 
            echo "El promedio de los sueldos es de: " . $promedio ; 
        }