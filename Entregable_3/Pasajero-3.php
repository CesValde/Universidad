<?php 

    class Pasajero {
        private $nombrePasaj ; 
        // private $apellidoPasaj ; 
        private $nroAsiento ; 
        private $nroTicket ; 

        public function __construct(
            $nombrePasaj , 
            // $apellidoPasaj , 
            $nroAsiento , 
            $nroTicket 
        ) {
            $this -> nombrePasaj = $nombrePasaj ; 
            // $this -> apellidoPasaj = $apellidoPasaj ;
            $this -> nroAsiento = $nroAsiento ; 
            $this -> nroTicket = $nroTicket ;
        }
 
        public function getNombrePasajero() {
            return $this -> nombrePasaj ; 
        }
/*
        public function getApellidoPasajero() {
            return $this -> apellidoPasaj ; 
        }
*/
        public function getNroAsiento() {
            return $this -> nroAsiento ; 
        }
        public function getNroTicket() {
            return $this -> nroTicket ; 
        }

        public function setNombrePasajero($nombrePasaj) {
            $this -> nombrePasaj = $nombrePasaj ; 
        }
/*
        public function setApellidoPasajero() {
            ,$this -> apellidoPasaj ; 
        }
*/
        public function setNroAsiento($nroAsiento) {
            $this -> nroAsiento = $nroAsiento ; 
        }
        public function setNroTicket($nroTicket) {
            $this -> nroTicket = $nroTicket ; 
        }

        public function __toString() {
            return 
                "Nombre: " . $this -> getNombrePasajero() . "\n" . 
                //"Apellido: " . $this -> getApellidoPasajero() . "\n" .  
                "Numero de asiento: " . $this -> getNroAsiento() . "\n" .  
                "Numero de ticket: " . $this -> getNroTicket() . "\n" ;
        }    
    }