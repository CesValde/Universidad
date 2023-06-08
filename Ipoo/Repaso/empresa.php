<?php

    /**
     * Almacena datos de un empleado 
     * @return array
     */
    function infoEmpleados() {
        // array $infoEmpleado, $datosEmpleado, $resumenEmpleado

        $infoEmpleado = [] ; 
        $datosEmpleado = [] ; 
        $resumenEmpleado = [
            "Nombre" => '' ,
            "Sueldo Total" => '' ,
        ] ; 

        $infoEmpleado[0] = ["Nombre Completo" => "Cesar" ,  "Sueldo Basico" => "80000" , "Antiguedad" => "11"] ;
        $infoEmpleado[1] = ["Nombre Completo" => "Lucia" ,  "Sueldo Basico" => "70000" , "Antiguedad" => "8"] ; 
        $infoEmpleado[2] = ["Nombre Completo" => "Enzo" ,  "Sueldo Basico" => "60000" , "Antiguedad" => "7"] ; 
        $infoEmpleado[3] = ["Nombre Completo" => "Gise" ,  "Sueldo Basico" => "50000" , "Antiguedad" => "6"] ; 
        $infoEmpleado[4] = ["Nombre Completo" => "Sergio" ,  "Sueldo Basico" => "40000" , "Antiguedad" => "15"] ; 

        for($i=0 ; $i<count($infoEmpleado) ; $i++) {
            $datosEmpleado["Nombre"] = $infoEmpleado[$i]["Nombre Completo"] ;
                if($infoEmpleado[$i]["Antiguedad"] > 10) {
                    $datosEmpleado["Sueldo Total"] = (($infoEmpleado[$i]["Sueldo Basico"] * 0.50) + $infoEmpleado[$i]["Sueldo Basico"]) ;
                } else {
                    $datosEmpleado["Sueldo Total"] = (($infoEmpleado[$i]["Sueldo Basico"] * 0.25) + $infoEmpleado[$i]["Sueldo Basico"]) ;
                }
                array_push($resumenEmpleado, $datosEmpleado) ; 
        }
        return $resumenEmpleado ; 
    }

    /* Programa Principal */
    // Despliega un menu con las opciones a querer ejecutar
    // int $opcion, $mayganancia, $i, $total 
    // array $nombreMeses, $meses, $resumenEmpleado 


    do {
        echo "Ingrese un numero: " ; 
        $opcion = trim(fgets(STDIN)) ; 

        switch($opcion) {
            case 1: 

                $nombreMeses = [] ; 
                $meses = [] ; 
                $mayGanancia = -1 ; 

                $nombreMeses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre",
                "octubre", "noviembre", "diciembre"] ;

                $meses[0] = ["Cant recaudada" => '100' , "Costo total" => '85'] ; 
                $meses[1] = ["Cant recaudada" => '100' , "Costo total" => '20'] ; 
                $meses[2] = ["Cant recaudada" => '100' , "Costo total" => '30'] ; 
                $meses[3] = ["Cant recaudada" => '100' , "Costo total" => '40'] ; 
                $meses[4] = ["Cant recaudada" => '100' , "Costo total" => '50'] ; 
                $meses[5] = ["Cant recaudada" => '100' , "Costo total" => '60'] ; 
                $meses[6] = ["Cant recaudada" => '100' , "Costo total" => '70'] ; 
                $meses[7] = ["Cant recaudada" => '100' , "Costo total" => '80'] ;
                $meses[8] = ["Cant recaudada" => '100' , "Costo total" => '10'] ; 
                $meses[9] = ["Cant recaudada" => '100' , "Costo total" => '90'] ; 
                $meses[10] = ["Cant recaudada" => '100' , "Costo total" => '95'] ; 
                $meses[11] = ["Cant recaudada" => '100' , "Costo total" => '97'] ;

                for($i=0 ; $i<count($meses) ; $i++) {
                    $total = $meses[$i]["Cant recaudada"] - $meses[$i]["Costo total"] ; 
                        if($total > $mayGanancia) {
                            $mes = $nombreMeses[$i] ; 
                        }
                    }
                    echo "El mes con mayor ganancia es '$mes' \n" ; 
                break ; 
            case 2: 
               $resumenEmpleado = infoEmpleados() ; 
                print_r($resumenEmpleado) ; 
                break ; 
        }    
    }  while($opcion != 3) ;