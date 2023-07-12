<?php 


    include_once "Actividad.php" ; 
    include_once "Modulo.php" ; 
    include_once "ModuloPresencial.php" ; 
    include_once "ModuloOnline.php" ; 
    include_once "Ingresante.php" ; 
    include_once "Inscripcion.php" ; 
    include_once "bd_Ingresante.php" ; 


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
        echo "3. Inscripciones" . "\n" ;
        echo "4. Ingresantes" . "\n" ;
        echo "5. Salir" . "\n" ;
        echo "Ingrese opcion: " ; 
        $opcion = trim(fgets(STDIN)) ;
        echo "\n" ;
            while($opcion < 1 || $opcion > 5) {
                echo "Ingrese una opcion correcta" . "\n" ; 
                echo "\n" ;  
                echo "1. Actividad" . "\n" ;
                echo "2. Modulo" . "\n" ;
                echo "3. Inscripciones" . "\n" ;
                echo "4. Ingresantes" . "\n" ;
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
        echo "5. Salir" . "\n" ;
        echo "Ingrese opcion: " ; 
        $opcion = trim(fgets(STDIN)) ;
        echo "\n" ;
            while($opcion < 1 || $opcion > 5) {
                echo "Ingrese una opcion correcta" . "\n" ; 
                echo "\n" ;  
                echo "Ingrese una opcion: " . "\n" ; 
                echo "1. Crear actividad" . "\n" ;
                echo "2. Modificar actividad" . "\n" ;
                echo "3. Eliminar actividad" . "\n" ;
                echo "4. Ver actividades" . "\n" ;
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