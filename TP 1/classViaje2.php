<?php

    /**
     * Guarda los datos de los pasajeros en un array 
     * @param
     */
    function datosPasajeros() {
        // 

        $datosPasajeros[] = [] ;
        return $datosPasajeros ; 
    }

    class Viaje {
        private $codigoViaje ; 
        private $destino ; 
        private $cantMaxPasajeros ; 
        private $cantPasajeros ; 

        private $datosPasajeros ; 
        private $nombrePasajero ; 
        private $apellidoPasajero ; 
        private $nroDocPasajero ; 

        public function __construct(
            $codigoViaje, 
            $destino, 
            $cantMaxPasajeros,
            $cantPasajeros, 
            $nombrePasajero, 
            $apellidoPasajero, 
            $nroDocPasajero, 
        ) {
            $this -> codigoViaje = $codigoViaje ; 
            $this -> destino = $destino ; 
            $this -> cantMaxPasajeros = $cantMaxPasajeros ; 
            $this -> cantPasajeros = $cantPasajeros ; 
            $this -> nombrePasajero = $nombrePasajero ; 
            $this -> apellidoPasajero = $apellidoPasajero ; 
            $this -> nroDocPasajero = $nroDocPasajero ; 
    }

        // obetener los datos 
        public function getCodigoViaje() {
            return $this -> codigoViaje ; 
        }
        public function getDestino() {
            return $this -> destino ;   
        }
        public function getCantMaxPasajeros() {
            return $this -> cantMaxPasajeros ; 
        }
        public function getCantPasajeros() {
            return $this -> cantPasajeros ;   
        }
        public function getNombre() {
            return $this -> nombrePasajero ; 
        }
        public function getApellido() {
            return $this -> apellidoPasajero ;   
        }
        public function getNroDoc() {
            return $this -> nroDocPasajero ; 
        }

        // asignamos los valores 
        public function setCodigoViaje($codigoViaje) {
            $this -> codigoViaje = $codigoViaje ; 
        }
        public function setDestino($destino) {
            $this -> destino = $destino ;   
        }
        public function setCantMaxPasajeros($cantMaxPasajeros) {
            $this -> cantMaxPasajeros = $cantMaxPasajeros ; 
        }
        public function setCantPasajeros($cantPasajeros) {
            $this -> cantPasajeros = $cantPasajeros ;   
        }
        public function setNombre($nombrePasajero) {
            $this -> nombrePasajero = $nombrePasajero ; 
        }
        public function setApellido($apellidoPasajero) {
            $this -> apellidoPasajero = $apellidoPasajero ;   
        }
        public function setNroDoc($nroDocPasajero) {
            $this -> nroDocPasajero = $nroDocPasajero ; 
        }

        public function __toString() {
            return "Nombre y apellido del pasajero: " . $this -> getNombre() . " " . $this -> getApellido() . "\n" . 
                "DNI del pasajero: " . $this -> getNroDoc() . ""
        }

    }


    /* Programa Viaje Feliz */
    //
    //


    /*
    $datosPasajeros = [] ; 
    $datosPasajeros = datosPasajeros() ; 


    echo "Ingrese destino: " ; 
    $destino = trim(fgets(STDIN)) ; 
    echo "Ingrese codigo de destino: " ; 
    $codigoViaje = trim(fgets(STDIN)) ; 
    echo "Ingrese cantidad maxima de pasajeros: " ; 
    $cantMaxPasajeros = trim(fgets(STDIN)) ; 
    echo "Ingrese cantidad de pasajeros: " ; 
    $cantPasajeros = trim(fgets(STDIN)) ; 
    for($i=0 ; $i<$cantPasajeros ; $i++) {
        echo "Ingrese nombre del pasajero: " ; 
        $nombrePasajero = trim(fgets(STDIN)) ; 
        echo "Ingrese apellido del pasajero: " ; 
        $apellidoPasajero = trim(fgets(STDIN)) ; 
        echo "Ingrese nro de documento: " ; 
        $nroDocPasajero = trim(fgets(STDIN)) ; 
        $datosPasajeros[$i]['nombre'] = $nombrePasajero ; 
        $datosPasajeros[$i]['apellido'] = $apellidoPasajero ; 
        $datosPasajeros[$i]['numero de documento'] = $nroDocPasajero ; 
    }


    $viajeMadrid = new Viaje($codigoViaje, $destino, $cantMaxPasajeros, $cantPasajeros, $nombrePasajero, $apellidoPasajero, $nroDocPasajero) ; 

    print_r($datosPasajeros) ; 
    */