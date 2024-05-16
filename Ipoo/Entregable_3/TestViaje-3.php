<?php 

    include_once "Viaje-3.php" ;
    include_once "Pasajero-3.php" ; 
    include_once "PasajeroEstandar.php" ;
    include_once "PasajeroVIP.php" ; 
    include_once "PasajeroEspecial.php" ;
    include_once "Responsable.php" ;

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
        echo "3. Vender Pasaje" . "\n" ; 
        echo "4. Ver informacion del viaje" . "\n" ; 
        echo "5. Salir" . "\n" ; 
        echo "Ingrese opcion: " ; 
        $opcion = trim(fgets(STDIN)) ;
        echo "\n" ;
            while($opcion < 1 || $opcion > 5) {
                echo "Ingrese una opcion correcta" . "\n" ; 
                echo "\n" ;  
                echo "1. Cargar informacion del viaje" . "\n" ;
                echo "2. Modificar informacion del viaje" . "\n" ; 
                echo "3. Vender Pasaje" . "\n" ; 
                echo "4. Ver informacion del viaje" . "\n" ; 
                echo "5. Salir" . "\n" ;
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

    /**
     * Retorna el booleano correspondiente para el objeto
     * @param string $sillaRuedas
     * @return boolean
     */
    function EnviarRespuestaSillaDeRuedas($sillaRuedas) {
        if($sillaRuedas == "si") {
            $sillaRuedas = true ;
        } else {
            $sillaRuedas = false ;
        }
        return $sillaRuedas ;
    }

    /**
     * Retorna el booleano correspondiente para el objeto
     * @param string $asistencia
     * @return boolean
     */
    function EnviarRespuestaAsistencia($asistencia) {
        if($asistencia == "si") {
            $asistencia = true ;
        } else {
            $asistencia = false ;
        }
        return $asistencia ;
    }
    
    /**
     * Retorna el booleano correspondiente para el objeto
     * @param string $comida
     * @return boolean
     */
    function EnviarRespuestaComida($comida) {
        if($comida == "si") {
            $comida = true ;
        } else {
            $comida = false ;
        }
        return $comida ;
    }

    /**
     * Retorna el booleano correspondiente para el objeto
     * @param string $comida
     * @return boolean
     */
    function crearPasajero($comida) {
        if($comida == "si") {
            $comida = true ;
        } else {
            $comida = false ;
        }
        return $comida ;
    }

/*
    $pasajero1 = new PasajeroEstandar("Cesar", "Valderrama", 95947908, 1137977246, 1, 101) ; 
    $pasajero2 = new PasajeroVIP("Isagi", "Yoichi", 5678, 9876, 2, 102, 0202, 1500) ; 
    $pasajero3 = new PasajeroEspecial("David", "Londo", 29568839, 580412, 3, 103, false, true, false) ;
    $coleccPasajeros = [$pasajero1, $pasajero2, $pasajero3] ;
    $pasajero6 = new PasajeroEspecial("abc", "zz", 1111, 299, 6, 106, true, false, true) ;
    $pasajero7 = new PasajeroEspecial("Garp", "D", 1212, 299, 7, 107, false, true, false) ;
    $pasajero8 = new PasajeroEspecial("Saiki", "k", 99, 299, 8, 108, false, true, true) ;
    $pasajero9 = new PasajeroEspecial("Lelouch", "BriT", 666, 299, 9, 109, false, false, true) ; 
    $responsable = new Responsable(1298, 5386453, "El vergas", "sisas") ;


    $pasajero4 = new PasajeroEspecial("Luffy", "D", 100000, 4656547, 4, 104, true, true, true) ;
    $viajeZulia = new Viaje(12345, "Zulia", 5, $coleccPasajeros, $responsable, 5000, 0) ;

 
    echo "Ingrese precio del ticket: " ; 
    $precioTicket = trim(fgets(STDIN)) ;


     $importe = $viajeZulia -> venderPasaje($pasajero4) ;
        if($importe == -1) {
            echo "No hay asientos disponibles \n" ;
        } else {
            echo "El importe total a pagar es de: " . $importe . "\n" . 
            "Datos del pasajero de la venta: " . $pasajero4 . "\n" ;    
        }

    $pasajero5 = new PasajeroEspecial("Aqua", "Oshino", 6234546, 7823466, 5, 105, false, true, false) ;
    $importe = $viajeZulia -> venderPasaje($pasajero5) ;
        if($importe == -1) {
            echo "No hay asientos dispponibles \n" ;
        } else {
            echo "El importe total a pagar es de: " . $importe . "\n" . 
            "Datos del pasajero de la venta: " . $pasajero5 . "\n" ;    
        }

   $pasajero6 = new PasajeroEspecial("abc", "zz", 1111, 299, 6, 106, true, false, true) ;
    $importe = $viajeZulia -> venderPasaje($pasajero6) ;
        if($importe == -1) {
            echo "No hay asientos dispponibles \n" ;
        } else {
            echo "El importe total a pagar es de: " . $importe . "\n" . 
            "Datos del pasajero de la venta: " . $pasajero6 . "\n" ;    
        }
*/


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
                            echo "Ingrese el tipo de pasajero: " ; 
                            $tipoPasajero = trim(fgets(STDIN)) ; 
                            echo "Ingrese nro de ticket: " ;
                            $nroTicket = trim(fgets(STDIN)) ;
                            $nroAsiento = 1 ; 
                                if($tipoPasajero == 'estandar') {
                                    $pasajero = new PasajeroEstandar($nombrePasaj, $apellidoPasaj, $nroDocPasaj , $nroTelPasaj ,$nroAsiento, $nroTicket) ;
                                } elseif($tipoPasajero == 'vip') {
                                    echo "Ingrese nro de viajero: " ; 
                                    $nroViajero = trim(fgets(STDIN)) ;
                                    echo "Ingrese cantidad de millas: " ; 
                                    $cantMillas = trim(fgets(STDIN)) ;
                                    $pasajero = new PasajeroVIP($nombrePasaj, $apellidoPasaj, $nroDocPasaj, $nroTelPasaj, $nroAsiento, $nroTicket, $nroViajero, $cantMillas) ;
                                } else {
                                    echo "Usa silla de ruedas?" ; 
                                    $sillaRuedas = trim(fgets(STDIN)) ;
                                    echo "Necesita ayuda para embarcar o desembarcar?" ; 
                                    $asistencia = trim(fgets(STDIN)) ;
                                    echo "Alergico algun alimento?" ;
                                    $comida = trim(fgets(STDIN)) ;
                                    $pasajero = new PasajeroEspecial($nombrePasaj, $apellidoPasaj, $nroDocPasaj, $nroTelPasaj, $nroAsiento, $nroTicket, $sillaRuedas, $asistencia, $comida) ;
                                }
                            $nroAsiento++ ;
                            echo "\n" ; 
                            $coleccPasajeros[$i] = $pasajero ;                       
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
                    $responsable = new Responsable($nroEmpleado, $nroLicencia, $nombreEmple, $apellEmple) ;
                    // objeto Viaje
                    $viajeZulia = new Viaje(12345, "Zulia", $cantMaxPasajeros, $coleccPasajeros, $responsable, 5000, 0) ;
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
                                            $coleccPasajeros[] = $pasajero ;                     
                                            $viajeZulia -> setColeccPasajeros($coleccPasajeros) ; 
                                            $cantPasajeros++ ; 
                                        }
                                } else {
                                    echo "No hay asientos disponibles \n" ; 
                                }    
                        }
                }
            break ; 
            case 3: 
                if($cantViajes <> 0) {
                    $cantMaxPasajeros = $viajeZulia -> getCantMaxPasajeros() ;
                    $coleccPasajeros = $viajeZulia -> getColeccPasajeros() ;
                    $cantPasajeros = count($coleccPasajeros) ;
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
                        echo "Ingrese el tipo de pasajero: " ; 
                        $tipoPasajero = trim(fgets(STDIN)) ;     
                            if($tipoPasajero == 'estandar') {
                                $pasajero = new PasajeroEstandar($nombrePasaj, $apellidoPasaj, $nroDocPasaj , $nroTelPasaj ,$nroAsiento, $nroTicket) ;
                            } elseif($tipoPasajero == 'vip') {
                                echo "Ingrese nro de viajero: " ; 
                                $nroViajero = trim(fgets(STDIN)) ;
                                echo "Ingrese cantidad de millas: " ; 
                                $cantMillas = trim(fgets(STDIN)) ;
                                $pasajero = new PasajeroVIP($nombrePasaj, $apellidoPasaj, $nroDocPasaj, $nroTelPasaj, $nroAsiento, $nroTicket, $nroViajero, $cantMillas) ;
                            } else {
                                echo "Usa silla de ruedas? " ; 
                                $sillaRuedas = trim(fgets(STDIN)) ;
                                $sillaRuedas = EnviarRespuestaSillaDeRuedas($sillaRuedas) ;
                                echo "Necesita ayuda para embarcar o desembarcar? " ; 
                                $asistencia = trim(fgets(STDIN)) ;
                                $asistencia = EnviarRespuestaAsistencia($asistencia) ;
                                echo "Alergico algun alimento? " ;
                                $comida = trim(fgets(STDIN)) ;
                                $comida = EnviarRespuestaComida($comida) ;
                                $pasajero = new PasajeroEspecial($nombrePasaj, $apellidoPasaj, $nroDocPasaj, $nroTelPasaj, $nroAsiento, $nroTicket, $sillaRuedas, $asistencia, $comida) ;
                            }
                            $importe = $viajeZulia -> venderPasaje($pasajero) ;
                            if($importe == -1) {
                                echo "No hay asientos dispponibles \n" ;
                            } else {
                                echo "El importe total a pagar es de: " . $importe . "\n" . 
                                "Datos del pasajero de la venta: " . $pasajero . "\n" ;    
                            }
                        $cantPasajeros++ ;
                    } else {
                        echo "No hay asientos disponibles" ;
                    }
                } else {
                    echo "No hay viajes cargados \n" ;
                }
            break ; 
            case 4:              
                if($cantPasajeros == 0) {
                    echo "No hay datos para mostrar \n" ; 
                } else {
                    echo $viajeZulia ;
                }   
            break ; 
        }
    } while($opcion <> 5) ;