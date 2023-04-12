<?php 

    class Viaje {
        private $codigoViaje ; 
        private $destino ; 
        private $cantMaxPasajeros ; 
        private $pasajeros ; 

        /*
        private $nombrePasajero ; 
        private $apellidoPasajero ; 
        private $nroDocPasajero ; 
        */ 

        public function __construct(
            $codigoViaje, 
            $destino, 
            $cantMaxPasajeros,
            $pasajeros 
        ) {
            $this -> codigoViaje = $codigoViaje ; 
            $this -> destino = $destino ; 
            $this -> cantMaxPasajeros = $cantMaxPasajeros ; 
            $this -> pasajeros = $pasajeros ; 
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
        public function getPasajeros() {
            return $this -> pasajeros ; 
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
        public function setPasajeros($pasajeros) {
            $this -> pasajeros = $pasajeros ; 
        }

        /**
         * Guarda los datos de los pasajeros en un array 
         * @return array
         */
        public function datosPasajeros() {
            // 

            $pasajeros[] = [] ;

            $pasajeros[] = [
                "nombre" => '' ,
                "apellido" => '' ,
                "nroDoc" => ''
            ] ; 
            
            return $pasajeros ; 
        }   
        
        public function __toString() {
            return "Codigo del viaje: " . $this -> getCodigoViaje() . "\n" . "Destino: " . $this -> getDestino() . "\n" . 
                "Cantidad maxima de pasajeros: " . $this -> getCantMaxPasajeros() . "\n" . "Datos de los pasajeros: " . "\n" ;
                $cadena = "" ;
                $cadena = $cadena . "Nombre del pasajero " . $pasajeros[$i]['nombre'] . "\n" . 
                "Apellido del pasajero " . $pasajeros[$i]['apellido'] . "\n" .
                "Nro de documento del pasajero " . $pasajeros[$i]['nroDoc'] . "\n" ; 
                
        }
    }