<?php 

use LDAP\Result;
    include_once "Actividad.php" ; 
    include_once "Modulo.php" ; 
    include_once "ModuloPresencial.php" ; 
    include_once "ModuloOnline.php" ; 
    include_once "Ingresante.php" ; 
    include_once "Inscripcion.php" ; 
    include_once "bd_ingresante.phpphp" ; 


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
        echo "1. Actividad" . "\n" ;
        echo "2. Modulo" . "\n" ;
        echo "3. Ingresantes" . "\n" ;
        echo "4. Inscripciones" . "\n" ;
        echo "5. Salir" . "\n" ;
        echo "Ingrese opcion: " ; 
        $opcion = trim(fgets(STDIN)) ;
        echo "\n" ;
            while($opcion < 1 || $opcion > 5) {
                echo "Ingrese una opcion correcta" . "\n" ; 
                echo "\n" ;  
                echo "1. Actividad" . "\n" ;
                echo "2. Modulo" . "\n" ;
                echo "3. Ingresantes" . "\n" ;
                echo "4. Inscripciones" . "\n" ;
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
    function menuActividad() {
        // string $opcion

        echo "\n" ; 
        echo "Ingrese una opcion: " . "\n" ; 
        echo "1. Crear actividad" . "\n" ;
        echo "2. Modificar actividad" . "\n" ;
        echo "3. Eliminar actividad" . "\n" ;
        echo "4. Ver actividades" . "\n" ; 
        echo "5. Ver todas las actividades de un ingresante" . "\n" ; // 5.6 
        echo "6. Regresar" . "\n" ;
        echo "Ingrese opcion: " ; 
        $opcion = trim(fgets(STDIN)) ;
        echo "\n" ;
            while($opcion < 1 || $opcion > 6) {
                echo "Ingrese una opcion correcta" . "\n" ; 
                echo "\n" ;  
                echo "Ingrese una opcion: " . "\n" ; 
                echo "1. Crear actividad" . "\n" ;
                echo "2. Modificar actividad" . "\n" ;
                echo "3. Eliminar actividad" . "\n" ;
                echo "4. Ver actividades" . "\n" ; 
                echo "5. Ver todas las actividades de un ingresante" . "\n" ; // 5.6 
                echo "6. Regresar" . "\n" ;
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
    function menuModulo() {
        // string $opcion

        echo "\n" ; 
        echo "Ingrese una opcion: " . "\n" ; 
        echo "1. Crear modulos" . "\n" ;
        echo "2. Modificar modulos" . "\n" ;
        echo "3. Eliminar modulos" . "\n" ;
        echo "4. Ver modulos" . "\n" ;
        echo "5. Regresar" . "\n" ;
        echo "Ingrese opcion: " ; 
        $opcion = trim(fgets(STDIN)) ;
        echo "\n" ;
            while($opcion < 1 || $opcion > 5) {
                echo "Ingrese una opcion correcta" . "\n" ; 
                echo "\n" ;  
                echo "1. Crear modulos" . "\n" ;
                echo "2. Modificar modulos" . "\n" ;
                echo "3. Eliminar modulos" . "\n" ;
                echo "4. Ver modulos" . "\n" ;
                echo "5. Regresar" . "\n" ;
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
    function menuIngresante() {
        // string $opcion

        echo "\n" ; 
        echo "Ingrese una opcion: " . "\n" ; 
        echo "1. Crear ingresante" . "\n" ;
        echo "2. Modificar ingresante" . "\n" ;
        echo "3. Eliminar ingresante" . "\n" ;
        echo "4. Ver ingresante" . "\n" ;
        echo "5. Regresar" . "\n" ;
        echo "Ingrese opcion: " ; 
        $opcion = trim(fgets(STDIN)) ;
        echo "\n" ;
            while($opcion < 1 || $opcion > 5) {
                echo "Ingrese una opcion correcta" . "\n" ; 
                echo "\n" ;  
                echo "1. Crear ingresante" . "\n" ;
                echo "2. Modificar ingresante" . "\n" ;
                echo "3. Eliminar ingresante" . "\n" ;
                echo "4. Ver ingresante" . "\n" ;
                echo "5. Regresar" . "\n" ;
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
    function menuInscripcion() {
        // string $opcion

        echo "\n" ; 
        echo "Ingrese una opcion: " . "\n" ; 
        echo "1. Crear inscripcion" . "\n" ;
        echo "2. Modificar inscripcion" . "\n" ;
        echo "3. Eliminar inscripcion" . "\n" ;
        echo "4. Ver inscripciones" . "\n" ;        // 5.2
        echo "5. Ver inscripciones en un modulo determinado" . "\n" ;       // 5.3
        echo "6. Ver incripciones a una actividad determinada" . "\n" ;         // 5.4
        echo "7. Ver todos los registros dado un modulo de un mismo dni que tenga mas de un registro" . "\n" ;  // 5.5
        echo "7. Regresar" . "\n" ;
        echo "Ingrese opcion: " ; 
        $opcion = trim(fgets(STDIN)) ;
        echo "\n" ;
            while($opcion < 1 || $opcion > 7) {
                echo "Ingrese una opcion correcta" . "\n" ; 
                echo "\n" ;  
                echo "1. Crear " . "\n" ;
                echo "2. Modificar " . "\n" ;
                echo "3. Eliminar " . "\n" ;
                echo "4. Ver inscripciones" . "\n" ;    // 5.2
                echo "5. Ver inscripciones en un modulo determinado" . "\n" ;       // 5.3
                echo "6. Ver incripciones a una actividad determinada" . "\n" ;         // 5.4
                echo "7. Ver todos los registros dado un modulo de un mismo dni que tenga mas de un registro" . "\n" ;  // 5.5
                echo "7. Regresar" . "\n" ;
                echo "Ingrese opcion: " ; 
                $opcion = trim(fgets(STDIN)) ;
                echo "\n" ; 
            }
        return $opcion ;
    }

    /**
     * Retorna true si el ingresante ya existe en la misma actividad
     * @param 
     * @return 
     */

    function existeEnActividad($idActv, $coleccActividades, $idMod, $coleccInscripciones) { 
        $i = 0 ; 
        $j = 0 ;
        $existe = false ;

        


            while($j < count($coleccInscripciones) && $existe == false) {

            }



            while($i < count($coleccActividades) && $existe == false) {
                    $actividad = $coleccActividades[$i] ; 
                    $mismoIdActividad = $actividad -> getAIdentificacion() ; 
                    if($mismoIdActividad == $idActv) {
                        $existe = true ; 
                    }
                    $i++ ; 
            }

        return $existe ; 
    }


    /* Test */

    $baseDatos = new BaseDatos() ; 
    $conexion = $baseDatos -> iniciar() ; 

    /* Colecciones */
    $coleccActividades = [] ; 
    $coleccModulos = [] ; 
    $coleccIngresantes = [] ; 
    $coleccInscripciones = [] ;

    /* Inicializo variables */
    $cantActividades = 0 ; 
    $cantModulos = 0 ;
    $cantIngresantes = 0 ; 
    $cantIncripciones = 0 ; 

    /* AUTO_INCREMENT */ // se tiene que ir incrementando 
    $idActividad = 10 ;
    $idModulo = 101 ;
    $idInscripcion = 1 ; 

    do {
        /* Despliega el menu principal */
        $opcion = menu() ; 
        switch($opcion) {
            case 1:  
                /* Despliega el menu para la seccion de actividades */
                $opcionActividad = menuActividad() ; 
                while($opcionActividad <> 6) {
                    switch($opcionActividad) {
                        case 1: 
                            /* Crear una actividad */
                                         
                            echo "Ingrese descripcion corta de la actividad: " ; 
                            $descripCorta = trim(fgets(STDIN)) ; 
                            echo "Ingrese descripcion larga de la actividad: " ; 
                            $descripLarga = trim(fgets(STDIN)) ; 

                            $actividad = new Actividad() ;
                            $actividad -> cargar($idActividad, $descripCorta, $descripLarga) ; 
                            $actividad -> insertar() ; 
                            $cantActividades++ ; 
                            $idActividad++ ; 
                            array_push($coleccActividades, $actividad) ; 

                            // opcional ?
                            $actividad -> setColeccionActividades($coleccActividades) ;

                        break ; 
                        case 2: 
                            /* Modificar una actividad */

                            echo "Ingrese el id de la actividad a modificar: " ; 
                            $idActividad = trim(fgets(STDIN)) ; 
                            $actividad = new Actividad() ;
                            $encontro = $actividad -> Buscar($idActividad) ;
                                if($encontro) {
                                    echo "Ingrese nueva descripcion corta de la actividad: " ; 
                                    $descripCorta = trim(fgets(STDIN)) ; 
                                    echo "Ingrese nueva descripcion larga de la actividad: " ; 
                                    $descripLarga = trim(fgets(STDIN)) ;
                                    $actividad -> cargar($idActividad, $descripCorta, $descripLarga) ; 
                                    $modifico = $actividad -> modificar() ; 
                                        if($modifico) {
                                            echo "La actividad fue modificada \n" ; 
                                        } else {
                                            echo "Error! La actividad no fue modificada \n" ;
                                        }
                                } else {
                                    echo "La actividad no fue encontrada \n" ; 
                                }
                        break ; 
                        case 3:
                            /* Eliminar una actividad */

                            echo "Ingrese el id de la actividad a eliminar: " ; 
                            $idActividad = trim(fgets(STDIN)) ; 

                            $actividad = new Actividad() ;
                            $encontro = $actividad -> Buscar($idActividad) ;
                                if($encontro) {
                                    $borrado = $actividad -> eliminar() ;
                                        if($borrado) {
                                            echo "La actividad fue eliminada \n" ; 
                                            $cantActividades-- ; 
                                        } else {
                                            echo "Error! La empresa no fue eliminada \n" ;
                                        }
                                } else {
                                    echo "La empresa no fue encontrada \n" ; 
                                }
                        break ;
                        case 4: 
                            /* ver las actividades */
                            
                            $actividad = new Actividad() ;
                            $coleccActividades = $actividad -> listar() ;
                            if(count($coleccActividades) > 0 ){
                                echo arrayString($coleccActividades) ;
                            } else {
                                echo "No hay actividades para mostrar \n" ; 
                            }   
                        break ; 
                        case 5:
                            // DNI del ingresante objetivo
                            $dni_ingresante = "123456789"; // Reemplaza con el DNI del ingresante deseado

                            // Consulta SQL para obtener las actividades inscritas por el ingresante
                            $sql = "SELECT a.aidentificacion, a.adescripcioncorta, a.adescripcionlarga
                                    FROM actividad AS a
                                    JOIN modulo AS m ON a.aidentificacion = m.aidentificacion
                                    JOIN inscripcion AS i ON m.midentificacion = i.midentificacion
                                    WHERE i.dni = '$dni_ingresante'";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Mostrar los resultados obtenidos
                                while ($row = $result->fetch_assoc()) {
                                    echo "ID de Actividad: " . $row["aidentificacion"] . "<br>";
                                    echo "Descripción Corta: " . $row["adescripcioncorta"] . "<br>";
                                    echo "Descripción Larga: " . $row["adescripcionlarga"] . "<br>";
                                    echo "<br>";
                                }
                            } else {
                                echo "El ingresante no tiene inscripciones a actividades.";
                            }
                        break ;
                    }
                    $opcionActividad = menuActividad() ;
                }
                     
            break ;
            case 2:
                 /* Despliega el menu para la seccion de modulo */
                $opcionModulo = menuModulo() ; 
                while($opcionModulo <> 5) {
                    switch($opcionModulo) {
                        case 1: 
                            /* Crear modulo */

                            if($cantActividades == 0) {
                                echo "Debe crear una actividad \n" ; 
                            } else {
                                // $horaActual = strtotime("$hora:$minutos") ;
                                // date("H:i:s", $hora_desde) ;  // formato hora normal 08:00:00    
                                //$fechaInicio = date('y-m-d') ; 
                                //$fechaFin = date('y-m-d') ; 

                                // para incrementar el id de modulo en caso de que no quiera agregar una actividad al mismo modulo
                                echo "Quiere conservar el modulo? " ; 
                                $res = trim(fgets(STDIN)) ; 
                                    if($cantModulos > 0 && $res == 'no') {
                                        $idModulo++ ;
                                    }

                                // agregarle id de actividad 
                                //$actividad = new Actividad() ; 
                                //$coleccActividades = $actividad -> getColeccActividades() ; 
                                    foreach($coleccActividades as $actividad) {
                                        $id = $actividad -> getAIdentificacion() ; 
                                        echo $id . "\n" ; 
                                    }
                                echo "Cual id de actividad quiere vincular a este modulo? " ; 
                                $idActividad = trim(fgets(STDIN)) ; 

                                echo "Ingrese Descripcion: " ; 
                                $descripcion = trim(fgets(STDIN)) ;
                                echo "Ingrese tope de inscripciones: " ; 
                                $topeInscrip = trim(fgets(STDIN)) ;
                                echo "Ingrese costo de inscripcion: " ;
                                $costo = trim(fgets(STDIN)) ;
                                //echo "Ingrese horario de inicio: " ; 
                                $horarioInicio = "09:10:10" ; 
                                //echo "Ingrese horario de cierre: " ; 
                                $horarioCierre = "20:20:00" ; 
                                //echo "Ingrese fecha de inicio: " ; 
                                $fechaInicio = "2002-03-08" ;
                                //echo "Ingrese fecha de fin: " ; 
                                $fechaFin = "2020-10-31" ;
                                echo "Es presencial o online? " ; 
                                $enLinea = trim(fgets(STDIN)) ; 
                                    if($enLinea == 'online') {
                                        $presencial = "si" ;
                                        echo $presencial ; 
                                        $link = "linkDeReunion.com" ; 
                                        $bonus = 20 ; 
                                        $modulo = new ModuloOnline() ; 
                                        $modulo -> cargarOnline($idModulo, $descripcion, $topeInscrip, $costo, $horarioInicio, $horarioCierre, $fechaInicio, $fechaFin, $presencial, $idActividad, $link, $bonus) ; 
                                        $modulo -> insertar() ;             
                                        $cantModulos++ ;
                                        array_push($coleccModulos, $modulo) ;  
                                    } else {
                                        $presencial = "no" ; 
                                        $modulo = new ModuloPresencial() ; 
                                        $modulo -> cargar($idModulo, $descripcion, $topeInscrip, $costo, $horarioInicio, $horarioCierre, $fechaInicio, $fechaFin, $presencial, $idActividad) ; 
                                        $modulo -> insertar() ;
                                        $cantModulos++ ;
                                        array_push($coleccModulos, $modulo) ;  
                                    }
                            }
                        break ; 
                        case 2: 
                            /* Modificar modulo */
                            $fechaInicio = date('y-m-d') ; 
                            $fechaFin = date('y-m-d') ;

                            echo "Ingrese el id del modulo a modificar: " ; 
                            $idModulo = trim(fgets(STDIN)) ;
                            $modulo = new Modulo() ;
                            $encontro = $modulo -> Buscar($idModulo) ; 
                                if($encontro) {
                                    echo "Ingrese nueva descripcion: " ; 
                                    $descripcion = trim(fgets(STDIN)) ;
                                    echo "Ingrese nuevo tope de inscripciones: " ; 
                                    $topeInscrip = trim(fgets(STDIN)) ;
                                    echo "Ingrese nuevo costo de inscripcion: " ;
                                    $costo = trim(fgets(STDIN)) ;
                                    echo "Ingrese nuevo horario de inicio: " ; 
                                    $horarioInicio = trim(fgets(STDIN)) ;
                                    echo "Ingrese nuevo horario de cierre: " ; 
                                    $horarioCierre = trim(fgets(STDIN)) ;
                                    echo "Ingrese nueva fecha de inicio: " ; 
                                    $fechaInicio = trim(fgets(STDIN)) ;
                                    echo "Ingrese nueva fecha de fin: " ; 
                                    $fechaFin = trim(fgets(STDIN)) ;
                                    echo "Es presencial o online? " ; 
                                    $presencial = trim(fgets(STDIN)) ; 

                                    if($presencial == 'online') {
                                        $link = "linkDeReunion.com" ; 
                                        $bonus = 20 ; 
                                        $modulo = new ModuloOnline ; 
                                        $modulo -> cargarOnline($idModulo, $descrip, $topeInscrip, $costo, $horarioInicio, $horarioCierre, $fechaInicio, $fechaFin, $presencial, $idActividad, $link, $bonus) ; 
                                        $modifico = $modulo -> modificar() ;  
                                    } else {
                                        $modulo = new ModuloPresencial ; 
                                        // si no probar con modulo solo 
                                        $modulo -> cargar($idModulo, $descrip, $topeInscrip, $costo, $horarioInicio, $horarioCierre, $fechaInicio, $fechaFin, $presencial, $idActividad) ; 
                                        $modifico = $modulo -> modificar() ; 
                                    }

                                    if($modifico) {
                                        echo "El modulo fue modificado \n" ; 
                                    } else {
                                        echo "Error! el modulo no fue modificado \n" ;
                                    }
                                } else {
                                    echo "El modulo no fue encontrado \n" ; 
                                }
                        break ; 
                        case 3: 
                            /* eliminar modulo */

                            echo "Ingrese el id del modulo a eliminar: " ; 
                            $idModulo = trim(fgets(STDIN)) ;
                            $encontro = $modulo -> Buscar($idModulo) ; 
                                if($encontro) {
                                    $borrado = $modulo -> eliminar() ; 
                                        if($borrado) {
                                            echo "El modulo fue eliminado \n" ; 
                                            $cantModulos-- ; 
                                        } else {
                                            echo "Error! el modulo no fue eliminado \n" ;
                                        }
                                }
                        break ; 
                        case 4: 
                            /* Ver los modulos */
                            
                            $modulo = new Modulo() ;
                            $coleccModulos = $modulo -> listar();
                            if(count($coleccModulos) > 0 ){
                                echo arrayString($coleccModulos) ;
                            } else {
                                echo "No hay modulos para mostrar " ; 
                            }
                        break ; 
                    }
                    $opcionModulo = menuModulo() ;
                }
            break ; 
            case 3: 
                /* Despliega el menu para la seccion de ingresante */
                $opcionIngresante = menuIngresante() ; 
                while($opcionIngresante <> 5) {
                    switch($opcionIngresante) {
                        case 1: 
                            /* Crear ingresante */

                            echo "Ingrese el dni del ingresante: " ; 
                            $dni = trim(fgets(STDIN)) ;
                            echo "Ingrese nombre del ingresante: " ; 
                            $nombre = trim(fgets(STDIN)) ; 
                            echo "Ingrese apellido del ingresante: " ; 
                            $apellido = trim(fgets(STDIN)) ; 
                            echo "El ingresante tiene legajo? " ; 
                            $res = trim(fgets(STDIN)) ;
                                if($res == "si") {
                                    echo "Ingrese legajo del ingresante: " ; 
                                    $legajo = trim(fgets(STDIN)) ;
                                } else {
                                    $legajo = null ; 
                                }
                            echo "Ingrese correo del ingresante: " ; 
                            $correo = trim(fgets(STDIN)) ;

                            $ingresante = new Ingresante() ; 
                            $ingresante -> cargar($dni, $nombre, $apellido, $legajo, $correo) ; 
                            $ingresante -> insertar() ; 
                            array_push($coleccIngresantes, $ingresante)  ; 

                        break ; 
                        case 2: 
                            /* Modificar ingresante */

                            echo "Ingrese dni del ingresante a modificar: " ; 
                            $dni = trim(fgets(STDIN)) ;

                            $ingresante = new Ingresante() ; 
                            $encontro = $ingresante -> Buscar($dni) ; 
                                if($encontro) {
                                    echo "Ingrese nuevo dni del ingresante: " ; 
                                    $dni = trim(fgets(STDIN)) ;
                                    echo "Ingrese nuevo nombre del ingresante: " ; 
                                    $nombre = trim(fgets(STDIN)) ; 
                                    echo "Ingrese nuevo apellido del ingresante: " ; 
                                    $apellido = trim(fgets(STDIN)) ; 
                                    echo "El nuevo ingresante tiene legajo?" ; 
                                    $res = trim(fgets(STDIN)) ;
                                        if($res == "si") {
                                            echo "Ingrese nuevo legajo del ingresante: " ; 
                                            $legajo = trim(fgets(STDIN)) ;
                                        } else {
                                            $legajo = null ; 
                                        }
                                    echo "Ingrese nuevo correo del ingresante: " ; 
                                    $correo = trim(fgets(STDIN)) ;                                   

                                    $ingresante = new Ingresante() ;
                                    $ingresante -> cargar($dni, $nombre, $apellido, $legajo, $correo) ; 
                                    $ingresante -> modificar() ;
                                        if($modifico) {
                                            echo "El ingresante fue modificado \n" ; 
                                        } else {
                                            echo "Error! el ingresante no fue modificado \n" ;
                                        }
                                }
                        break ; 
                        case 3: 
                            /* Eliminar ingresante */
                            echo "Ingrese dni del ingresante a eliminar: " ; 
                            $dni = trim(fgets(STDIN)) ;

                            $ingresante = new Ingresante() ; 
                            $encontro = $ingresante -> buscar($dni) ; 
                                if($encontro) {
                                    $borrado = $ingresante -> eliminar() ;  
                                        if($borrado) {
                                            echo "El ingresante fue eliminado \n" ; 
                                            $cantViajes-- ; 
                                        } else {
                                            echo "Error! el ingresante no fue eliminado \n" ;
                                        }
                                }
                        break ;
                        case 4: 
                            /* Ver ingresantes */
                            $ingresante = new Ingresante() ;
                            $coleccIngresantes = $ingresante -> listar();
                            if(count($coleccIngresantes) > 0 ){
                                echo arrayString($coleccIngresantes) ;
                            } else {
                                echo "No hay ingresantes para mostrar " ; 
                            }
                        break ; 
                    }
                    $opcionIngresante = menuIngresante() ;
                } 
            break ; 
            case 4:   
                /* Despliega el menu para la seccion de inscripcion */
                $opcionInscripcion = menuInscripcion() ; 
                while($opcionInscripcion <> 8) {
                    switch($opcionInscripcion) {
                        case 1: 
                            /* Crear inscripcion */

                            $cantActividades = 1 ;//count($coleccActividades) ;
                            $cantModulos = 1 ;//count($coleccModulos) ; 
                            if($cantModulos == 0 && $cantIngresantes == 0) {
                                echo "Debe crear un modulo y un ingresante para realizar una inscripcion \n" ; 
                            } else {
                                echo "Ingrese el id de modulo a inscribir: " ; 
                                $idModulo = trim(fgets(STDIN)) ; 
                                echo "Ingrese dni del ingresante a inscribir: " ; 
                                $dni = trim(fgets(STDIN)) ; 

                                $modulo = new Modulo() ; 
                                $ingresante = new Ingresante() ; 
                                $coleccModulos = $modulo -> listar() ; 
                                $coleccIngresantes = $ingresante -> listar() ; 
                                $i = 0 ; 
                                $j = 0 ; 
                                $encontroId = false ; 
                                $encontroDni = false ; 

                                    // busco si existe el id del modulo
                                    while($i < count($coleccModulos) && $encontroId == false) {
                                        //echo "ENTRE \n" ;
                                        $modulo = $coleccModulos[$i] ; 
                                        $idMod = $modulo -> getMIdentificacion() ;
                                        //echo $idMod . "\n" ; 
                                        if($idMod == $idModulo) {
                                            // echo "ID? \n" ; 
                                            $encontroId = true ; 
                                            $idActv = $modulo -> getAIdentifica() ;
                                            $pertenece = $modulo instanceof moduloOnline ; 
                                                if($pertenece) {
                                                    $modulo = new ModuloOnline() ; 
                                                    $costoFinal = $modulo -> darCostoMódulo() ;
                                                } else {
                                                    $modulo = new Modulo() ;
                                                    $costoFinal = $modulo -> darCostoMódulo() ;
                                                }
                                        }
                                        $i++ ; 
                                    }

                                    // busco si existe el dni del ingresante
                                    while($j < count($coleccIngresantes) && $encontroDni == false) {
                                        //echo "ENTRO ACA? \n" ;
                                        $ingresante = $coleccIngresantes[$j] ; 
                                        $mismoDni = $ingresante -> getDni() ; 
                                        if($mismoDni == $dni) {
                                            $encontroDni = true ; 
                                            //echo "DNI ? \n" ; 
                                        }
                                        $j++ ; 
                                    }

                                    //echo "HOLA" ;

                                   
                                // si ambos son true se puede crear la inscripcion
                                if($encontroDni == true && $encontroId == true) {
                                    $consulta = "SELECT COUNT(*) AS total FROM inscripcion AS i
                                    INNER JOIN modulo AS m ON i.midentificacion = m.midentificacion
                                    WHERE i.dni = '{$this->dni}' AND m.aidentificacion = '{$this->aidentificacion}'";

                                    if ($base->Iniciar()) {
                                        if ($base->Ejecutar($consulta)) {
                                            $resultado = $base->Registro();
                                            $totalInscripciones = $resultado['total'];

                                            if ($totalInscripciones > 0) {
                                                echo "El ingresante ya está inscrito en un módulo de esta actividad.";
                                                return false;
                                            } }}
                                            if($existe) {
                                                echo "El ingresante ya existe en esta actividad \n" ; 
                                            } else {
                                                $fechaRealiza = date('y-m-d') ; 
                                                // echo "Ingrese fecha de realizacion" ; 
                                                $fechaRealiza = "2076-01-28" ;  
                                                $inscripcion = new Inscripcion() ; 
                                                $inscripcion -> cargar($idInscripcion, $fechaRealiza, $costoFinal, $idModulo, $dni) ; 
                                                $inscripcion -> insertar() ; 
                                                array_push($coleccInscripciones) ; 
                                                $idInscripcion++ ; 
                                                $cantIncripciones++ ; 
                                            }                                   
                                } else {
                                    echo "No se pudo realizar la inscripcion \n" ;
                                }
                            }
                        break ; 
                        case 2: 
                            /* Modificar inscripcion */

                            echo "Ingrese el id de inscripcion a modificar: " ; 
                            $idInscripcion = trim(fgets(STDIN)) ; 
                            $inscripcion = new Inscripcion() ;
                            $encontro = $inscripcion -> Buscar($idInscripcion) ; 
                                if($encontro) {
                                    echo "Ingrese el nuevo id de modulo a inscribir: " ; 
                                    $idModulo = trim(fgets(STDIN)) ; 
                                    echo "Ingrese nuevo dni del ingresante a inscribir: " ; 
                                    $dni = trim(fgets(STDIN)) ;                                 

                                    $coleccModulos = $modulo -> listar() ; 
                                    $coleccIngresantes = $ingresante -> listar() ; 
                                    $i = 0 ; 
                                    $j = 0 ; 
                                    $encontroId == false ; 
                                    $encontroDni == false ; 
                            
                                        while($i < count($coleccModulos) || $encontroId == false) {
                                            if($coleccModulos[0] -> getMIdentificacion() == $idModulo) {
                                                $encontroId = true ; 
                                                $pertenece = $modulo instanceof moduloOnline ; 
                                                    if($pertenece) {
                                                        $modulo = new ModuloOnline() ; 
                                                        $costoFinal = $modulo -> darCostoMódulo() ;
                                                    } else {
                                                        $modulo = new ModuloPresencial() ;
                                                        $costoFinal = $modulo -> darCostoMódulo() ;
                                                    }
                                            }
                                            $i++ ; 
                                        }

                                        while($i < count($coleccIngresantes) || $encontroDni == false) {
                                            if($coleccIngresantes[0] -> getDni() == $dni) {
                                                $encontroDni = true ; 
                                            }
                                            $i++ ; 
                                        }

                                    if($encontroDni && $encontroId) {
                                        $fechaRealiza = date('y-m-d') ; 
                                        // echo "Ingrese fecha de realizacion" ; 
                                        $fechaRealiza = "31/32/74" ;  
                                        $inscripcion = new Inscripcion() ; 
                                        $inscripcion -> cargar($idInscripcion, $fechaRealiza, $costoFinal, $idModulo, $dni) ; 
                                        $inscripcion -> modificar() ; 
                                            if($modifico) {
                                                echo "La inscripcion fue modificada \n" ; 
                                            } else {
                                                echo "Error! la inscripcion no fue modificada \n" ;
                                            }
                                    } else {
                                        echo "No se pudo modificar la inscripcion \n" ; 
                                    }    
                                } else {
                                    echo "El id no fue encontrado \n" ; 
                                }
                        break ; 
                        case 3: 
                            /* Eliminar inscripcion */

                            echo "Ingrese el id de inscripcion a eliminar: " ; 
                            $idInscripcion = trim(fgets(STDIN)) ;

                            $inscripcion = new Inscripcion() ; 
                            $encontro = $inscripcion -> Buscar($idInscripcion) ; 
                                if($encontro) {
                                    $borrado = $inscripcion -> eliminar() ; 
                                        if($borrado) {
                                            echo "La inscripcion fue eliminada \n" ; 
                                            $cantIncripciones-- ; 
                                        } else {
                                            echo "Error! la inscripcion no fue eliminada \n" ;
                                        }  
                                }
                        break ;
                        case 4: 
                            /* Ver inscripciones */

                            $inscripcion = new Inscripcion() ;
                            $coleccPasajeros = $inscripcion -> listar() ;
                            if(count($coleccPasajeros) > 0 ){
                                echo arrayString($coleccPasajeros) ;
                            } else {
                                echo "No hay inscripciones para mostrar " ; 
                            }
                        break ; 
                        case 5:
                            /*  */
                            echo "Ingrese ID del módulo: ";
                            $idModulo = trim(fgets(STDIN)) ;

                            // Crear una instancia de BaseDatos fuera del bloque switch
                            $base = new BaseDatos();
                            
                            // Consulta SQL para obtener las inscripciones del módulo
                            $consulta = "SELECT inscrp.iidentificacion, inscrp.fecha_realizacion, inscrp.costo_final,
                                        ingr.dni, ingr.nombre, ingr.apellido
                                        FROM inscripcion AS inscrp
                                        JOIN ingresante AS ingr ON inscrp.dni = ingr.dni
                                        WHERE inscrp.midentificacion = $idModulo";

                            if ($base->Iniciar()) {
                                if ($base->Ejecutar($consulta)) {
                                    
                                        // Mostrar los resultados obtenidos
                                        while ($row = $base->Registro()) {
                                            echo "ID de Inscripción: " . $row["iidentificacion"] . "\n" ;
                                            echo "Fecha de Realización: " . $row["fecha_realizacion"] . "\n" ;
                                            echo "Costo Final: " . $row["costo_final"] . "\n" ;
                                            echo "DNI del Ingresante: " . $row["dni"] . "\n" ;
                                            echo "Nombre del Ingresante: " . $row["nombre"] . "\n" ;
                                            echo "Apellido del Ingresante: " . $row["apellido"] . "\n" ;
                                            echo "\n" ;
                                        }
                                    
                                } else {
                                    $this -> setmensajeoperacion($base -> getError()) ;
                                }
                            } else {
                                $this -> setmensajeoperacion($base -> getError()) ;
                            }
                        break ; 
                        case 6: 

                            $base = new BaseDatos();

                            // ID de la actividad objetivo
                            $idActiv = 10 ; // Reemplaza con el ID de la actividad deseada

                            // Consulta SQL para obtener las inscripciones de la actividad
                            $consulta = "SELECT i.iidentificacion, i.fecha_realizacion, i.costo_final,
                                        m.descripcion AS modulo_descripcion,
                                        ing.dni, ing.nombre, ing.apellido
                                        FROM inscripcion AS i
                                        JOIN modulo AS m ON i.midentificacion = m.midentificacion
                                        JOIN actividad AS a ON m.aidentificacion = a.aidentificacion
                                        JOIN ingresante AS ing ON i.dni = ing.dni
                                        WHERE a.aidentificacion = $idActiv";

                            if ($base->Iniciar()) {
                                if ($base->Ejecutar($consulta)) {
                           
                                // Mostrar los resultados obtenidos
                                while ($row = $base -> Registro()) {
                                    echo "ID de Inscripción: " . $row["iidentificacion"] . "\n" ;
                                    echo "Fecha de Realización: " . $row["fecha_realizacion"] . "\n" ;
                                    echo "Costo Final: " . $row["costo_final"] . "\n" ;
                                    echo "Descripción del Módulo: " . $row["modulo_descripcion"] . "\n" ;
                                    echo "DNI del Ingresante: " . $row["dni"] . "\n" ;
                                    echo "Nombre del Ingresante: " . $row["nombre"] . "\n" ;
                                    echo "Apellido del Ingresante: " . $row["apellido"] . "\n" ;
                                    echo "\n" ;
                                }
                            } else {
                                $this -> setmensajeoperacion($base -> getError()) ;
                            }
                        } else {
                            $this -> setmensajeoperacion($base -> getError()) ;
                        }
                            
                        break ; 
                        case 7: 

                            $base = new BaseDatos();
                            // ID del módulo objetivo
                            $idModulo = 101 ; // Reemplaza con el ID del módulo deseado

                            // Consulta SQL para buscar los registros duplicados en el módulo
                            $consulta = "SELECT dni, COUNT(*) AS total
                                        FROM inscripcion
                                        WHERE midentificacion = $idModulo
                                        GROUP BY dni
                                        HAVING COUNT(*) > 0";

                            
                        if ($base->Iniciar()) {
                            if ($base->Ejecutar($consulta)) {
                            
                                // Mostrar los resultados obtenidos
                                while ($row = $base -> Registro()) {
                                    echo "DNI: " . $row["dni"] . "\n" ;
                                    echo "Cantidad de veces repetido: " . $row["total"] . "\n" ;
                                    echo "\n" ;
                                }
                            } else {
                                $this -> setmensajeoperacion($base -> getError()) ;
                            }
                        } else {
                            $this -> setmensajeoperacion($base -> getError()) ;
                        }
                            
                        break ; 
                    } 
                    $opcionInscripcion = menuInscripcion() ; 
                }   
            break ; 
        }
    } while($opcion <> 5) ;