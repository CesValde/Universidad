<?php 

    include_once "Pasajero.php" ; 
    include_once "Viaje2.php" ; 
    include_once "ResponsableV.php" ;

    /**
     * Despliega el menu de opciones
     * @return string
     */
    function menu() {
        // string $opcion

        echo "\n" ; 
        echo "Ingrese una opcion: " . "\n" ; 
        echo "1. Cargar informacion del viaje" . "\n" ;
        echo "2. Modificar informacion del viaje" . "\n" ; 
        echo "3. Ver informacion del viaje" . "\n" ; 
        echo "4. Salir" . "\n" ; 
        echo "Ingrese opcion: " ; 
        $opcion = trim(fgets(STDIN)) ;
        echo "\n" ;
            while($opcion < 1 || $opcion > 4) {
                echo "Ingrese una opcion correcta" . "\n" ; 
                echo "\n" ;  
                echo "1. Cargar informacion del viaje" . "\n" ;
                echo "2. Modificar informacion del viaje" . "\n" ; 
                echo "3. Ver informacion del viaje" . "\n" ; 
                echo "4. Salir" . "\n" ; 
                echo "Ingrese opcion: " ; 
                $opcion = trim(fgets(STDIN)) ;
                echo "\n" ; 
            }
        return $opcion ;
    }

    /**
     * Valida si es un nombre valido
     * @param string $nombre
     * @return string
     */
    function validarNombre($nombre) {
        while(!ctype_alpha($nombre) || $nombre == "") {
            echo "Error: ingrese un nombre valido: " ; 
            $nombre = trim(fgets(STDIN)) ;
        }
        return $nombre ;
    }

    /**
     * Valida si es un apellido valido
     * @param string $apellido
     * @return string
     */
    function validarApellido($apellido) {
        while(!ctype_alpha($apellido) || $apellido == "") {
            echo "Error: ingrese un apellido valido: " ; 
            $apellido = trim(fgets(STDIN)) ;
        }
        return $apellido ;
    }

    /**
     * Valida si es un dni valido
     * @param int $dni
     * @return int
     */
    function validarDni($dni) {
        while(!ctype_digit($dni) || $dni == "") {
            echo "Error: ingrese dni valido: " ; 
            $dni = trim(fgets(STDIN)) ;    
        }
        return $dni ; 
    }

    /**
     * Valida si es un numero de telefono valido
     * @param int $dni
     * @return int
     */
    function validarNroTelefono($nroTelPasaj) {
        while(!ctype_digit($nroTelPasaj) || $nroTelPasaj == "") {
            // se podria hacer para verificar que tenga x cant de digitos 
            echo "Error: ingrese numero de telefono valido: " ; 
            $nroTelPasaj = trim(fgets(STDIN)) ;    
        }
        return $nroTelPasaj ; 
    }

    /**
     * Valida si es un codigo de viaje valido
     * @param string $codigoViaje
     * @return string
     */
    function validarCodigoViaje($codigoViaje) {
        while($codigoViaje == "") {
            echo "Error: ingrese un codigo de viaje valido: " ; 
            $codigoViaje = trim(fgets(STDIN)) ;
        }
        return $codigoViaje ; 
    }

    /**
     * Valida si es un destino valido
     * @param string $destino
     * @return string
     */
    function validarDestino($destino) {
        while(!ctype_alpha($destino) || $destino == "") {
            echo "Error: ingrese un destino valido: " ; 
            $destino = trim(fgets(STDIN)) ;
        }
        return $destino ;
    }

    /**
     * Valida si es una cantidad maxima de pasajeros valida
     * @param int $cantMaxPasajeros
     * @return int
     */
    function validarCantMaxPasajeros($cantMaxPasajeros) {
        while($cantMaxPasajeros == "" || !ctype_digit($cantMaxPasajeros)) {
            echo "Error: ingrese una cantidad maxima de pasajeros valida: " ; 
            $cantMaxPasajeros = trim(fgets(STDIN)) ;
        }
        return $cantMaxPasajeros ; 
    }

    // Test
    $cantPasajeros = 0 ; 
    $cantViajes = 0 ;
   
    do {
        $opcion = menu() ; 
        switch($opcion) {
            case 1:  
                if($cantViajes == 1) {
                    echo "Ya hay un viaje cargado" ;
                } else {
                    echo "Ingrese codigo de viaje: " ; 
                    $codigoViaje = trim(fgets(STDIN)) ; 
                    $codigoViaje = validarCodigoViaje($codigoViaje) ; 
                    echo "Ingrese el destino: " ; 
                    $destino = trim(fgets(STDIN)) ;
                    $destino = validarDestino($destino) ;
                    echo "Ingrese cantidad maxima de pasajeros: " ; 
                    $cantMaxPasajeros = trim(fgets(STDIN)) ;
                    $cantMaxPasajeros = validarCantMaxPasajeros($cantMaxPasajeros) ; 
                    echo "Ingrese cantidad de pasajeros " ; 
                    $cantPasajeros = trim(fgets(STDIN)) ; 
                        for($i=0 ; $i<$cantPasajeros ; $i++) {                      
                            echo "Ingrese nombre del pasajero: " ; 
                            $nombrePasaj = trim(fgets(STDIN)) ;  
                            $nombrePasaj = validarNombre($nombrePasaj) ;                              
                            echo "Ingrese apellido del pasajero: " ; 
                            $apellidoPasaj = trim(fgets(STDIN)) ; 
                            $apellidoPasaj = validarApellido($apellidoPasaj) ;                               
                            echo "Ingrese nro de documento: " ; 
                            $nroDocPasaj = trim(fgets(STDIN)) ;
                            $nroDocPasaj = validarDni($nroDocPasaj) ;                              
                            echo "Ingrese nro de telefono: " ; 
                            $nroTelPasaj= trim(fgets(STDIN)) ;
                            $nroTelPasaj = validarNroTelefono($nroTelPasaj) ;                       
                            echo "\n" ; 
                            // objeto Pasajero
                            $pasajero = new Pasajero($nombrePasaj, $apellidoPasaj, $nroDocPasaj, $nroTelPasaj) ;
                            $coleccPasajeros[$i] = $pasajero ; 
                            // print_r($coleccPasajeros) ;                      
                        }

                    // objeto Responsable
                    echo "Ingrese nro de empleado: " ; 
                    $nroEmpleado = trim(fgets(STDIN)) ; 
                    echo "Ingrese nro de licencia " ; 
                    $nroLicencia = trim(fgets(STDIN)) ;
                    echo "Ingrese nombre del responsable: " ; 
                    $nombreEmple = trim(fgets(STDIN)) ; 
                    echo "Ingrese apellido del responsable: " ; 
                    $apellEmple = trim(fgets(STDIN)) ; 
                    $responsableV = new ResponsableV($nroEmpleado, $nroLicencia, $nombreEmple, $apellEmple) ;
                    // objeto Viaje
                    $viajeZulia = new Viaje($codigoViaje, $destino, $cantMaxPasajeros, $coleccPasajeros, $responsableV) ;
                    $cantViajes++ ;
                }
            break ;
            case 2:
                if($cantPasajeros == 0) {
                    echo "No hay datos para modificar \n" ; 
                } else {
                    echo "\n" ; 
                    echo "Que dato desea modificar? " . "\n" ; 
                    echo "Codigo del viaje -> cdv" . "\n" ; 
                    echo "Destino -> destino" . "\n" ; 
                    echo "Cantidad max de pasajeros -> cmp" . "\n" ;
                    echo "Nombre -> nombre" . "\n" ; 
                    echo "Apellido -> apellido" . "\n" ; 
                    echo "Numero de documento -> dni" . "\n" ; 
                    echo "Numero de telefono -> telefono" . "\n" ;
                    echo "Eliminar pasajero -> ep" . "\n" ; 
                    echo "Añadir pasajero -> ap" . "\n" ; 
                    echo  "\n" ; 
                    echo "Ingrese opcion: " ; 
                    $dato = trim(fgets(STDIN)) ; 
                    echo "\n" ; 
                   
                    switch($dato) {
                            case "cdv": 
                                echo "Ingrese nuevo codigo de viaje: " ; 
                                $codigoViaje = trim(fgets(STDIN)) ; 
                                $codigoViaje = validarCodigoViaje($codigoViaje) ; 
                                $viajeZulia -> setCodigoViaje($codigoViaje) ; 
                            break ; 
                            case "destino":
                                echo "Ingrese nuevo destino: " ; 
                                $destino = trim(fgets(STDIN)) ; 
                                $destino = validarDestino($destino) ; 
                                $viajeZulia -> setDestino($destino) ; 
                            break ; 
                            case "cmp": 
                                echo "Ingrese nueva cantidad max de pasajeros: " ; 
                                $cantMaxPasajeros = trim(fgets(STDIN)) ; 
                                $cantMaxPasajeros = validarCantMaxPasajeros($cantMaxPasajeros) ; 
                                $viajeZulia -> setCantMaxPasajeros($cantMaxPasajeros) ; 
                            break ; 
                            case "nombre": 
                                echo "Ingrese nro de documento del pasajero: " ; 
                                $nroDocPasaj = trim(fgets(STDIN)) ; 
                                $nroDocPasaj = validarDni($nroDocPasaj) ; 
                                echo "Ingrese el nuevo nombre: " ;
                                $nombrePasaj = trim(fgets(STDIN)) ; 
                                $nombrePasaj = validarNombre($nombrePasaj) ; 
                                $existe = $viajeZulia -> cambiarNombre($nroDocPasaj, $nombrePasaj) ;
                                    if($existe) {
                                        echo "El nombre fue modificado \n" ; 
                                    } else {
                                        echo "El nombre no pudo ser modificado\n" ;
                                    }
                            break ; 
                            case "apellido":
                                echo "Ingrese dni del pasajero: " ; 
                                $nroDocPasaj = trim(fgets(STDIN)) ; 
                                $nroDocPasaj = validarDni($nroDocPasaj) ; 
                                echo "Ingrese el nuevo apellido: " ;
                                $apellidoPasaj = trim(fgets(STDIN)) ; 
                                $apellidoPasaj = validarApellido($apellidoPasaj) ; 
                                $existe = $viajeZulia -> cambiarApellido($nroDocPasaj, $apellidoPasaj) ;
                                    if($existe) {
                                        echo "El apellido fue modificado \n" ; 
                                    } else {
                                        echo "El apellido no pudo ser modificado\n" ;
                                    }
                            break ; 
                            case "dni": 
                                echo "Ingrese nuevo dni del pasajero: " ; 
                                $nroDocPasaj = trim(fgets(STDIN)) ; 
                                $nroDocPasaj = validarDni($nroDocPasaj) ; 
                                echo "Ingrese nombre del pasajero: " ;
                                $nombrePasaj = trim(fgets(STDIN)) ; 
                                $nombrePasaj = validarNombre($nombrePasaj) ; 
                                echo "Ingrese apellido del pasajero: " ;
                                $apellidoPasaj = trim(fgets(STDIN)) ; 
                                $apellidoPasaj = validarApellido($nroDocPasaj, $apellidoPasaj) ; 
                                $existe = $viajeZulia -> cambiarDni($nroDocPasaj, $nombrePasaj, $apellidoPasaj) ;
                                    // dato: se podria dar razon de pq no fue modificado 
                                    if($existe) {
                                        echo "El dni fue modificado \n" ; 
                                    } else {
                                        echo "El dni no pudo ser modificado\n" ;
                                    }
                            break ; 
                            case "telefono":
                                echo "Ingrese dni del pasajero: " ;
                                $nroDocPasaj = trim(fgets(STDIN)) ; 
                                $nroDocPasaj = validarDni($nroDocPasaj) ;
                                echo "Ingrese nuevo numero: " ; 
                                $nroTelPasaj = trim(fgets(STDIN)) ; 
                                $nroTelPasaj = validarNroTelefono($nroTelPasaj) ; 
                                $existe = $viajeZulia -> cambiarTelefono($nroDocPasaj, $nroTelPasaj) ;
                                    if($existe) {
                                        echo "El nro de telefono fue modificado" ; 
                                    } else {
                                        echo "El nro de telefono no fue modificado" ;         
                                    }                          
                            break ;
                            case "ep":
                                echo "Ingrese dni del pasajero: " ; 
                                $nroDocPasaj = trim(fgets(STDIN)) ; 
                                $nroDocPasaj = validarDni($nroDocPasaj) ;
                                $eliminado = $viajeZulia -> eliminarPasajero($nroDocPasaj) ; 
                                    if($eliminado) {
                                        echo "El pasajero fue eliminado \n" ; 
                                        $cantPasajeros-- ; 
                                        $coleccPasajeros = $viajeZulia -> getColeccPasajeros() ;
                                    } else {
                                        echo "El pasajero no fue eliminado \n" ;
                                    }         
                            break ; 
                            case "ap": 
                                if($cantPasajeros < $cantMaxPasajeros) {
                                    echo "Ingrese nombre del pasajero: " ; 
                                    $nombrePasaj = trim(fgets(STDIN)) ;  
                                    $nombrePasaj = validarNombre($nombrePasaj) ; 
                                    echo "Ingrese apellido del pasajero: " ; 
                                    $apellidoPasaj = trim(fgets(STDIN)) ; 
                                    $apellidoPasaj = validarApellido($apellidoPasaj) ; 
                                    echo "Ingrese nro de documento: " ; 
                                    $nroDocPasaj = trim(fgets(STDIN)) ;
                                    $nroDocPasaj = validarDni($nroDocPasaj) ; 
                                    echo "Ingrese nro de telefono: " ; 
                                    $nroTelPasaj= trim(fgets(STDIN)) ;
                                    $nroTelPasaj = validarNroTelefono($nroTelPasaj) ;

                                    $existePasaj = $viajeZulia -> existePasajero($nombrePasaj, $apellidoPasaj, $nroDocPasaj) ; 
                                        if($existePasaj) {
                                            echo "El pasajero ya esta incluido en el viaje \n" ; 
                                        } else {
                                            $pasajero = new Pasajero($nombrePasaj, $apellidoPasaj, $nroDocPasaj, $nroTelPasaj) ;
                                            $coleccPasajeros = $viajeZulia -> getColeccPasajeros() ;
                                            array_push($coleccPasajeros, $pasajero) ;                            
                                            $viajeZulia -> setColeccPasajeros($coleccPasajeros) ; 
                                            $cantPasajeros++ ;
                                            // print_r($coleccPasajeros) ; 
                                        }
                                } else {
                                    echo "No hay asientos disponibles \n" ; 
                                }                     
                        }
                }
            break ; 
            case 3:              
                if($cantPasajeros == 0) {
                    echo "No hay datos para mostrar \n" ; 
                } else {
                    echo $viajeZulia ;
                }   
            break ; 
        }
    } while($opcion <> 4) ;