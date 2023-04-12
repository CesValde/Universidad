
<?php 

    include "classViaje.php" ; 

    /*
    $pasajeros[] = [
        "nombre" => '' , 
        "apellido" => '' , 
        "nroDoc" => ''
    ] ; 
*/

    $cantPasajeros = 0 ; 
    $i = 0 ;
   
        do {

            echo "Ingrese una opcion: " . "\n" ; 
            echo "1. Cargar informacion del viaje" . "\n" ;
            echo "2. Modificar informacion del viaje" . "\n" ; 
            echo "3. Ver informacion del viaje" . "\n" ; 
            echo "4. Salir" . "\n" ; 
            echo "Ingrese opcion: " ; 
            $opcion = trim(fgets(STDIN)) ;
            echo "\n" ;
                while($opcion < 1 || $opcion > 4) {
                    echo "Ingrese una opcion correcta" ; 
                    echo "\n" ;  
                    echo "1. Cargar informacion del viaje" . "\n" ;
                    echo "2. Modificar informacion del viaje" . "\n" ; 
                    echo "3. Ver informacion del viaje" . "\n" ; 
                    echo "4. Salir" . "\n" ; 
                    echo "Ingrese opcion: " ; 
                    $opcion = trim(fgets(STDIN)) ;
                    echo "\n" ; 
                }         
    
            switch($opcion) {
                case 1:     
                    echo "Ingrese codigo de viaje: " ; 
                    $codigoViaje = trim(fgets(STDIN)) ; 
                        while($codigoViaje == "") {
                            echo "Error: ingrese un codigo de viaje: " ; 
                            $codigoViaje = trim(fgets(STDIN)) ;
                        }
                    echo "Ingrese el destino: " ; 
                    $destino = trim(fgets(STDIN)) ;
                        while(!ctype_alpha($destino) || $destino == "") {
                            echo "Error: ingrese un destino valido: " ; 
                            $destino = trim(fgets(STDIN)) ;
                        }
                    echo "Ingrese cantidad maxima de pasajeros: " ; 
                    $cantMaxPasajeros = trim(fgets(STDIN)) ;
                        while($cantMaxPasajeros == "" || !ctype_digit($cantMaxPasajeros)) {
                            echo "Error: ingrese una cantidad maxima de pasajeros: " ; 
                            $cantMaxPasajeros = trim(fgets(STDIN)) ;
                        }
                        while($cantPasajeros < $cantMaxPasajeros) {
                            echo "Ingrese nombre del pasajero: " ; 
                            $nombre = trim(fgets(STDIN)) ;  
                                while(!ctype_alpha($nombre) || $nombre == "") {
                                    echo "Error: ingrese un nombre valido: " ; 
                                    $nombre = trim(fgets(STDIN)) ;
                                }
                            $pasajeros[$i]['nombre'] = $nombre ;
                            echo "Ingrese apellido del pasajero: " ; 
                            $apellido = trim(fgets(STDIN)) ; 
                                while(!ctype_alpha($apellido) || $apellido == "") {
                                    echo "Error: ingrese un apellido valido: " ; 
                                    $apellido = trim(fgets(STDIN)) ;
                                }
                            $pasajeros[$i]['apellido'] = $apellido ;
                            echo "Ingrese nro de documento: " ; 
                            $dni = trim(fgets(STDIN)) ;
                                while(!ctype_digit($dni) || $dni == "") {
                                    echo "Error: ingrese un dni valido: " ; 
                                    $dni = trim(fgets(STDIN)) ;
                                }
                            $pasajeros[$i]['nroDoc'] = $dni ;
                            $cantPasajeros++ ; 
                            $i++ ; 
                        } 
                        // print_r($pasajeros) ; 
                    $viajeNqn = new Viaje ($codigoViaje, $destino, $cantMaxPasajeros, $pasajeros) ;         
                    // print_r($pasajeros) ;          
                break ; 
                case 2: 
                    echo "Que dato desea modificar? " . "\n" ; 
                    echo "Codigo del viaje -> cdv" . "\n" ; 
                    echo "Destino -> destino" . "\n" ; 
                    echo "Cantidad max de pasajeros -> cmp" . "\n" ;
                    echo "Nombre -> nombre" . "\n" ; 
                    echo "Apellido -> apellido" . "\n" ; 
                    echo "Numero de documento -> dni" . "\n" ; 
                    echo "Eliminar pasajero -> ep" . "\n" ; 
                    echo "Añadir pasajero -> ap" . "\n" ; 
                    echo "Ingrese opcion: " ; 
                    $dato = trim(fgets(STDIN)) ; 
                    echo "\n" ;             
                    $dato = str_replace('', '', $dato) ; 
                    $dato = strtolower($dato) ; 
                        switch($dato) {
                            case "cdv": 
                                echo "Ingrese nuevo codigo de viaje: " ; 
                                $codigoViaje = trim(fgets(STDIN)) ; 
                                    while($codigoViaje == "") {
                                        echo "Error: ingrese un codigo de viaje: " ; 
                                        $codigoViaje = trim(fgets(STDIN)) ;
                                    }
                                $viajeNqn -> setCodigoViaje($codigoViaje) ; 
                            break ; 
                            case "destino":
                                echo "Ingrese nuevo destino: " ; 
                                $destino = trim(fgets(STDIN)) ; 
                                    while(!ctype_alpha($destino) || $destino == "") {
                                        echo "Error: ingrese un destino valido: " ; 
                                        $destino = trim(fgets(STDIN)) ;
                                    }
                                $viajeNqn -> setDestino($destino) ; 
                            break ; 
                            case "cmp": 
                                echo "Ingrese nueva cantidad max de pasajeros: " ; 
                                $cantMaxPasajeros = trim(fgets(STDIN)) ; 
                                    while($cantMaxPasajeros == "") {
                                        echo "Error: ingrese una cantidad maxima de pasajeros: " ; 
                                        $cantMaxPasajeros = trim(fgets(STDIN)) ;
                                    }
                                $viajeNqn -> setCantMaxPasajeros($cantMaxPasajeros) ; 
                                echo "Desea agregar nuevos pasajeros? " ; 
                                $respuesta = trim(fgets(STDIN)) ; 
                                while(!ctype_alpha($respuesta) || $respuesta == "") {
                                    echo "Error: ingrese una respuesta valida" ; 
                                    $respuesta = trim(fgets(STDIN)) ; 
                                }
                                if($cantPasajeros < $cantMaxPasajeros) {
                                    $disponible = true ; 
                                }
                                while($respuesta == "si" && $disponible == true) {
                                        while($cantPasajeros < $cantMaxPasajeros) {
                                            echo "Ingrese nombre del pasajero: " ; 
                                            $nombre = trim(fgets(STDIN)) ;  
                                                while(!ctype_alpha($nombre) || $nombre == "") {
                                                    echo "Error: ingrese un nombre valido: " ; 
                                                    $nombre = trim(fgets(STDIN)) ;
                                                }
                                            $pasajeros[$i]['nombre'] = $nombre ;
                                            echo "Ingrese apellido del pasajero: " ; 
                                            $apellido = trim(fgets(STDIN)) ; 
                                                while(!ctype_alpha($apellido) || $apellido == "") {
                                                    echo "Error: ingrese un apellido valido: " ; 
                                                    $apellido = trim(fgets(STDIN)) ;
                                                }
                                            $pasajeros[$i]['apellido'] = $apellido ;
                                            echo "Ingrese nro de documento: " ; 
                                            $dni = trim(fgets(STDIN)) ;
                                                while(!ctype_digit($dni) || $dni == "") {
                                                    echo "Error: ingrese un dni valido: " ; 
                                                    $dni = trim(fgets(STDIN)) ;
                                                }
                                            $pasajeros[$i]['nroDoc'] = $dni ;
                                            $cantPasajeros++ ; 
                                            $i++ ; 
                                        }   
                                        if($cantPasajeros == $cantMaxPasajeros) {
                                            echo "Ya no hay asientos disponibles" . "\n" ;
                                            echo "\n" ; 
                                            $disponible = false ; 
                                        } 
                                }
                                $disponible = true ; 
                            break ; 
                            case "nombre": 
                                echo "Ingrese dni del pasajero: " ; 
                                $dni = trim(fgets(STDIN)) ; 
                                    while(!ctype_digit($dni)) {
                                        echo "Ingrese dni valido: " ; 
                                        $dni = trim(fgets(STDIN)) ; 
                                        echo "\n" ;    
                                    }
                                $existe = false ; 
                                $j = 0 ;
                                    while($j<count($pasajeros)) {
                                        if($dni == $pasajeros[$j]['nroDoc']) {
                                            echo "Ingrese nuevo nombre: " ; 
                                            $nombre = trim(fgets(STDIN)) ; 
                                                while(!ctype_alpha($nombre) || $nombre == "") {
                                                    echo "Error: ingrese un nombre valido: " ; 
                                                    $nombre = trim(fgets(STDIN)) ;
                                                }
                                            $pasajeros[$j]['nombre'] = $nombre ; 
                                            $viajeNqn -> setPasajeros($pasajeros) ; 
                                            $j = count($pasajeros) ; 
                                            $existe = true ; 
                                        }
                                        $j++ ; 
                                    }
                                    if($existe == false) {
                                        echo "No existe el nro de documento ingresado \n" ; 
                                    }
                            break ; 
                            case "apellido":
                                echo "Ingrese dni del pasajero: " ; 
                                $dni = trim(fgets(STDIN)) ; 
                                    while(!ctype_digit($dni)) {
                                        echo "Ingrese dni valido: " ; 
                                        $dni = trim(fgets(STDIN)) ; 
                                        echo "\n" ;    
                                    }
                                $existe = false ; 
                                $j = 0 ; 
                                    while($j<count($pasajeros)) {
                                        if($dni == $pasajeros[$j]['nroDoc']) {
                                            echo "Ingrese nuevo apellido: " ; 
                                            $apellido = trim(fgets(STDIN)) ; 
                                                while(!ctype_alpha($apellido) || $apellido == "") {
                                                    echo "Error: ingrese un apellido valido: " ; 
                                                    $apellido = trim(fgets(STDIN)) ;
                                                }
                                            $pasajeros[$j]['apellido'] = $apellido ; 
                                            $viajeNqn -> setPasajeros($pasajeros) ; 
                                            $j = count($pasajeros) ; 
                                            $existe = true ; 
                                        }
                                        $j++ ; 
                                    }
                                    if($existe == false) {
                                        echo "No existe el nro de documento ingresado \n" ; 
                                    }
                            break ; 
                            case "dni": 
                                echo "Ingrese dni del pasajero: " ; 
                                $dni = trim(fgets(STDIN)) ; 
                                    while(!ctype_digit($dni)) {
                                        echo "Ingrese dni valido: " ; 
                                        $dni = trim(fgets(STDIN)) ; 
                                        echo "\n" ;                                            
                                    }

                                    $existe = false ; 
                                    $j = 0 ; 
                                    while($j<count($pasajeros)) {
                                        if($dni == $pasajeros[$j]['nroDoc']) {
                                            echo "Ingrese nuevo dni: " ; 
                                            $dni = trim(fgets(STDIN)) ; 
                                                while(!ctype_digit($dni)) {
                                                    echo "Ingrese dni valido: " ; 
                                                    $dni = trim(fgets(STDIN)) ; 
                                                    echo "\n" ;                                            
                                                }
                                            $pasajeros[$j]['nroDoc'] = $dni ; 
                                            $viajeNqn -> setPasajeros($pasajeros) ; 
                                            $j = count($pasajeros) ; 
                                            $existe = true ; 
                                        }
                                        $j++ ; 
                                    }
                                    if($existe == false) {
                                        echo "No existe el nro de documento ingresado \n" ; 
                                        echo "\n" ; 
                                    }  
                            break ; 
                            case "ep":
                                echo "Ingrese dni del pasajero: " ; 
                                $dni = trim(fgets(STDIN)) ; 
                                    while(!ctype_digit($dni)) {
                                        echo "Ingrese dni valido: " ; 
                                        $dni = trim(fgets(STDIN)) ; 
                                        echo "\n" ;    
                                    }
                                $k = 0 ; 
                                while($k<count($pasajeros)) {
                                    if($dni == $pasajeros[$k]['nroDoc']) {
                                        unset($pasajeros[$k]) ; 
                                        $cantPasajeros-- ; 
                                    }
                                    $k++ ; 
                                }                 
                            break ; 
                            case "ap": 
                                if($cantPasajeros < $cantMaxPasajeros) {
                                    echo "Ingrese nombre del pasajero: " ; 
                                    $nombre = trim(fgets(STDIN)) ;  
                                        while(!ctype_alpha($nombre) || $nombre == "") {
                                            echo "Error: ingrese un nombre valido: " ; 
                                            $nombre = trim(fgets(STDIN)) ;
                                        }
                                    $pasajeros[$i]['nombre'] = $nombre ;
                                    echo "Ingrese apellido del pasajero: " ; 
                                    $apellido = trim(fgets(STDIN)) ; 
                                        while(!ctype_alpha($apellido) || $apellido == "") {
                                            echo "Error: ingrese un apellido valido: " ; 
                                            $apellido = trim(fgets(STDIN)) ;
                                        }
                                    $pasajeros[$i]['apellido'] = $apellido ;
                                    echo "Ingrese nro de documento: " ; 
                                    $dni = trim(fgets(STDIN)) ;
                                        while(!ctype_digit($dni) || $dni == "") {
                                            echo "Error: ingrese un dni valido: " ; 
                                            $dni = trim(fgets(STDIN)) ;
                                        }
                                    $pasajeros[$i]['nroDoc'] = $dni ;
                                    $cantPasajeros++ ; 
                                    $i++ ;
                                } else {
                                    echo "No hay asientos disponibles" . "\n" ; 
                                    echo "\n" ; 
                                }
                            break ;
                        }
                break ; 
                case 3: 
                    /*
                    if($cantPasajeros > 0) {
                        echo $viajeNqn ; 
                        
                        echo "\n" ; 
                        for($i=0 ; $i<count($pasajeros) ; $i++) {
                            echo "Nombre del pasajero " . $pasajeros[$i]['nombre'] . "\n" ; 
                            echo "Apellido del pasajero " . $pasajeros[$i]['apellido'] . "\n" ; 
                            echo "Nro de documento del pasajero " . $pasajeros[$i]['nroDoc'] . "\n" ; 
                            echo "\n" ; 
                        }   
                    } else {
                        echo "No hay datos para mostrar" . "\n" ;
                        echo "\n" ; 
                    }     
                    */           
                break ;
                case 4: 
                    echo $viajeNqn ;               
                break ;
            } 
        }  while($opcion != 5) ; 