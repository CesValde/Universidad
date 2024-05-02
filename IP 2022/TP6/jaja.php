<?php 

    /** Programa Empresa */
    // Calcula el promedio de los sueldos ingresados 
    // string $respuesta 
    // float $sueldo, $promedio 

        $sumaSueldo = 0 ; 
        $cantSueldos = 0 ; 

    echo "Desea ingresar un sueldo? " . "\n" ; 
    $respuesta = trim(fgets(STDIN)) ; 

        if($respuesta == "no") {                              
            echo "No a ingresado ningun sueldo" ; 
        } elseif($respuesta <> "si" || $respuesta != "no") {
            echo "Deja tu marisquera ingresa, si o no" ;            
        } else {
            while($respuesta == "si") {
                echo "ingrese un sueldo: " ; 
                $sueldo = trim(fgets(STDIN)) ; 
                $sumaSueldo = $sumaSueldo + $sueldo ; 
                $cantSueldos = $cantSueldos + 1 ; 
                echo "Desea ingresar otro sueldo? " ; 
                $respuesta = trim(fgets(STDIN)) ; 
            }
            $promedio = $sumaSueldo / $cantSueldos ; 
            echo "El promedio de los sueldos es de: " . $promedio ; 
        }