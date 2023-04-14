<?php 

    include_once "Pasajero.php" ; 
    include_once "Viaje2.php" ; 
    include_once "ResponsableV.php" ;

    /**
     * Despliega el menu de opciones
     * @return string
     */
    function menu() {
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



   
    do {
        $opcion = menu() ; 
        switch($opcion) {
            case 1:  
                echo "Ingrese cantidad de pasajeros " ; 
                $cantPasajeros = trim(fgets(STDIN)) ; 
                    for($i=0 ; $i<$cantPasajeros ; $i++) {                      
                        echo "Ingrese nombre del pasajero: " ; 
                        $nombrePasaj = trim(fgets(STDIN)) ;  
                        $nombrePasaj = validarNombre($nombrePasaj) ; 
                        // $coleccPasajeros[$i]['nombre'] = $nombre ;
                        echo "Ingrese apellido del pasajero: " ; 
                        $apellidoPasaj = trim(fgets(STDIN)) ; 
                        $apellidoPasaj = validarApellido($apellidoPasaj) ; 
                        // $coleccPasajeros[$i]['apellido'] = $apellido ;
                        echo "Ingrese nro de documento: " ; 
                        $nroDocPasaj = trim(fgets(STDIN)) ;
                        $nroDocPasaj = validarDni($nroDocPasaj) ; 
                        // $coleccPasajeros[$i]['nroDoc'] = $nroDocPasasjero ;
                        echo "Ingrese nro de telefono: " ; 
                        $nroTelPasaj= trim(fgets(STDIN)) ;
                        // $nroTelPasaj = validarNroTelefono($nroTelPasaj) ;                       
                        echo "\n" ; 
                        $pasajero = new Pasajero($nombrePasaj, $apellidoPasaj, $nroDocPasaj, $nroTelPasaj) ;
                        $coleccPasajeros[$i] = $pasajero ; 
                        print_r($coleccPasajeros) ;                      
                    }
                    // objeto responsable
                    /*
                    echo "Ingrese nro de empleado: " ; 
                    $nroEmpleado = trim(fgets(STDIN)) ; 
                    echo "Ingrese nro de licencia " ; 
                    $nroLicencia = trim(fgets(STDIN)) ;
                    echo "Ingrese nombre del responsable: " ; 
                    $nombreEmple = trim(fgets(STDIN)) ; 
                    echo "Ingrese apellido del responsable: " ; 
                    $apellEmple = trim(fgets(STDIN)) ; 
                    */
                    $responsableV = new ResponsableV(202, 999, "Jesus", "Valde") ;

                    // objeto Viaje
                    /*
                        echo "Ingrese codigo de viaje: " ; 
                        $codigoViaje = trim(fgets(STDIN)) ; 
                        $codigoViaje = validarCodigoViaje($codigoViaje)
                        echo "Ingrese el destino: " ; 
                        $destino = trim(fgets(STDIN)) ;
                        $destino = validarDestino($destino)
                        echo "Ingrese cantidad maxima de pasajeros: " ; 
                        $cantMaxPasajeros = trim(fgets(STDIN)) ;
                        $cantMaxPasajeros = validarCantMaxPasajeros($cantMaxPasajeros) ; 
                    */
                    $viajeZulia = new Viaje(1234, "Zulia", 2, $coleccPasajeros, $responsableV) ;
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
                    echo "Eliminar pasajero -> ep" . "\n" ; 
                    echo "Añadir pasajero -> ap" . "\n" ; 
                    echo  "\n" ; 
                    echo "Ingrese opcion: " ; 
                    $dato = trim(fgets(STDIN)) ; 
                    echo "\n" ; 
                }
            break ; 
            case 3:              
                // echo $viajeZulia ; 
                echo $responsable ;
            break ; 
        }
    } while($opcion <> 4) ;