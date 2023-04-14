<?php 

    class Viaje {
        private $codigoViaje ; 
        private $destino ; 
        private $cantMaxPasajeros ; 
        private $pasajeros ;  

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
         * Almacena en una cadena los datos de los pasajeros
         * @return array
         */
        public function datosPasajeros() {
            // 

            $cadena = "" ; 
            $pasajeros[] = [
                "nombre" => '' ,
                "apellido" => '' ,
                "nroDoc" => ''
            ] ; 
            $pasajeros = $this -> getPasajeros() ; 
            
            for($i=0 ; $i<count($pasajeros) ; $i++) {
                $nombre = $pasajeros[$i]['nombre']  . "\n" ;
                $apellido = $pasajeros[$i]['apellido'] . "\n" ;
                $nroDoc = $pasajeros[$i]['nroDoc'] . "\n" ; 
                $cadena = $cadena . "Nombre: " . $nombre .
                    "Apellido: " . $apellido . 
                    "nro doc: " . $nroDoc ; 
            }    
            return $cadena ; 
        }   
        
        public function __toString() {
            $cadena = $this -> datosPasajeros() ; 
            return "Codigo del viaje: " . $this -> getCodigoViaje() . "\n" . 
                "Destino: " . $this -> getDestino() . "\n" . 
                "Cantidad maxima de pasajeros: " . $this -> getCantMaxPasajeros() . "\n" .
                "Datos de los pasajeros: " . "\n" . $cadena ;                
        }
    }