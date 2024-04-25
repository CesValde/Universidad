<?php 

use LDAP\Result;
    include_once "Actividad.php" ; 
    include_once "Modulo.php" ; 
    include_once "ModuloPresencial.php" ; 
    include_once "ModuloOnline.php" ; 
    include_once "Ingresante.php" ; 
    include_once "Inscripcion.php" ; 
    include_once "bdingresante.php" ; 

    /**
     * Método que convierte arrays u objetos en cadenas de texto
     * @param array 
     * @return string 
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
        echo "\n" ; 
        echo "Ingrese una opcion: " . "\n" ; 
        echo "1. Crear actividad" . "\n" ;
        echo "2. Modificar actividad" . "\n" ;
        echo "3. Eliminar actividad" . "\n" ;
        echo "4. Ver actividades" . "\n" ; 
        echo "5. Ver todas las actividades de un ingresante" . "\n" ; 
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
                echo "5. Ver todas las actividades de un ingresante" . "\n" ; 
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
     * @return int
     */
    function menuInscripcion() {
        echo "\n" ; 
        echo "Ingrese una opcion: " . "\n" ; 
        echo "1. Crear inscripcion" . "\n" ;
        echo "2. Modificar inscripcion" . "\n" ;
        echo "3. Eliminar inscripcion" . "\n" ;
        echo "4. Ver inscripciones" . "\n" ; 
        echo "5. Ver inscripciones en un modulo determinado" . "\n" ;
        echo "6. Ver incripciones a una actividad determinada" . "\n" ; 
        echo "7. Ver todos los registros dado un modulo de un mismo dni que tenga mas de un registro" . "\n" ; 
        echo "8. Regresar" . "\n" ;
        echo "Ingrese opcion: " ; 
        $opcion = trim(fgets(STDIN)) ;
        echo "\n" ;
            while($opcion < 1 || $opcion > 8) {
                echo "Ingrese una opcion correcta" . "\n" ; 
                echo "\n" ;  
                echo "1. Crear " . "\n" ;
                echo "2. Modificar " . "\n" ;
                echo "3. Eliminar " . "\n" ;
                echo "4. Ver inscripciones" . "\n" ; 
                echo "5. Ver inscripciones en un modulo determinado" . "\n" ; 
                echo "6. Ver incripciones a una actividad determinada" . "\n" ;  
                echo "7. Ver todos los registros dado un modulo de un mismo dni que tenga mas de un registro" . "\n" ;  
                echo "8. Regresar" . "\n" ; 
                echo "Ingrese opcion: " ; 
                $opcion = trim(fgets(STDIN)) ;
                echo "\n" ; 
            }
        return $opcion ;
    }

    /**
     * Retorna true si el ingresante ya existe en la misma actividad
     * @param int $idActv
     * @param array $coleccActividades
     * @return boolean
     */
    function existeEnActividad($idActv, $coleccActividades) { 
        $i = 0 ; 
        $existe = false ;

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
    $idActividad = 100 ;
    $idInscripcion = 1 ; 
    $idModulo = 10 ; 

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
                            // $actividad -> setColeccionActividades($coleccActividades) ;

                        break ; 
                        case 2: 
                            /* Modificar una actividad */

                            echo "Ingrese el id de la actividad a modificar: " ; 
                            $idAct = trim(fgets(STDIN)) ; 
                            $actividad = new Actividad() ;
                            $encontro = $actividad -> Buscar($idAct) ;
                                if($encontro) {
                                    echo "Ingrese nueva descripcion corta de la actividad: " ; 
                                    $descripCorta = trim(fgets(STDIN)) ; 
                                    echo "Ingrese nueva descripcion larga de la actividad: " ; 
                                    $descripLarga = trim(fgets(STDIN)) ;
                                    $actividad -> cargar($idAct, $descripCorta, $descripLarga) ; 
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
                            $idAct = trim(fgets(STDIN)) ; 

                            $actividad = new Actividad() ;
                            $encontro = $actividad -> Buscar($idAct) ;
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
                            // Ver todas las actividades de un ingresante por su dni
                            $base = new BaseDatos() ;

                            echo "Ingrese dni de un ingresante: " ; 
                            $dni = trim(fgets(STDIN)) ;
 
                            $consulta = "SELECT a.aidentificacion, a.adescripcioncorta, a.adescripcionlarga
                                    FROM actividad AS a
                                    JOIN modulo AS m ON a.aidentificacion = m.aidentificacion
                                    JOIN inscripcion AS i ON m.midentificacion = i.midentificacion
                                    WHERE i.dni = '$dni'";

                            if($base -> Iniciar()) {
                                if($base -> Ejecutar($consulta)) {    
                                    while ($row = $base -> Registro()) {
                                        echo "ID de Actividad: " . $row["aidentificacion"] . "\n" ;
                                        echo "Descripción Corta: " . $row["adescripcioncorta"] . "\n" ;
                                        echo "Descripción Larga: " . $row["adescripcionlarga"] . "\n" ;
                                        echo "<br>";
                                    }
                                } else {
                                    $this -> setmensajeoperacion($base -> getError()) ;
                                }
                            } else {
                                $this -> setmensajeoperacion($base -> getError()) ;
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
                                // $horaActual = strtotime("$hora:$minutos") ;     // formato hora unix
                                // date("H:i:s", $hora_desde) ;  // formato hora normal 08:00:00    

                                    foreach($coleccActividades as $actividad) {
                                        $id = $actividad -> getAIdentificacion() ; 
                                        echo $id . "\n" ; 
                                    }
                                echo "Cual id de actividad quiere vincular a este modulo? " ; 
                                $idAct = trim(fgets(STDIN)) ; 

                                echo "Ingrese Descripcion: " ; 
                                $descripcion = trim(fgets(STDIN)) ;
                                echo "Ingrese tope de inscripciones: " ; 
                                $topeInscrip = trim(fgets(STDIN)) ;
                                echo "Ingrese costo de inscripcion: " ;
                                $costo = trim(fgets(STDIN)) ;
                                    if($idModulo == "mañana") {
                                        $horarioInicio = "09:00:00" ; 
                                        $horarioCierre = "14:00:00" ; 
                                    } else {
                                        $horarioInicio = "17:00:00" ; 
                                        $horarioCierre = "22:00:00" ; 
                                    }
                                echo "Ingrese fecha de inicio: " ; 
                                $fechaInicio = trim(fgets(STDIN)) ;
                                echo "Ingrese fecha de fin: " ; 
                                $fechaFin = trim(fgets(STDIN)) ; ;
                                echo "Es presencial o online? " ; 
                                $presencial = trim(fgets(STDIN)) ; 
                                $fechaInicio = date('y-m-d') ; 
                                $fechaFin = date('y-m-d') ; 
                                    if($presencial == 'online') {
                                        $link = "linkDeReunion.com" ; 
                                        $bonus = 20 ; 
                                        $modulo = new ModuloOnline() ; 
                                        $modulo -> cargarOnline($idModulo, $descripcion, $topeInscrip, $costo, $horarioInicio, $horarioCierre, $fechaInicio, $fechaFin, $presencial, $idAct, $link, $bonus) ; 
                                        $modulo -> insertar() ;             
                                        $cantModulos++ ;
                                        array_push($coleccModulos, $modulo) ;  
                                    } else {
                                        $modulo = new ModuloPresencial() ; 
                                        $modulo -> cargar($idModulo, $descripcion, $topeInscrip, $costo, $horarioInicio, $horarioCierre, $fechaInicio, $fechaFin, $presencial, $idAct) ; 
                                        $modulo -> insertar() ;
                                        $cantModulos++ ;
                                        array_push($coleccModulos, $modulo) ;  
                                    }
                            }
                        break ; 
                        case 2: 
                            /* Modificar modulo */

                            echo "Ingrese el id del modulo a modificar: " ; 
                            $idMod = trim(fgets(STDIN)) ;
                            $modulo = new Modulo() ;
                            $encontro = $modulo -> Buscar($idMod) ; 
                                if($encontro) {
                                    echo "Ingrese nueva descripcion: " ; 
                                    $descripcion = trim(fgets(STDIN)) ;
                                    echo "Ingrese nuevo tope de inscripciones: " ; 
                                    $topeInscrip = trim(fgets(STDIN)) ;
                                    echo "Ingrese nuevo costo de inscripcion: " ;
                                    $costo = trim(fgets(STDIN)) ;
                                        if($idModulo == "mañana") {
                                            $horarioInicio = "09:00:00" ; 
                                            $horarioCierre = "14:00:00" ; 
                                        } else {
                                            $horarioInicio = "17:00:00" ; 
                                            $horarioCierre = "22:00:00" ; 
                                        }
                                    echo "Ingrese nueva fecha de inicio: " ; 
                                    $fechaInicio = trim(fgets(STDIN)) ;
                                    echo "Ingrese nueva fecha de fin: " ; 
                                    $fechaFin = trim(fgets(STDIN)) ;
                                    echo "Es presencial o online? " ; 
                                    $presencial = trim(fgets(STDIN)) ; 

                                    $idAct = $modulo -> getAIdentifica() ;
                                    $fechaInicio = date('y-m-d') ; 
                                    $fechaFin = date('y-m-d') ;
                                    if($presencial == 'online') {
                                        $link = "linkDeReunion.com" ; 
                                        $bonus = 20 ; 
                                        $modulo = new ModuloOnline ; 
                                        $modulo -> cargarOnline($idMod, $descrip, $topeInscrip, $costo, $horarioInicio, $horarioCierre, $fechaInicio, $fechaFin, $presencial, $idAct, $link, $bonus) ; 
                                        $modifico = $modulo -> modificar() ;  
                                    } else {
                                        $modulo = new ModuloPresencial ; 
                                        $modulo -> cargar($idMod, $descrip, $topeInscrip, $costo, $horarioInicio, $horarioCierre, $fechaInicio, $fechaFin, $presencial, $idAct) ; 
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
                            $idMod = trim(fgets(STDIN)) ;
                            $encontro = $modulo -> Buscar($idMod) ; 
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

                            $legajo = null ; 
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
                            $base = new BaseDatos() ;

                            $cantActividades = 0 ;  // count($coleccActividades) ;
                            $cantModulos = 1 ;      // count($coleccModulos) ; 

                            if($cantModulos == 0 && $cantIngresantes == 0) {
                                echo "Debe crear un modulo y un ingresante para realizar una inscripcion \n" ; 
                            } else {
                                foreach($coleccActividades as $actividad) {
                                    $descrip = $actividad -> getDescripcionCorta() ; 
                                    echo $descrip . "\n" ; 
                                }


                                echo "Ingrese el nombre de actividad a inscribir: " ; 
                                $idAct = trim(fgets(STDIN)) ;  
                                echo "Ingrese dni del ingresante a inscribir: " ; 
                                $dni = trim(fgets(STDIN)) ; 


                                // busco si existe el dni del ingresante
                                while($j < count($coleccIngresantes) && $encontroDni == false) {
                                    $ingresante = $coleccIngresantes[$j] ; 
                                    $comparoDni = $ingresante -> getDni() ; 
                                    if($comparoDni == $dni) {
                                        $encontroDni = true ; 
                                    }
                                    $j++ ; 
                                }










                                /* obtener coleccion de inscripciones obtengo el id de modulo para revisar si en los modulos esta el dni y el
                                    id de actividad ingresados por teclado */

                                    // si es mayor a 0 verificar que no exista mismo ingresante por misma actividad
                                    if($cantIncripciones > 0) {
                                        while($i < count($coleccInscripciones) && $existeInsc == false) {
                                            $inscripcion = $coleccInscripciones[$i] ; 
                                            $mIdent = $inscripcion -> getMIdentificacion() ; 
                                            


                                            $i++ ; 
                                        }
                                    }


                                       

                                // si ambos son true se puede crear la inscripcion
                                if($encontroDni == true && $encontroId == true) {

                                    // consulta para verificar si ya existe en la actividad a inscribir
                                    $consulta = "SELECT COUNT(*) AS total FROM inscripcion AS i
                                    INNER JOIN modulo AS m ON i.midentificacion = m.midentificacion
                                    WHERE i.dni = $dni AND m.aidentificacion = $idModu" ; 

                                    if($base -> Iniciar()) {
                                        if($base -> Ejecutar($consulta)) {
                                            $resultado = $base -> Registro();
                                            $totalInscripciones = $resultado['total'];
                                                if($totalInscripciones > 0) {
                                                    echo "El ingresante ya está inscrito en un módulo de esta actividad \n";
                                                } else {
                                                    $fechaRealiza = date('y-m-d') ; 
                                                    echo "Ingrese fecha de realizacion" ; 
                                                    $fechaRealiza = "2076-01-28" ;  
                                                    $fechaRealiza = date('y-m-d') ; 
                                                    $inscripcion = new Inscripcion() ; 
                                                    $inscripcion -> cargar($idInscripcion, $fechaRealiza, $costoFinal, $idModu, $dni) ; 
                                                    $inscripcion -> insertar() ; 
                                                    array_push($coleccInscripciones) ; 
                                                    $idInscripcion++ ; 
                                                    $cantIncripciones++ ; 
                                                    echo "\n" ;
                                                }
                                        }                                   
                                    } else {
                                        echo "No se pudo realizar la inscripcion \n" ;
                                    }
                                }
                            }
                        break ; 
                        case 2: 
                            /* Modificar inscripcion */

                            echo "Ingrese el id de inscripcion a modificar: " ; 
                            $idInscrip = trim(fgets(STDIN)) ; 
                            $inscripcion = new Inscripcion() ;
                            $encontro = $inscripcion -> Buscar($idInscrip) ; 
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
                                        if($coleccModulos[$i] -> getMIdentificacion() == $idModulo) {
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
                                        if($coleccIngresantes[$i] -> getDni() == $dni) {
                                            $encontroDni = true ; 
                                        }
                                        $i++ ; 
                                    }

                                    if($encontroDni && $encontroId) {
                                        echo "Ingrese fecha de realizacion" ; 
                                        $fechaRealiza = trim(fgets(STDIN)) ;  
                                        $fechaRealiza = date('y-m-d') ; 
                                        $inscripcion = new Inscripcion() ; 
                                        $inscripcion -> cargar($idInscrip, $fechaRealiza, $costoFinal, $idModulo, $dni) ; 
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
                            /* Ver inscripciones en un modulo determinado */
                            echo "Ingrese ID del módulo: ";
                            $idMod = trim(fgets(STDIN)) ;
                            $base = new BaseDatos();
                            
                            // Consulta SQL para obtener las inscripciones del módulo
                            $consulta = "SELECT inscrp.iidentificacion, inscrp.fecha_realizacion, inscrp.costo_final,
                                        ingr.dni, ingr.nombre, ingr.apellido
                                        FROM inscripcion AS inscrp
                                        JOIN ingresante AS ingr ON inscrp.dni = ingr.dni
                                        WHERE inscrp.midentificacion = $idMod";

                            if($base -> Iniciar()) {
                                if($base -> Ejecutar($consulta)) {
                                    while($row = $base->Registro()) {
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
                            /* Ver incripciones a una actividad determinada */

                            $base = new BaseDatos();
                            echo "Ingrese id de actividad: " ; 
                            $idActiv = trim(fgets(STDIN)) ; 

                            // Consulta SQL para obtener las inscripciones de la actividad
                            $consulta = "SELECT i.iidentificacion, i.fecha_realizacion, i.costo_final,
                                        m.descripcion AS modulo_descripcion,
                                        ing.dni, ing.nombre, ing.apellido
                                        FROM inscripcion AS i
                                        JOIN modulo AS m ON i.midentificacion = m.midentificacion
                                        JOIN actividad AS a ON m.aidentificacion = a.aidentificacion
                                        JOIN ingresante AS ing ON i.dni = ing.dni
                                        WHERE a.aidentificacion = $idActiv";

                            if($base -> Iniciar()) {
                                if($base -> Ejecutar($consulta)) {
                                    while($row = $base -> Registro()) {
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
                            /* Ver todos los registros dado un modulo de un mismo dni que tenga mas de un registro */

                            $base = new BaseDatos();
                            echo "Ingrese id de modulo: " ; 
                            $idMod = trim(fgets(STDIN)) ; 

                            // Consulta SQL para buscar los registros duplicados en el módulo por dni 
                            $consulta = "SELECT dni, COUNT(*) AS total
                                        FROM inscripcion
                                        WHERE midentificacion = $idMod
                                        GROUP BY dni
                                        HAVING COUNT(*) > 1";
                            
                            if($base -> Iniciar()) {
                                if($base -> Ejecutar($consulta)) {
                                    while($row = $base -> Registro()) {
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