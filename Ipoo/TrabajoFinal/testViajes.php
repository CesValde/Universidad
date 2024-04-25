<?php

use LDAP\Result;

    include_once "Empresa.php" ;
    include_once "Pasajero.php" ; 
    include_once "Responsable.php" ; 
    include_once "Viaje.php" ; 
    include_once "BaseDatos.php" ; 
    include_once "bdviajes.sql" ;  


    /**
     * Método que convierte arrays u objetos en cadenas de texto
     */
    function arrayString($array){
        $str = "" ;
        foreach($array as $key => $value ){
            $obj = $value ;
            $strObj = $obj -> __toString();
            $str.= "
            $strObj
            --------------------\n";
        }
        return $str ;
    }

    /**
     * Despliega el menu de opciones
     * @return string
     */
    function menu() {
        // string $opcion

        echo "\n" ; 
        echo "Ingrese una opcion: " . "\n" ; 
        echo "1. Empresas" . "\n" ;
        echo "2. Responsables" . "\n" ;
        echo "3. Viajes" . "\n" ;
        echo "4. Pasajeros" . "\n" ;
        echo "5. Salir" . "\n" ;
        echo "Ingrese opcion: " ; 
        $opcion = trim(fgets(STDIN)) ;
        echo "\n" ;
            while($opcion < 1 || $opcion > 5) {
                echo "Ingrese una opcion correcta" . "\n" ; 
                echo "\n" ;  
                echo "1. Empresas" . "\n" ;
                echo "2. Responsables" . "\n" ;
                echo "3. Viajes" . "\n" ;
                echo "4. Pasajeros" . "\n" ;
                echo "5. Salir" . "\n" ;
                echo "Ingrese opcion: " ; 
                $opcion = trim(fgets(STDIN)) ;
                echo "\n" ; 
            }
        return $opcion ;
    }

    /**
     * Despliega el submenu de opciones
     * @return string
     */
    function menuEmpresa() {
        // string $opcion

        echo "\n" ; 
        echo "Ingrese una opcion: " . "\n" ; 
        echo "1. Crear empresa" . "\n" ;
        echo "2. Modificar empresa" . "\n" ;
        echo "3. Eliminar empresa" . "\n" ;
        echo "4. Ver empresas" . "\n" ;
        echo "5. Salir" . "\n" ;
        echo "Ingrese opcion: " ; 
        $opcion = trim(fgets(STDIN)) ;
        echo "\n" ;
            while($opcion < 1 || $opcion > 5) {
                echo "Ingrese una opcion correcta" . "\n" ; 
                echo "\n" ;  
                echo "Ingrese una opcion: " . "\n" ; 
                echo "1. Crear empresa" . "\n" ;
                echo "2. Modificar empresa" . "\n" ;
                echo "3. Eliminar empresa" . "\n" ;
                echo "4. Ver empresas" . "\n" ;
                echo "5. Salir" . "\n" ;
                echo "Ingrese opcion: " ; 
                $opcion = trim(fgets(STDIN)) ;
                echo "\n" ; 
            }
        return $opcion ;
    }

    /**
     * Despliega el submenu de opciones
     * @return string
     */
    function menuResponsable() {
        // string $opcion

        echo "\n" ; 
        echo "Ingrese una opcion: " . "\n" ; 
        echo "1. Crear responsable" . "\n" ;
        echo "2. Modificar responsable" . "\n" ;
        echo "3. Eliminar responsable" . "\n" ;
        echo "4. Ver responsables" . "\n" ;
        echo "5. Salir" . "\n" ;
        echo "Ingrese opcion: " ; 
        $opcion = trim(fgets(STDIN)) ;
        echo "\n" ;
            while($opcion < 1 || $opcion > 5) {
                echo "Ingrese una opcion correcta" . "\n" ; 
                echo "\n" ;  
                echo "1. Crear responsable" . "\n" ;
                echo "2. Modificar responsable" . "\n" ;
                echo "3. Eliminar responsable" . "\n" ;
                echo "4. Ver responsables" . "\n" ;
                echo "5. Salir" . "\n" ;
                echo "Ingrese opcion: " ; 
                $opcion = trim(fgets(STDIN)) ;
                echo "\n" ; 
            }
        return $opcion ;
    }

    /**
     * Despliega el submenu de opciones
     * @return string
     */
    function menuViaje() {
        // string $opcion

        echo "\n" ; 
        echo "Ingrese una opcion: " . "\n" ; 
        echo "1. Crear viaje" . "\n" ;
        echo "2. Modificar viaje" . "\n" ;
        echo "3. Eliminar viaje" . "\n" ;
        echo "4. Ver viajes" . "\n" ;
        echo "5. Salir" . "\n" ;
        echo "Ingrese opcion: " ; 
        $opcion = trim(fgets(STDIN)) ;
        echo "\n" ;
            while($opcion < 1 || $opcion > 5) {
                echo "Ingrese una opcion correcta" . "\n" ; 
                echo "\n" ;  
                echo "1. Crear viaje" . "\n" ;
                echo "2. Modificar viaje" . "\n" ;
                echo "3. Eliminar viaje" . "\n" ;
                echo "4. Ver viajes" . "\n" ;
                echo "5. Salir" . "\n" ;
                echo "Ingrese opcion: " ; 
                $opcion = trim(fgets(STDIN)) ;
                echo "\n" ; 
            }
        return $opcion ;
    }

    /**
     * Despliega el submenu de opciones
     * @return string
     */
    function menuPasajero() {
        // string $opcion

        echo "\n" ; 
        echo "Ingrese una opcion: " . "\n" ; 
        echo "1. Crear pasajero" . "\n" ;
        echo "2. Modificar pasajero" . "\n" ;
        echo "3. Eliminar pasajero" . "\n" ;
        echo "4. Ver pasajeros" . "\n" ;
        echo "5. Salir" . "\n" ;
        echo "Ingrese opcion: " ; 
        $opcion = trim(fgets(STDIN)) ;
        echo "\n" ;
            while($opcion < 1 || $opcion > 5) {
                echo "Ingrese una opcion correcta" . "\n" ; 
                echo "\n" ;  
                echo "1. Crear pasajero" . "\n" ;
                echo "2. Modificar pasajero" . "\n" ;
                echo "3. Eliminar pasajero" . "\n" ;
                echo "4. Ver pasajeros" . "\n" ;
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

    /* operación que permita ingresar, modificar y eliminar la información de la empresa de viajes. */
    $coleccPasajeros = [] ; 

    
    $baseDatos = new BaseDatos() ; 
    $conexion = $baseDatos -> iniciar() ; 

    /* $empresa = new Empresa() ; 
    $empresa -> cargar(1, "FlechaBus", "Terminal Cipolletti") ; 
    $empresa -> insertar() ; 

    $responsable = new Responsable() ; 
    $responsable -> cargar(1, 0101, "Jesus", "Valderrama") ; 
    $responsable -> insertar() ; 

    $viaje = new Viaje() ;
    $viaje -> cargar(2023, "Bariloche", 5, 1, $coleccPasajeros, $responsable, 5000, 0) ; 
    $viaje -> insertar() ; 

    $pasajero = new Pasajero() ; 
    $pasajero -> cargar("Cesar", "Valderrama", 95947908, 1137977246, $viaje) ; 
    $pasajero -> insertar() ; 
    $pasajero -> cargar("Maria", "Valderrama", 96843783, 299342763, $viaje) ; 
    $pasajero -> insertar() ;  */
    


    /* operación que permita ingresar, modificar y eliminar la información de un viaje, teniendo en cuenta las 
        particularidades expuestas en el dominio a lo largo del cuatrimestre */


    /* Inicializo variables */
    $cantEmpresas = 0 ; 
    $cantResponsables = 0 ; 
    $cantViajes = 0 ; 
    $cantPasajeros = 0 ;


    /* AUTO_INCREMENT */ // se tiene que ir incrementando 
    $idEmpresa = 1 ;
    $rNroEmpleado = 1 ;
    $codigoViaje = 1 ;  


    do {
        /* Despliega el menu principal */
        $opcion = menu() ; 
        switch($opcion) {
            case 1:  
                /* Despliega el menu para la seccion de empresas */
                $opcionEmpresa = menuEmpresa() ; 
                while($opcionEmpresa <> 5) {
                    switch($opcionEmpresa) {
                        case 1: 
                            /* Crear una empresa */
                                         
                            echo "Ingrese nombre de la empresa: " ; 
                            $enombre = trim(fgets(STDIN)) ; 
                            echo "Ingrese direccion de la empresa: " ; 
                            $eDireccion = trim(fgets(STDIN)) ; 

                            $empresa = new Empresa() ;
                            $empresa -> cargar($idEmpresa, $enombre, $eDireccion) ; 
                            $empresa -> insertar() ; 
                            $cantEmpresas++ ; 
                            $idEmpresa++ ; 

                            /* verificar que no exista la empresa */



                        break ; 
                        case 2: 
                            /* Modificar una empresa */

                            echo "Ingrese el id de la empresa a modificar: " ; 
                            $idEmpresa = trim(fgets(STDIN)) ; 
                            $empresa = new Empresa() ;
                            $encontro = $empresa -> Buscar($idEmpresa) ;
                                if($encontro) {
                                    echo "Ingrese nuevo nombre de la empresa: " ; 
                                    $eNombre = trim(fgets(STDIN)) ; 
                                    echo "Ingrese nueva direccion de la empresa: " ; 
                                    $eDireccion = trim(fgets(STDIN)) ;
                                    $empresa -> cargar($idEmpresa, $eNombre, $eDireccion) ; 
                                    $modifico = $empresa -> modificar() ; 
                                        if($modifico) {
                                            echo "La empresa fue modificada \n" ; 
                                        } else {
                                            echo "Error! La empresa no fue modificada \n" ;
                                        }
                                } else {
                                    echo "La empresa no fue encontrada \n" ; 
                                }
                        break ; 
                        case 3:
                            /* Eliminar una empresa */
                            /* Si elimina una empresa se eliminan los viajes que almacena dicha empresa SI */

                            echo "Ingrese el id de la empresa a eliminar: " ; 
                            $idEmpresa = trim(fgets(STDIN)) ; 

                            $empresa = new Empresa() ;
                            $encontro = $empresa -> Buscar($idEmpresa) ;
                                if($encontro) {
                                    $borrado = $empresa -> eliminar() ;
                                        if($borrado) {
                                            echo "La empresa fue eliminada \n" ; 
                                            $cantEmpresas-- ; 
                                        } else {
                                            echo "Error! La empresa no fue eliminada \n" ;
                                        }
                                } else {
                                    echo "La empresa no fue encontrada \n" ; 
                                }
                        break ;
                        case 4: 
                            /* ver las empresas */
                            
                            $empresa = new Empresa() ;
                            $coleccEmpresas = $empresa -> listar() ;
                            if(count($coleccEmpresas) > 0 ){
                                echo arrayString($coleccEmpresas) ;
                            } else {
                                echo "No hay empresas para mostrar " ; 
                            }   
                        break ; 
                    }
                    $opcionEmpresa = menuEmpresa() ;
                }
                     
                /* No pasar de aqui modo empresa */
            break ;
            case 2:
                 /* Despliega el menu para la seccion de responsable */
                $opcionResponsable = menuResponsable() ; 
                while($opcionResponsable <> 5) {
                    switch($opcionResponsable) {
                        case 1: 
                            /* Crear reponsable */

                            /* echo "Ingrese numero de empleado: " ; 
                            $rNroEmpleado = trim(fgets(STDIN)) ;  */
                            echo "Ingrese nro de licencia del responsable: " ; 
                            $rNroLicencia = trim(fgets(STDIN)) ;
                            echo "Ingrese nombre del responsable: " ; 
                            $rNombre = trim(fgets(STDIN)) ;
                            echo "Ingrese apellido del responsable: " ;
                            $rApellido = trim(fgets(STDIN)) ;

                            $responsable = new Responsable() ; 
                            $responsable -> cargar($rNroEmpleado, $rNroLicencia, $rNombre, $rApellido) ; 
                            $responsable -> insertar() ;

                            $cantResponsables++ ; 
                            $rNroEmpleado++ ; 
                            // echo $rNroEmpleado ;
                        break ; 
                        case 2: 
                            /* Modificar reponsable */

                            echo "Ingrese el nro de empleado del responsable a modificar: " ; 
                            $rNroEmpleado = trim(fgets(STDIN)) ;
                            $responsable = new Responsable() ;
                            $encontro = $responsable -> Buscar($rNroEmpleado) ; 
                                if($encontro) {
                                    /*  echo "Ingrese nuevo numero de empleado: " ; 
                                    $rNroEmpleado = trim(fgets(STDIN)) ; */ 
                                    echo "Ingrese nuevo nro de licencia del responsable: " ; 
                                    $rNroLicencia = trim(fgets(STDIN)) ;
                                    echo "Ingrese nuevo nombre del responsable: " ; 
                                    $rNombre = trim(fgets(STDIN)) ;
                                    echo "Ingrese nuevo apellido del responsable: " ;
                                    $rApellido = trim(fgets(STDIN)) ;

                                    $responsable -> cargar($rNroEmpleado, $rNroLicencia, $rNombre, $rApellido) ; 
                                    $modifico = $responsable -> modificar() ; 
                                        if($modifico) {
                                            echo "El responsable fue modificado \n" ; 
                                        } else {
                                            echo "Error! el responsable no fue modificado \n" ;
                                        }
                                } else {
                                    echo "El responsable no fue encontrada \n" ; 
                                }
                        break ; 
                        case 3: 
                            /* eliminar reponsable */

                            echo "Ingrese el nro de empleado del responsable a modificar: " ; 
                            $rNroEmpleado = trim(fgets(STDIN)) ;
                            $encontro = $responsable -> Buscar($rNroEmpleado) ; 
                                if($encontro) {
                                    $borrado = $responsable -> eliminar() ; 
                                        if($borrado) {
                                            echo "El responsable fue eliminado \n" ; 
                                            $cantResponsables-- ; 
                                        } else {
                                            echo "Error! el responsable no fue eliminado \n" ;
                                        }
                                }
                        break ; 
                        case 4: 
                            /* ver los responsables */
                            
                            $responsable = new Responsable() ;
                            $coleccResponsables = $responsable -> listar();
                            if(count($coleccResponsables) > 0 ){
                                echo arrayString($coleccResponsables) ;
                            } else {
                                echo "No hay responsables para mostrar " ; 
                            }
                        break ; 
                    }
                    $opcionResponsable = menuResponsable() ;
                }
            break ; 
            case 3: 
                /* Despliega el menu para la seccion de viaje */
                $opcionViaje = menuViaje() ; 
                while($opcionViaje <> 5) {
                    switch($opcionViaje) {
                        case 1: 
                            /* Crear viaje */
                            
                            $coleccPasajeros = [] ;

                            echo "Ingrese el id de la empresa: " ; 
                            $idEmpresa = trim(fgets(STDIN)) ;

                            $encontroEmpresa = false ; 
                            $empresa = new Empresa() ;
                            $k = 0 ;

                            // $coleccEmpresas = $empresa -> getColeccEmpresas() ;
                            $coleccEmpresas = $empresa -> listar() ;

                            print_r($coleccEmpresas) ;
                            while($k < count($coleccEmpresas)) {
                                $empresa = $coleccEmpresas[$k] ; 
                                $encontroEmpresa = $empresa -> buscar($idEmpresa) ;
                                    if($encontroEmpresa) {
                                        echo "La empresa fue encontrada \n" ; 
                                        $k = count($coleccEmpresas) ;
                                    }
                                $k++ ;
                            }

                            echo "Ingrese numero de empleado: " ;
                            $rNroEmpleado = trim(fgets(STDIN)) ;

                            $responsable = new Responsable() ;
                            // $coleccResponsables = $responsable -> getColeccionResponsables() ; 
                            $coleccResponsables = $responsable -> listar() ; 

                            print_r($coleccResponsables) ;
                            $j = 0 ; 
                            $encontroRes = false ;
                            while($j < count($coleccResponsables)) {
                                $responsable = $coleccResponsables[$j] ; 
                                $encontroRes = $responsable -> buscar($rNroEmpleado) ;
                                    if($encontroRes) {
                                        echo "El responsable fue encontrado \n" ; 
                                        $j = count($coleccResponsables) ;
                                        
                                    }
                                $j++ ;
                            }

                            if($encontroEmpresa) {
                                if($encontroRes) {
                                    echo "Ingrese un destino: " ; 
                                    $destino = trim(fgets(STDIN)) ;
                                    echo "Ingrese cantidad maxima de pasajeros: " ; 
                                    $cantMaxPasajeros = trim(fgets(STDIN)) ;
                                    echo "Ingrese precio del ticket: " ; 
                                    $precioTicket = trim(fgets(STDIN)) ;


                                    echo 

                                    $viaje = new Viaje() ; 
                                    $viaje -> cargar($codigoViaje, $destino, $cantMaxPasajeros, $idEmpresa, $coleccPasajeros, $responsable, $precioTicket) ;
                                    $viaje -> insertar() ; 

                                    $cantViajes++ ; 
                                    $codigoViaje++ ;
                                    // echo $codigoViaje ; 

                                } else {
                                    echo "Error! no puede crearse el viaje el responsable no existe \n" ; 
                                }
                            } else {
                                echo "Error! no puede crearse el viaje la empresa no existe  \n" ; 
                            }
                        break ; 
                        case 2: 
                            /* Modificar viaje */

                            echo "Ingrese codigo del viaje a modificar: " ; 
                            $codigoViaje = trim(fgets(STDIN)) ;

                            $viaje = new Viaje() ; 
                            $encontro = $viaje -> Buscar($codigoViaje) ; 
                                if($encontro) {
                                    echo "Ingrese nuevo destino: " ; 
                                    $destino = trim(fgets(STDIN)) ;
                                    echo "Ingrese nueva cantidad maxima de pasajeros: " ; 
                                    $cantMaxPasajeros = trim(fgets(STDIN)) ;
                                    echo "Ingrese nuevo precio de ticket: " ; 
                                    $precioTicket = trim(fgets(STDIN)) ;
                                    echo "Ingrese nuevo id de empresa: " ;
                                    $idEmpresa = trim(fgets(STDIN)) ;
                
                                    echo "Ingrese el nro de empleado del responsable a modificar: " ; 
                                    $rNroEmpleado = trim(fgets(STDIN)) ;
                                    $responsable = new Responsable() ;
                                    $encontro = $responsable -> Buscar($rNroEmpleado) ; 
                                        if($encontro) {
                                            echo "Ingrese nuevo nro de licencia del responsable: " ; 
                                            $rNroLicencia = trim(fgets(STDIN)) ;
                                            echo "Ingrese nuevo nombre del responsable: " ; 
                                            $rNombre = trim(fgets(STDIN)) ;
                                            echo "Ingrese nuevo apellido del responsable: " ;
                                            $rApellido = trim(fgets(STDIN)) ;

                                            $responsable -> cargar($rNroEmpleado, $rNroLicencia, $rNombre, $rApellido) ; 
                                            $modifico = $responsable -> modificar() ; 
                                                if($modifico) {
                                                    echo "El responsable fue modificado \n" ; 
                                                } else {
                                                    echo "Error! el responsable no fue modificado \n" ;
                                                }
                                        } else {
                                            echo "El responsable no fue encontrada \n" ; 
                                        }

                                    $responsable = new Responsable() ;
                                    $responsable -> cargar($rNroEmpleado, $rNroLicencia, $rNombre, $rApellido) ; 

                                    $viaje -> cargar($codigoViaje, $destino, $cantMaxPasajeros, $idEmpresa, $coleccPasajeros, $responsable, $precioTicket) ; 
                                    $modifico = $viaje -> modificar() ; 
                                        if($modifico) {
                                            echo "El viaje fue modificado \n" ; 
                                        } else {
                                            echo "Error! el viaje no fue modificado \n" ;
                                        }
                                }
                        break ; 
                        case 3: 
                            /* Eliminar viaje */

                            echo "Ingrese codigo del viaje a eliminar: " ; 
                            $codigoViaje = trim(fgets(STDIN)) ;

                            $viaje = new Viaje() ; 
                            $encontro = $viaje -> buscar($codigoViaje) ; 
                                if($encontro) {
                                    $borrado = $viaje -> eliminar() ;  
                                        if($borrado) {
                                            echo "El viaje fue eliminado \n" ; 
                                            $cantViajes-- ; 
                                        } else {
                                            echo "Error! el viaje no fue eliminado \n" ;
                                        }
                                }
                        break ;
                        case 4: 
                            /* Ver viajes */

                            $viaje = new Viaje() ;
                            $coleccViajes = $viaje -> listar();
                            if(count($coleccViajes) > 0 ){
                                echo arrayString($coleccViajes) ;
                            } else {
                                echo "No hay viajes para mostrar " ; 
                            }
                        break ; 
                    }
                    $opcionViaje = menuViaje() ;
                }
                    
            break ; 
            case 4:   
                /* Despliega el menu para la seccion de pasajero */
                $opcionPasajero = menuPasajero() ; 
                while($opcionPasajero <> 5) {
                    switch($opcionPasajero) {
                        case 1: 
                            /* Crear pasajero */

                            echo "Ingrese id de viaje: " ; 
                            $codigoViaje = trim(fgets(STDIN)) ;

                            $viaje = new Viaje() ;
                            $viaje = $viaje -> Buscar($codigoViaje) ;

                            $pasajero = new Pasajero() ; 
                            $pasajero -> cargar("Cesar", "Valderrama", 95947908, 1137977246, $viaje) ; 
                            $pasajero -> insertar() ; 
                            $pasajero -> cargar("Maria", "Valderrama", 96843783, 299342763, $viaje) ; 
                            $pasajero -> insertar() ; 
                        

                        case 2: 
                            /* Modificar pasajero */

                            echo "Ingrese nuevo nombre: " ; 
                            $nombrePasaj = trim(fgets(STDIN)) ;
                            echo "Ingrese nuevo apellido: " ; 
                            $apellidoPasaj = trim(fgets(STDIN)) ;
                            echo "Ingrese nro de documento: " ;
                            $nroDocPasaj = trim(fgets(STDIN)) ;
                            echo "Ingrese nro de telefono: " ; 
                            $nroTelPasaj = trim(fgets(STDIN)) ;
                            echo "Ingrese id de viaje: " ; 
                            $codigoViaje = trim(fgets(STDIN)) ;

                            $viaje = new Viaje() ;
                            $viaje = $viaje -> Buscar($codigoViaje) ;
                            $pasajero -> cargar($nombrePasaj, $apellidoPasaj, $nroDocPasaj, $nroTelPasaj, $viaje) ; 
                            $pasajero -> insertar() ; 
                        break ; 
                        case 3: 
                            /* Eliminar pasajero */

                            echo "Ingrese el nro de documento del pasajero a eliminar: " ; 
                            $nroDocPasaj = trim(fgets(STDIN)) ;

                            $pasajero = new Pasajero() ; 
                            $encontro = $pasajero -> Buscar($nroDocPasaj) ; 
                                if($encontro) {
                                    $borrado = $pasajero -> eliminar() ; 
                                        if($borrado) {
                                            echo "El pasajero fue eliminado \n" ; 
                                            $cantPasajeros-- ; 
                                        } else {
                                            echo "Error! el pasajero no fue eliminado \n" ;
                                        }  
                                }
                        break ;
                        case 4: 
                            /* Ver pasajeros */

                            $pasajero = new Pasajero() ;
                            $coleccPasajeros = $pasajero -> listar() ;
                            if(count($coleccPasajeros) > 0 ){
                                echo arrayString($coleccPasajeros) ;
                            } else {
                                echo "No hay pasajeros para mostrar " ; 
                            }
                        break ; 
                    } 
                    $opcionPasajero = menuPasajero() ; 
                }   
            break ; 
            case 5:
            break ; 
        }
                    
    } while($opcion <> 5) ;