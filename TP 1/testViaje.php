<?php 

    include "classViaje.php" ; 

    $viajeNqn = new Viaje(1234, "Neuquen", 5, 1, "Cesar", "Valderrama", 95947908) ; 

    $datosPasajeros = [
        "nombre" => '' , 
        "apellido" => '' , 
        "nroDoc" => ''
    ] ; 

    // $datosPasajeros = $this -> datosPasajeros() ; 
   
        do {
            echo "Ingrese una opcion: " . "\n" ; 
            echo "1. Cargar informacion del viaje" . "\n" ;
            echo "2. Modificar informacion del viaje" . "\n" ; 
            echo "3. Ver informacion del viaje" . "\n" ; 
            echo "4. Salir" . "\n" ; 
            $opcion = trim(fgets(STDIN)) ; 
    
            switch($opcion) {
                case 1: 
                    print_r($datosPasajeros) ; 


                    /*
                    echo "Ingrese destino: " ; 
                    $destino = trim(fgets(STDIN)) ; 
                    echo "Ingrese codigo de destino: " ; 
                    $codigoViaje = trim(fgets(STDIN)) ; 
                    echo "Ingrese cantidad maxima de pasajeros: " ; 
                    $cantMaxPasajeros = trim(fgets(STDIN)) ; 
                    echo "Ingrese cantidad de pasajeros: " ; 
                    $cantPasajeros = trim(fgets(STDIN)) ; 
                        for($i=0 ; $i<$cantPasajeros ; $i++) {
                            echo "Ingrese nombre del pasajero: " ; 
                            $nombrePasajero = trim(fgets(STDIN)) ; 
                            echo "Ingrese apellido del pasajero: " ; 
                            $apellidoPasajero = trim(fgets(STDIN)) ; 
                            echo "Ingrese nro de documento: " ; 
                            $nroDocPasajero = trim(fgets(STDIN)) ; 
                            $datosPasajeros[$i]['nombre'] = $nombrePasajero ; 
                            $datosPasajeros[$i]['apellido'] = $apellidoPasajero ; 
                            $datosPasajeros[$i]['numero de documento'] = $nroDocPasajero ;
                    */
                    
                    break ; 
                case 2: 
                    echo "Que dato desea modificar? " ; 
                    $dato = trim(fgets(STDIN)) ; 

                    break ; 
                case 3: 
                    $destino = $viajeNqn -> getDestino() ; 
                    echo "\n" ; 
                    echo "Informacion del viaje a $destino" . "\n" ; 
                    echo $viajeNqn -> getCodigoViaje() . "\n" ;     
                    echo $viajeNqn -> getDestino() . "\n" ; 
                    echo $viajeNqn -> getCantMaxPasajeros() . "\n" ; 
                    echo $viajeNqn -> getCantPasajeros() . "\n" ; 
                    echo $viajeNqn -> getNombre() . "\n" ; 
                    echo $viajeNqn -> getApellido() . "\n" ; 
                    echo $viajeNqn -> getNroDoc() . "\n" ; 
                    echo "\n" ; 
                    break ;     
            } 
        }  while($opcion != 4) ; 