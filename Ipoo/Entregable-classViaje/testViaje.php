<?php 

    include "Viaje.php" ; 

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
    $i = 0 ;
    $disponible = false ; 
   
    do {
        $opcion = menu() ; 
        switch($opcion) {
            case 1:     
                echo "Ingrese codigo de viaje: " ; 
                $codigoViaje = trim(fgets(STDIN)) ; 
                $codigoViaje = validarCodigoViaje($codigoViaje) ; 
                echo "Ingrese el destino: " ; 
                $destino = trim(fgets(STDIN)) ;
                $destino = validarDestino($destino) ; 
                echo "Ingrese cantidad maxima de pasajeros: " ; 
                $cantMaxPasajeros = trim(fgets(STDIN)) ;
                $cantMaxPasajeros = validarCantMaxPasajeros($cantMaxPasajeros) ; 
                
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
                $viajeNqn = new Viaje ($codigoViaje, $destino, $cantMaxPasajeros, $pasajeros) ;                    
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
                            break ; 
                            case "nombre": 
                                echo "Ingrese dni del pasajero: " ; 
                                $dni = trim(fgets(STDIN)) ; 
                                $dni = validarDni($dni) ; 
                                echo "Ingrese el nuevo nombre: " ;
                                $nombre = trim(fgets(STDIN)) ; 
                                $nombre = validarNombre($nombre) ; 
                                $existe = $viajeNqn -> cambiarNombre($dni, $nombre) ;
                                    if($existe) {
                                        echo "El nombre fue modificado \n" ; 
                                    } else {
                                        echo "El nombre no pudo ser modificado\n" ;
                                    }
                            break ; 
                            case "apellido":
                                echo "Ingrese dni del pasajero: " ; 
                                $dni = trim(fgets(STDIN)) ; 
                                $dni = validarDni($dni) ; 
                                echo "Ingrese el nuevo apellido: " ;
                                $apellido = trim(fgets(STDIN)) ; 
                                $apellido = validarApellido($dni, $apellido) ; 
                                $existe = $viajeNqn -> cambiarNombre($dni, $apellido) ;
                                    if($existe) {
                                        echo "El apellido fue modificado \n" ; 
                                    } else {
                                        echo "El apellido no pudo ser modificado\n" ;
                                    }
                            break ; 
                            case "dni": 
                                echo "Ingrese nuevo dni del pasajero: " ; 
                                $dni = trim(fgets(STDIN)) ; 
                                $dni = validarDni($dni) ; 
                                echo "Ingrese nombre del pasajero: " ;
                                $nombre = trim(fgets(STDIN)) ; 
                                $nombre = validarNombre($nombre) ; 
                                echo "Ingrese apellido del pasajero: " ;
                                $apellido = trim(fgets(STDIN)) ; 
                                $apellido = validarApellido($dni, $apellido) ; 
                                $existe = $viajeNqn -> cambiarNombre($dni, $nombre, $apellido) ;
                                    // se podria decir pq no fue modificado 
                                    if($existe) {
                                        echo "El dni fue modificado \n" ; 
                                    } else {
                                        echo "El dni no pudo ser modificado\n" ;    
                                    }
                            break ; 
                            case "ep":
                                echo "Ingrese dni del pasajero: " ; 
                                $dni = trim(fgets(STDIN)) ; 
                                $dni = validarDni($dni) ;
                                $eliminado = $viajeNqn -> eliminarPasajero($dni) ; 
                                    if($eliminado) {
                                        echo "El pasajero fue eliminado \n" ; 
                                        $cantPasajeros-- ; 
                                        // $pasajeros = $viajeNqn -> getPasajeros() ;
                                    } else {
                                        echo "El pasajero no fue eliminado \n" ;
                                    }         
                            break ; 
                            case "ap": 
                                if($cantPasajeros < $cantMaxPasajeros) {
                                    echo "Ingrese nombre del pasajero: " ; 
                                    $nombre = trim(fgets(STDIN)) ;  
                                    $nombre = validarNombre($nombre) ; 
                                    echo "Ingrese apellido del pasajero: " ; 
                                    $apellido = trim(fgets(STDIN)) ; 
                                    $apellido = validarApellido($apellido) ; 
                                    echo "Ingrese nro de documento: " ; 
                                    $dni = trim(fgets(STDIN)) ;
                                    $dni = validarDni($dni) ; 
                                    $agregado = $viajeNqn -> agregaPasajero($nombre, $apellido, $dni, $cantPasajeros, $cantMaxPasajeros) ; 
                                        if($agregado) {
                                            echo "El pasajero fue agregado al viaje \n" ; 
                                            $cantPasajeros++ ; 
                                            // print_r($pasajeros) ;
                                            // $pasajeros = $viajeNqn -> getPasajeros() ;
                                        } else {
                                            echo "El pasajero no fue agregado al viaje \n" ;
                                        }
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