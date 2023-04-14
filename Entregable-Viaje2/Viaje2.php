<?php 

    // guardar al responsable aca ?

    class Viaje {
        private $codigoViaje ; 
        private $destino ; 
        private $cantMaxPasajeros ; 
        private $coleccPasajeros ;  
        private $responsableV ; 

        public function __construct(
            $codigoViaje, 
            $destino, 
            $cantMaxPasajeros,
            // coleccion de objetos, los objetos son pasajeros 
            $coleccPasajeros, 
            $responsableV
        ) {
            $this -> codigoViaje = $codigoViaje ; 
            $this -> destino = $destino ; 
            $this -> cantMaxPasajeros = $cantMaxPasajeros ; 
            $this -> coleccPasajeros = $coleccPasajeros ; 
            $this -> responsableV = $responsableV ;
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
        public function getColeccPasajeros() {
            return $this -> coleccPasajeros ; 
        }
        public function getResponsableV() {
            return $this -> responsableV ; 
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
        public function setColeccPasajeros($coleccPasajeros) {
            $this -> coleccPasajeros = $coleccPasajeros ; 
        }
        public function setResponsableV() {
            $this -> responsableV = $responsableV ; 
        }

        /**
         * Verifica que el pasajero ya exista en la coleccion
         * 
         */
        public function existePasajero() {
            $existPasaj = false ;
            return $existPasaj ; 
        }


        public function agregaPasajero() {
            $agrega = false ; 
            $coleccPasajeros = getColeccPasajeros(); 

            


            return $agrega ; 
        }








        /**
         * Almacena en una cadena los datos de los pasajeros
         * @return array
         */
        public function datosPasajeros() {
            // 

            $cadena = "" ; 
            $coleccPasajeros[] = [
                "nombre" => '' ,
                "apellido" => '' ,
                "nroDoc" => '' ,
                "NroTel" => ''
            ] ; 
            $coleccPasajeros = $this -> getColeccPasajeros() ; 
        
            for($i=0 ; $i<count($coleccPasajeros) ; $i++) {
                $nombre = $coleccPasajeros[$i]['nombre'] ;
                $apellido = $coleccPasajeros[$i]['apellido'] ;
                $nroDoc = $coleccPasajeros[$i]['nroDoc'] ;
                $nroTel = $coleccPasajeros[$i]['nroTel'] ;
                $cadena = $cadena . "Nombre: " . $nombre .
                    "Apellido: " . $apellido . 
                    "Nro de documento: " . $nroDoc . 
                    "Nro de Telefono: " . $nroTel ; 
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