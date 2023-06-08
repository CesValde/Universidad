<?php 

    include_once "Persona.php" ; 
    include_once "CuentaBancariaTp2.php" ; 

    /**
     * Cambia el nombre del objeto persona
     * @return string
     */
    function cambioNombre() {

        echo "Ingrese nuevo nombre: " ; 
        $nombre = trim(fgets(STDIN)) ;
            while(!ctype_alpha($nombre) || $nombre == "") {
                echo "Error: ingrese un nombre valido: " ; 
                $nombre = trim(fgets(STDIN)) ;
            }
        return $nombre ; 
    }

    /**
     * Cambia el apellido del objeto persona
     * @return string
     */
    function cambioApellido() {
        echo "Ingrese nuevo apellido: " ; 
        $apellido = trim(fgets(STDIN)) ;
            while(!ctype_alpha($apellido) || $apellido == "") {
                echo "Error: ingrese un apellido valido: " ; 
                $apellido = trim(fgets(STDIN)) ;
            }
        return $apellido ; 
    }

    /**
     * Cambia el tipo del objeto persona
     * @return string
     */
    function cambioTipo() {
        echo "Ingrese nuevo tipo: " ; 
        $tipo = trim(fgets(STDIN)) ;
            while(!ctype_alpha($tipo) || $tipo == "") {
                echo "Error: ingrese un tipo de documento valido: " ; 
                $tipo = trim(fgets(STDIN)) ;
            }
        return $tipo ; 
    }

    /**
     * Cambia el nro de documento del objeto persona
     * @return int
     */
    function cambioNroDoc() {
        echo "Ingrese nuevo nro de documento: " ; 
        $nroDoc = trim(fgets(STDIN)) ;
            while(!ctype_digit($nroDoc) || $nroDoc == "") {
                echo "Error: ingrese nro de documento valido: " ; 
                $nroDoc = trim(fgets(STDIN)) ;    
            }
        return $nroDoc ; 
    }


    echo "Ingrese su nombre: " ; 
    $nombre = trim(fgets(STDIN)) ; 
    echo "Ingrese su apellido: " ; 
    $apeliido = trim(fgets(STDIN)) ; 
    echo "Ingrese tipo de documento: " ; 
    $tipo = trim(fgets(STDIN)) ; 
    echo "Ingrese nro de documento: " ; 
    $nroDoc = trim(fgets(STDIN)) ; 
    $persona = new Persona($nombre, $apeliido, $tipo, $nroDoc) ; 

    do {
        echo "\n" ; 
        echo "Desea cambiar algun dato? " ; 
        $respuesta = trim(fgets(STDIN)) ; 
            if($respuesta == "si") {
                echo "Que dato desea modificar? \n" .
                "Nombre \n" . 
                "Apellido \n" . 
                "Tipo \n" . 
                "Nro de documento -> nrodoc \n" .
                "Ingrese opcion: " ; 
                $dato = trim(fgets(STDIN)) ; 

                switch($dato) {
                    case "nombre": 
                        $nombre = cambioNombre() ; 
                        $persona -> setNombre($nombre) ; 
                    break ; 
                    case "apellido":
                        $apellido = cambioApellido() ; 
                        $persona -> setApellido($apellido) ;
                    break ; 
                    case "tipo": 
                        $tipo = cambioTipo() ; 
                        $persona -> setTipo($tipo) ; 
                    break ; 
                    case "nrodoc":
                        $nroDoc = cambioNroDoc() ; 
                        $persona -> setNroDoc($nroDoc) ;
                    break ;
                }
        }
    } while($respuesta == "si") ;

/*
    echo "Ingrese su nro de cuenta: " ; 
    $nroCuenta = trim(fgets(STDIN)) ; 
    echo "Ingrese su saldo actual: " ; 
    $saldoActual = trim(fgets(STDIN)) ; 
    echo "Ingrese su interes anual: " ; 
    $interesAnual = trim(fgets(STDIN)) ;
*/
    $cuentaCesar = new CuentaBancaria(432, $persona, 50000, 2) ; 
    echo $cuentaCesar ; 