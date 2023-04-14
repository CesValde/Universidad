<?php 

    include "Viaje.php" ; 

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

    /**
     * Pide los datos para agregar pasajeros si se cumplen las condiciones
     * @param string $respuesta
     * @param boolean $disponible
     * @param int $cantPasajeros
     * @param int $cantMaxPasajeros
     * @param int $i 
     * @return $array
     */
    function agregaPasajero($respuesta, $disponible, $cantPasajeros, $cantMaxPasajeros, $i) {

        if($cantPasajeros < $cantMaxPasajeros) {
            $disponible = true ; 
        } elseif($cantPasajeros == $cantMaxPasajeros) {
            echo "Ya no hay asientos disponibles" . "\n" ;
            echo "\n" ; 
            $disponible = false ; 
        }
        while($respuesta == "si" && $disponible == true) {
            while($cantPasajeros < $cantMaxPasajeros) {
                echo "Ingrese nombre del pasajero: " ; 
                $nombre = trim(fgets(STDIN)) ;  
                $nombre = validarNombre($nombre) ; 
                $pasajeros[$i]['nombre'] = $nombre ;
                echo "Ingrese apellido del pasajero: " ; 
                $apellido = trim(fgets(STDIN)) ; 
                $apellido = validarApellido($apellido) ; 
                $pasajeros[$i]['apellido'] = $apellido ;
                echo "Ingrese nro de documento: " ; 
                $dni = trim(fgets(STDIN)) ;
                $dni = validarDni($dni) ; 
                $pasajeros[$i]['nroDoc'] = $dni ;
                $cantPasajeros++ ; 
                $i++ ; 
            }   
        }
        return $pasajeros ; 
    }

    $cantPasajeros = 0 ;
    $i = 0 ;
    $disponible = false ; 
   
    do {
        $opcion = menu() ; 
        switch($opcion) {
            case 1:     
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
                    while($cantPasajeros < 2) {
                        echo "Ingrese nombre del pasajero: " ; 
                        $nombre = trim(fgets(STDIN)) ;  
                        $nombre = validarNombre($nombre) ; 
                        $pasajeros[$i]['nombre'] = $nombre ;
                        echo "Ingrese apellido del pasajero: " ; 
                        $apellido = trim(fgets(STDIN)) ; 
                        $apellido = validarApellido($apellido) ; 
                        $pasajeros[$i]['apellido'] = $apellido ;
                        echo "Ingrese nro de documento: " ; 
                        $dni = trim(fgets(STDIN)) ;
                        $dni = validarDni($dni) ; 
                        $pasajeros[$i]['nroDoc'] = $dni ;
                        $cantPasajeros++ ; 
                        $i++ ; 
                    } 
                $viajeNqn = new Viaje (123, "nqn", 2, $pasajeros) ;                    
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

                    // innecesario 
                    $dato = str_replace('', '', $dato) ;        // 1ra '' lo que quieres modificar, 2da '' lo que vas a poner en su lugar, 3ro la variable a retornar.
                    $dato = strtolower($dato) ;         // todo minusculas
                        switch($dato) {
                            case "cdv": 
                                echo "Ingrese nuevo codigo de viaje: " ; 
                                $codigoViaje = trim(fgets(STDIN)) ; 
                                $codigoViaje = validarCodigoViaje($codigoViaje) ; 
                                $viajeNqn -> setCodigoViaje($codigoViaje) ; 
                            break ; 
                            case "destino":
                                echo "Ingrese nuevo destino: " ; 
                                $destino = trim(fgets(STDIN)) ; 
                                $destino = validarDestino($destino) ; 
                                $viajeNqn -> setDestino($destino) ; 
                            break ; 
                            case "cmp": 
                                echo "Ingrese nueva cantidad max de pasajeros: " ; 
                                $cantMaxPasajeros = trim(fgets(STDIN)) ; 
                                $cantMaxPasajeros = validarCantMaxPasajeros($cantMaxPasajeros) ; 
                                $viajeNqn -> setCantMaxPasajeros($cantMaxPasajeros) ; 
                                echo "Desea agregar nuevos pasajeros? " ; 
                                $respuesta = trim(fgets(STDIN)) ; 
                                    while(!ctype_alpha($respuesta) || $respuesta == "") {
                                        echo "Error: ingrese una respuesta valida" ; 
                                        $respuesta = trim(fgets(STDIN)) ; 
                                    }
                                $pasajeros = agregaPasajero($respuesta, $disponible, $cantPasajeros, $cantMaxPasajeros, $i) ; 
                                $viajeNqn -> setPasajeros($pasajeros) ; 
                            break ; 
                            case "nombre": 
                                echo "Ingrese dni del pasajero: " ; 
                                $dni = trim(fgets(STDIN)) ; 
                                $dni = validarDni($dni) ; 
                                $existe = false ; 
                                $j = 0 ;
                                    while($j<count($pasajeros)) {
                                        if($dni == $pasajeros[$j]['nroDoc']) {
                                            echo "Ingrese nuevo nombre: " ; 
                                            $nombre = trim(fgets(STDIN)) ; 
                                            $nombre = validarNombre($nombre) ; 
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
                                $dni = validarDni($dni) ; 
                                $existe = false ; 
                                $j = 0 ; 
                                    while($j<count($pasajeros)) {
                                        if($dni == $pasajeros[$j]['nroDoc']) {
                                            echo "Ingrese nuevo apellido: " ; 
                                            $apellido = trim(fgets(STDIN)) ; 
                                            $apellido = validarApellido($apellido) ; 
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
                                $dni = validarDni($dni) ; 
                                $existe = false ; 
                                $j = 0 ; 
                                    while($j<count($pasajeros)) {
                                        if($dni == $pasajeros[$j]['nroDoc']) {
                                            echo "Ingrese nuevo dni: " ; 
                                            $dni = trim(fgets(STDIN)) ; 
                                            $dni = validarDni($dni) ;
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
                                $dni = validarDni($dni) ;
                                $k = 0 ; 
                                $pasajeros = $viajeNqn -> getPasajeros() ; 
                                while($k<count($pasajeros)) {
                                    if($dni == $pasajeros[$k]['nroDoc']) {
                                        /* unset -> elimina el pasajero en la posicion k si coinciden los dni tener en cuenta lo de la clase si el dni estuvo mal 
                                            desde un principio pedir otros datos para validar que sea la persona correcta */                  
                                        array_splice($pasajeros, $k, 1) ;                                                                           
                                        $cantPasajeros-- ; 
                                    }
                                    $k++ ; 
                                }
                                $viajeNqn -> setPasajeros($pasajeros) ;                 
                            break ; 
                            case "ap": 
                                $pasajeros = $viajeNqn -> getPasajeros() ;
                                if($cantPasajeros < 2) {
                                    echo "Ingrese nombre del pasajero: " ; 
                                    $nombre = trim(fgets(STDIN)) ;  
                                    $nombre = validarNombre($nombre) ; 
                                    $pasajeroNuevo['nombre'] = $nombre ;
                                    echo "Ingrese apellido del pasajero: " ; 
                                    $apellido = trim(fgets(STDIN)) ; 
                                    $apellido = validarApellido($apellido) ; 
                                    $pasajeroNuevo['apellido'] = $apellido ;
                                    echo "Ingrese nro de documento: " ; 
                                    $dni = trim(fgets(STDIN)) ;
                                    $dni = validarDni($dni) ; 
                                    $pasajeroNuevo['nroDoc'] = $dni ;
                                    $cantPasajeros++ ; 
                                    $i++ ;
                                    $pasajeroNuevo = [
                                        "nombre" => $nombre , 
                                        "apellido" => $apellido , 
                                        "nroDoc" => $dni 
                                    ] ; 
                                    array_push($pasajeros, $pasajeroNuevo) ; 
                                    $viajeNqn -> setPasajeros($pasajeros) ; 
                                } else {
                                    echo "No hay asientos disponibles" . "\n" ; 
                                    echo "\n" ; 
                                }
                        }
                }
            break ; 
            case 3: 
                if($cantPasajeros == 0) {
                    echo "No hay datos para mostrar \n" ; 
                } else {
                    echo $viajeNqn ;
                }   
            break ;
        } 
    }  while($opcion != 4) ; 