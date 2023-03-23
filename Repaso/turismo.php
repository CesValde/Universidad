<?php

    /**
     * 
     * @return array 
     */
    function registrarEncuesta() {
        //

        $datosTuristas[] = [
            "nombre" => "" , 
            "dinero" => "" ,
            "cantsanmartin" => "" , 
            "cantbariloche" => "" , 
            "mediotransporte" => "" 
        ] ; 

        echo "Ingrese cantidad de personas a entrevistar: " ; 
        $cantPersonas = trim(fgets(STDIN)) ; 

        for($i=0 ; $i<$cantPersonas ; $i++) {
            echo "Ingrese su nombre: " ; 
            $nombre = trim(fgets(STDIN)) ; 
            echo "¿Cantidad aproximada de dinero que piensa invertir en sus próximas vacaciones? " ; 
            $dinero = trim(fgets(STDIN)) ; 
            echo "¿Cuántas veces viajó a San Martin? " ; 
            $cantViajesSanMartin = trim(fgets(STDIN)) ; 
            echo "¿Cuántas veces viajó a Bariloche? " ; 
            $cantViajesBari= trim(fgets(STDIN)) ; 
            echo "¿Cuál es medio de transporte por excelencia que utiliza para sus vacaciones: Auto o Colectivo? " ; 
            $transporte = trim(fgets(STDIN)) ; 

            $datosTuristas[$i]["nombre"] = $nombre ; 
            $datosTuristas[$i]["dinero"] = $dinero ; 
            $datosTuristas[$i]["cantsanmartin"] = $cantViajesSanMartin ; 
            $datosTuristas[$i]["cantbariloche"] = $cantViajesBari ; 
            $datosTuristas[$i]["mediotransporte"] = $transporte ; 
        }
        return $datosTuristas ; 
    }

    /**
     * Recibe el arreglo de encuestas y retorna la cantidad de personas encuestadas.
     * @return int 
     */
    function cantidadPersonasEncuestadas($datosTuristas) {
        //
        
        $cantPersoEncuestadas = 0 ; 

        for($i=0 ; $i<count($datosTuristas) ; $i++) {
            if($datosTuristas[$i]['dinero'] > 0) {
                $cantPersoEncuestadas++ ; 
            }
        }
        return $cantPersoEncuestadas ; 
    }

    /**
     * Recibe el arreglo de encuestas y retorna el porcentaje de personas que conocen ambos destinos turísticos
     * @param array $datosTuristas
     * @return float
     */
    function porcentajeAmbosDestinos($datosTuristas) {
        // float 

        
        $conoceAmbos = 0 ; 
        $porcenAmbosDestinos = 0 ; 
        $totalPersonas = count($datosTuristas) ;
        
        foreach($datosTuristas as $turista) {
            if($turista['cantsanmartin'] && $turista['cantbariloche']) {
                $conoceAmbos++;
            } 
        }
        $porcenAmbosDestinos = ($conoceAmbos / $totalPersonas) * 100 ;

        return $porcenAmbosDestinos ; 
    }

    /**
     * Recibe el arreglo de encuestas y retorna un arreglo asociativo
     */
    function infoPersona($datosTuristas) {
        //

        $destinos = [] ; 
        $maxTuristaBari = [] ; 
        $maxTuristaSanM = [] ; 
        $mayVisitBari = -1 ; 
        $mayVisitSanM = -1 ; 
        $auto = 0 ; 
        $colectivo = 0 ;
         

        $destinos [] = [
            "bariloche" => $maxTuristaBari , 
            "sanmartin" => $maxTuristaSanM , 
        ] ; 

        $maxTuristaBari = [
            "nombrePersona" => '' ,
            "transporte" => ''
        ] ; 

        $maxTuristaSanM = [
            "nombrePersona" => '' ,
            "transporte" => ''
        ] ;


        foreach($datosTuristas as $turista) {
            if($turista['cantbariloche'] > $mayVisitBari) {
                $maxTuristaBari['nombrePersona'] = $datosTuristas['nombre'] ;
                    foreach($datosTuristas as $vehiculoPref) {
                        if($vehiculoPref["mediotransporte"] == "auto") {
                            $auto++ ; 
                        } else {
                            $colectivo++ ; 
                        }
                    }
                    if($auto > $colectivo) {
                        $maxTuristaBari["transporte"] = 'auto' ;  
                    } else {
                        $maxTuristaBari["transporte"] = 'colectivo' ;  
                    }
            }
        } 
        return $destinos ; 
    }

    /**
     * 
     */
    function darPromedio($datosTuristas) {
        //
        
        
    }



    $datosTuristas = registrarEncuesta() ; 
    $cantPersoEncuestadas = cantidadPersonasEncuestadas($datosTuristas) ; 
    $porcenAmbosDestinos = porcentajeAmbosDestinos($datosTuristas) ; 
    echo $porcenAmbosDestinos ; 
    print_r($datosTuristas) ; 