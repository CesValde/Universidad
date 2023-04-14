<?php 

    class Pasajero {
        private $nombrePasaj ; 
        private $apellidoPasaj ; 
        private $nroDocPasajero ; 
        private $nroTelPasaj ; 

        public function __construct(
            $nombrePasaj , 
            $apellidoPasaj , 
            $nroDocPasajero , 
            $nroTelPasaj 
        ) {
            $this -> nombrePasaj = $nombrePasaj ; 
            $this -> apellidoPasaj = $apellidoPasaj ;
            $this -> nroDocPasajero = $nroDocPasajero ; 
            $this -> nroTelPasaj = $nroTelPasaj ;
        }
 
        public function getNombrePasajero() {
            return $this -> nombrePasaj ; 
        }
        public function getApellidoPasajero() {
            return $this -> apellidoPasaj ; 
        }
        public function getNroDocPasajero() {
            return $this -> nroDocPasajero ; 
        }
        public function getNroTelefPasajero() {
            return $this -> nroTelPasaj ; 
        }

        public function setNombrePasajero($nombrePasaj) {
            $this -> nombrePasaj = $nombrePasaj ; 
        }
        public function setApellidoPasajer($apellidoPasaj) {
            $this -> apellidoPasaj = $apellidoPasaj ;   
        }
        public function setNroDocPasajero($nroDocPasajero) {
            $this -> nroDocPasajero = $nroDocPasajero ; 
        }
        public function setNroTelefPasajero($nroTelPasaj) {
            $this -> nroTelPasaj = $nroTelPasaj ; 
        }

        /**
         * 
         * @return 
         */
        public function coleccionPasajeros() {
            $coleccPasajeros[] = [] ;

            $nombrePasaJ = $this -> getNombrePasajero() ; 
            $apellidoPasaj = $this -> getApellidoPasajero() ; 
            $nroDocPasajero = $this -> getNroDocPasajero() ; 
            $nroTelPasaj = $this -> getNroTelefPasajero() ;

            $pasajero = [
                "nombre" => $nombrePasaJ ,
                "apellido" => $apellidoPasaj , 
                "nroDoc" => $nroDocPasajero, 
                "nroTelf" => $nroTelPasaj
            ] ; 

            array_push($coleccPasajeros, $pasajero) ; 
            print_r($coleccPasajeros) ; 

            return $coleccPasajeros ; 
        }

        public function __toString() {
            return "\n" . 
                "Nombre del pasajero: " . $this -> getNombrePasajero() . "\n" . 
                "Apellido del pasajero: " . $this -> getApellidoPasajero   () . "\n" . 
                "Numero de documento del pasajero: " . $this -> getNroDocPasajero() . "\n" . 
                "Numero de telefono del pasajero: " . $this -> getNroTelefPasajero() . "\n" ;
        }
    }